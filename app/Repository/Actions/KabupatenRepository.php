<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.53
 */

namespace App\Repository\Actions;


use App\Models\KabupatenModel;
use App\Repository\Contract\IKabupatenRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class KabupatenRepository implements IKabupatenRepository
{
    public function create($input)
    {
        // TODO: Implement create() method.
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
        return KabupatenModel::where('id_prov', '=', $id)->get();
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
        $result->setTotalCount(KabupatenModel::where('id_prov', '=', 35)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = KabupatenModel::where('id_prov', '=', 35)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KabupatenModel::where('id_prov', '=', 35)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = KabupatenModel::where('id_prov', '=', 35)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KabupatenModel::where('id_prov', '=', 35)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%');
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


}