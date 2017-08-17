<?php
namespace App\Repository\Actions;

use App\Models\User;
use App\Repository\Contract\IUserRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class UserRepository implements IUserRepository
{

    public function create($input)
    {
        $user = new User();
        $user->nama = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->user_level = $input['userLevel'];
        if(isset($input['token']) || $input['token'] !=''){
            $user->activation_token = $input['token'];
        }

        return $user->save();
    }

    public function update($input)
    {
        $user = User::find($input['id']);
        $user->nama = $input['name'];
        $user->email = $input['email'];
        $user->user_level = $input['userLevel'];

        return $user->save();
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function read($id)
    {
        return User::find($id);
    }

    public function showAll()
    {
        return User::all();
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function checkEmail($email, $id)
    {
        if($id ==''){
            $result = User::where('email','=',$email)->count();
        }else{
            $result = User::where('email','=',$email)->where('id','<>',$id)->count();
        }

        return ($result>0);
    }

    public function checkUserIsActive($email)
    {
        $result = User::where('email','=',$email)->value('is_active');

        return ($result==1);
    }

    public function changeActiveStatus($id,$status)
    {
        $user = User::find($id);
        $user->is_active = $status;

        return $user->save();
    }

    public function userConfirmation($email, $token)
    {
        return User::where('email','=',$email)
            ->where('activation_token','=',$token)
            ->update(['is_active'=>'1']);
    }


}