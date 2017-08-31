<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/07/2017
 * Time: 12.27
 */

namespace App\Services;


use App\Events\NewUserRegister;
use App\Repository\Contract\IUserRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class UserService extends BaseService
{
    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $token = md5(uniqid());

        $param = [
            'name'=>$input['name'],
            'email'=>$input['email'],
            'userLevel'=>$input['userLevel'],
            'password'=>bcrypt($input['password']),
            'token'=>$token
        ];

        if(!$this->userRepository->create($param)){
            $message = ['Gagal menambahkan user'];
            $response->addErrorMessage($message);
        }else{
            Event::fire(new NewUserRegister($input['email'],$token,$input['name']));
        }

        return $response;

    }

    public function read($id){
        return $this->readObject($this->userRepository,$id);
    }

    public function showAll(){
        return $this->getAllObject($this->userRepository);
    }

    public function update($input){
        $response = new ServiceResponseDto();


        if(!$this->userRepository->update($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->userRepository,$id);
    }

    public function paginationUserAdmin($param){
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationUserAdmin($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationUserStaf($param){
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->userRepository->paginationUserStaf($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function isUserNameActive($email){
        $response = new ServiceResponseDto();

        $response->setResult($this->userRepository->checkUserIsActive($email));

        return $response;
    }

    protected function isEmailExist($email){
        $response = new ServiceResponseDto();

        $response->setResult($this->userRepository->checkEmail($email,''));

        return $response;
    }

    public function authProcess($input){
        $response = new ServiceResponseDto();

        $isEmailExist = $this->isEmailExist($input['email'])->getResult();
        if($isEmailExist){
            $isUserActive = $this->isUserNameActive($input['email'])->getResult();
            if($isUserActive){
                if(isset($input['remember'])){
                    if(!Auth::attempt(['email'=>$input['email'],'password'=>$input['password']],true)){
                        $message = ['User dan Password tidak valid!'];
                        $response->addErrorMessage($message);
                    }
                }else{
                    if(!Auth::attempt(['email'=>$input['email'],'password'=>$input['password']],false)){
                        $message = ['User dan Password tidak valid!'];
                        $response->addErrorMessage($message);
                    }
                }
            }else{
                $message = ['User belum di aktivasi!'];
                $response->addErrorMessage($message);
            }
        }else{
            $message = ['Email / user tidak di temukan!'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function activationUser($email,$token){
        $response = new ServiceResponseDto();
        $userEmail = base64_decode($email);
        $isUserActive = $this->isUserNameActive($userEmail)->getResult();
        if($isUserActive){
            $message = ['User sudah di aktivasi'];
            $response->addErrorMessage($message);
        }else{
            if(!$this->userRepository->userConfirmation($userEmail,$token)){
                $message = ['Gagal mengaktifasi user'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function updateDataUmumPerusahaan($param){
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if(!$this->userRepository->updateDataUmumPerusahaan($perusahaanId,$param)){
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function updateDataLegalPerusahaan($param){
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if(!$this->userRepository->updateDataLegalitasPerusahaan($perusahaanId,$param)){
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }


    public function updateDataPengelolah($param){
        $response = new ServiceResponseDto();
        $perusahaanId = auth()->user()->id;

        if(!$this->userRepository->updateDataPengelolah($perusahaanId,$param)){
            $message = ['Gagal menyimpan data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }
}