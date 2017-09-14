<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 04.47
 */

namespace App\Repository\Actions;


use App\Models\KepemilikanModel;
use App\Repository\Contract\IKepemilikanRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class KepemilikanRepository implements IKepemilikanRepository
{

    public function create($input)
    {
        $pemilik = new KepemilikanModel();
        $pemilik->perusahaan_id = auth()->user()->id;
        $pemilik->nama_pemilik = $input['namaPemilik'];
        $pemilik->alamat_pemilik = $input['alamatPemilik'];

        return $pemilik->save();
    }

    public function update($input)
    {
        $pemilik = KepemilikanModel::find($input['id']);
        $pemilik->perusahaan_id = auth()->user()->id;
        $pemilik->nama_pemilik = $input['namaPemilik'];
        $pemilik->alamat_pemilik = $input['alamatPemilik'];

        return $pemilik->save();
    }

    public function delete($id)
    {
        return KepemilikanModel::find($id)->delete();
    }

    public function read($id)
    {
        return KepemilikanModel::find($id);
    }

    public function showAll()
    {
        return KepemilikanModel::all();
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function paginationByPerusahaan(PaginationParam $param, $perusahaanId)
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
        $result->setTotalCount(KepemilikanModel::where('perusahaan_id', '=', $perusahaanId)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = KepemilikanModel::where('perusahaan_id', '=', $perusahaanId)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KepemilikanModel::where('perusahaan_id', '=', $perusahaanId)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = KepemilikanModel::where('perusahaan_id', '=', $perusahaanId)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_pemilik', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('alamat_pemilik', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = KepemilikanModel::where('perusahaan_id', '=', $perusahaanId)
                    ->where(function ($q) use ($param) {
                        $q->where('nama_pemilik', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('alamat_pemilik', 'like', '%' . $param->getKeyword() . '%');
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