<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 14.25
 */

namespace App\Repository\Actions;


use App\Models\FasilitasK3Model;
use App\Repository\Contract\IFasilitasK3Repository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class FasilitasK3Repository implements IFasilitasK3Repository
{

    public function create($input)
    {
        $fasilitasK3 = new FasilitasK3Model();
        $fasilitasK3->lapor_id = $input['laporId'];
        $fasilitasK3->fasilitas_k3_id = $input['fasilitasK3Id'];
        if(isset($input['jumlah'])){
            $fasilitasK3->jumlah = $input['jumlah'];
        }

        return $fasilitasK3->save();
    }

    public function update($input)
    {
        return FasilitasK3Model::where('fasilitas_k3_id','=',$input['fasilitasK3Id'])
            ->update([
                'jumlah'=>$input['jumlah']
            ]);
    }

    public function delete($id)
    {
        return FasilitasK3Model::find($id)->delete();
    }

    public function read($id)
    {
        return FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
            ->where('fasilitas_k3.fasilitas_k3_id','=',$id)
            ->first();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function readByLapor($laporId)
    {
       return FasilitasK3Model::where('lapor_id','=',$laporId)->get();
    }

    public function deleteByLapor($laporId)
    {
        return FasilitasK3Model::where('lapor_id','=',$laporId)->delete();
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
        $result->setTotalCount(FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
            ->where('fasilitas_k3.lapor_id','=',$laporId)
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
                    ->where('fasilitas_k3.lapor_id','=',$laporId)
                    ->select('fasilitas_k3.*','master_fasilitas_k3.nama_fasilitas_keselamatan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
                    ->where('fasilitas_k3.lapor_id','=',$laporId)
                    ->select('fasilitas_k3.*','master_fasilitas_k3.nama_fasilitas_keselamatan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
                    ->select('fasilitas_k3.*','master_fasilitas_k3.nama_fasilitas_keselamatan')
                    ->where('fasilitas_k3.lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('master_fasilitas_k3.nama_fasilitas_keselamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = FasilitasK3Model::join('master_fasilitas_k3', 'master_fasilitas_k3.id', '=', 'fasilitas_k3.fasilitas_k3_id')
                    ->select('fasilitas_k3.*','master_fasilitas_k3.nama_fasilitas_keselamatan')
                    ->where('fasilitas_k3.lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('master_fasilitas_k3.nama_fasilitas_keselamatan', 'like', '%' . $param->getKeyword() . '%');
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