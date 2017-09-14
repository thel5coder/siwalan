<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 30/08/2017
 * Time: 23.45
 */

namespace App\Repository\Actions;


use App\Models\PenggunaanAlatBahanModel;
use App\Repository\Contract\IPenggunaanAlatBahanRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class PenggunaanAlatBahanRepository implements IPenggunaanAlatBahanRepository
{

    public function create($input)
    {
        $alatBahan = new PenggunaanAlatBahanModel();
        $alatBahan->lapor_id = $input['laporId'];
        $alatBahan->alat_id = $input['alatId'];
        $alatBahan->sub_alat = $input['subAlat'];
        $alatBahan->jumlah = $input['jumlah'];

        return $alatBahan->save();
    }

    public function update($input)
    {
        $alatBahan = PenggunaanAlatBahanModel::find($input['id']);
        $alatBahan->alat_id = $input['alatId'];
        $alatBahan->sub_alat = $input['subAlat'];
        $alatBahan->jumlah = $input['jumlah'];

        return $alatBahan->save();
    }

    public function delete($id)
    {
        return PenggunaanAlatBahanModel::find($id)->delete();
    }

    public function read($id)
    {
        return PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
            ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
            ->where('id','=',$id)
            ->first();
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
        $result->setTotalCount(PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->where('master_alat_bahan.nama_alat_bahan', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('penggunaan_alat_bahan.sub_alat', 'like', '%' . $param->getKeyword() . '%')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->where('master_alat_bahan.nama_alat_bahan', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('penggunaan_alat_bahan.sub_alat', 'like', '%' . $param->getKeyword() . '%')
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

    public function paginationByLapor(PaginationParam $param, $laporId)
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
        $result->setTotalCount(PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
            ->where('penggunaan_alat_bahan.lapor_id','=',$laporId)
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->where('penggunaan_alat_bahan.lapor_id','=',$laporId)
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->where('penggunaan_alat_bahan.lapor_id','=',$laporId)
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->where('penggunaan_alat_bahan.lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('master_alat_bahan.nama_alat_bahan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('penggunaan_alat_bahan.sub_alat', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = PenggunaanAlatBahanModel::join('master_alat_bahan', 'master_alat_bahan.id', '=', 'penggunaan_alat_bahan.alat_id')
                    ->select('penggunaan_alat_bahan.*','master_alat_bahan.nama_alat_bahan')
                    ->where('penggunaan_alat_bahan.lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('master_alat_bahan.nama_alat_bahan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('penggunaan_alat_bahan.sub_alat', 'like', '%' . $param->getKeyword() . '%');
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


    public function readByLapor($laporId)
    {
        return PenggunaanAlatBahanModel::where('lapor_id', '=', $laporId)->get();
    }

    public function readByAlatId($laporId,$alatId)
    {
        return PenggunaanAlatBahanModel::where('alat_id', '=', $alatId)->where('lapor_id','=',$laporId)->first();
    }

    public function checkIsExist($laporId,$alatId)
    {
        $result = PenggunaanAlatBahanModel::where('alat_id','=',$alatId)->where('lapor_id','=',$laporId)->count();

        return ($result>0);
    }


}