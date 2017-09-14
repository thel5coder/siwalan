<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 10.04
 */

namespace App\Repository\Actions;


use App\Models\RencanaPelatihanModel;
use App\Repository\Contract\IRencanaPelatihanRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class RencanaPelatihanRepository implements IRencanaPelatihanRepository
{

    public function create($input)
    {
        $rencana = new RencanaPelatihanModel();
        $rencana->lapor_id = $input['laporId'];
        $rencana->kejuruan = $input['kejuruan'];
        $rencana->kode = $input['kodeKejuruan'];
        $rencana->jml_peserta = $input['jmlPeserta'];

        return $rencana->save();
    }

    public function update($input)
    {
        $rencana = RencanaPelatihanModel::find($input['id']);
        $rencana->lapor_id = $input['laporId'];
        $rencana->kejuruan = $input['kejuruan'];
        $rencana->kode = $input['kodeKejuruan'];
        $rencana->jml_peserta = $input['jmlPeserta'];

        return $rencana->save();
    }

    public function delete($id)
    {
        return RencanaPelatihanModel::find($id)->delete();
    }

    public function read($id)
    {
        return RencanaPelatihanModel::find($id);
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
        return RencanaPelatihanModel::where('lapor_id', '=', $laporId)->get();
    }

    public function deleteByLapor($laporId)
    {
        return RencanaPelatihanModel::where('lapor_id', '=', $laporId)->delete();
    }

    public function checkKejuruan($laporId, $id, $kejuruan)
    {
        if ($id == '') {
            $result = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                ->where('kejuruan', '=', $kejuruan)
                ->count();
        } else {
            $result = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                ->where(function ($q) use ($kejuruan, $id) {
                    $q->where('kejuruan', '=', $kejuruan)->where('id', '<>', $id);
                })->count();
        }

        return ($result > 0);
    }

    public function checkKodeKejuruan($laporId, $id, $kodeKejuruan)
    {
        if ($id == '') {
            $result = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                ->where('kode', '=', $kodeKejuruan)
                ->count();
        } else {
            $result = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                ->where(function ($q)use($id,$kodeKejuruan){
                    $q->where('kode', '=', $kodeKejuruan)->where('id', '<>', $id);
                })
                ->count();
        }

        return ($result > 0);
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
        $result->setTotalCount(RencanaPelatihanModel::where('lapor_id', '=', $laporId)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                    ->where(function ($q) use ($param) {
                        $q->where('kejuruan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kode_kejuruan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = RencanaPelatihanModel::where('lapor_id', '=', $laporId)
                    ->where(function ($q) use ($param) {
                        $q->where('kejuruan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kode_kejuruan', 'like', '%' . $param->getKeyword() . '%');
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