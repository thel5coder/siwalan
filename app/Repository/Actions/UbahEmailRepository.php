<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/09/2017
 * Time: 01.16
 */

namespace App\Repository\Actions;


use App\Models\RequestChangeEmailModel;
use App\Repository\Contract\IUbahEmailRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class UbahEmailRepository implements IUbahEmailRepository
{

    public function create($input)
    {
        $ubahEmail = new RequestChangeEmailModel();
        $ubahEmail->user_id = $input['userId'];
        $ubahEmail->new_email = $input['email'];
        $ubahEmail->status_request = 'pending';
        $ubahEmail->alasan_penggantian = $input['alasan'];

        return $ubahEmail->save();
    }

    public function update($input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(RequestChangeEmailModel::join('users', 'users.id', '=', 'request_change_email.user_id')->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = RequestChangeEmailModel::join('users', 'users.id', '=', 'request_change_email.user_id')
                    ->select('request_change_email.*', 'users.nama','users.email')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = RequestChangeEmailModel::join('users', 'users.id', '=', 'request_change_email.user_id')
                    ->select('request_change_email.*', 'users.nama','users.email')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = RequestChangeEmailModel::join('users', 'users.id', '=', 'request_change_email.user_id')
                    ->select('request_change_email.*', 'users.nama','users.email')
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('request_change_email.new_email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('request_change_email.status_request', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = RequestChangeEmailModel::join('users', 'users.id', '=', 'request_change_email.user_id')
                    ->select('request_change_email.*', 'users.nama','users.email')
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('request_change_email.new_email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('request_change_email.status_request', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function changeStatusRequest($id, $statusRequest)
    {
        $ubahEmail = RequestChangeEmailModel::find($id);
        $ubahEmail->status_request = $statusRequest;

        return $ubahEmail->save();
    }


}