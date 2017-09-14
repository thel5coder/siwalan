<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.56
 */

namespace App\Repository\Actions;


use App\Models\KecamatanModel;
use App\Repository\Contract\IKecamatanRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class KecamatanRepository implements IKecamatanRepository
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
        return KecamatanModel::where('id_kabkota', '=', $id)->get();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function paginationByKabupaten(PaginationParam $param, $kabupatenId)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'kecamatan.id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(KecamatanModel::join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabkota')->where('kecamatan.id_kabkota', '=', $kabupatenId)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = KecamatanModel::join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabkota')
                    ->select('kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('kecamatan.id_kabkota', '=', $kabupatenId)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KecamatanModel::join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabkota')
                    ->select('kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('kecamatan.id_kabkota', '=', $kabupatenId)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = KecamatanModel::join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabkota')
                    ->select('kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('kecamatan.id_kabkota', '=', $kabupatenId)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KecamatanModel::join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabkota')
                    ->select('kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('kecamatan.id_kabkota', '=', $kabupatenId)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('nama_kabupaten', 'like', '%' . $param->getKeyword() . '%');
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