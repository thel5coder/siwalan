<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 02/09/2017
 * Time: 13.35
 */

namespace App\Repository\Actions;


use App\Models\DetailCtkiAkanBerangkatModel;
use App\Repository\Contract\IDetailCtkiAkanBerangkatRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class DetailCtkiAkanBerangkatRepository implements IDetailCtkiAkanBerangkatRepository
{

    public function create($input)
    {
        $detail = new DetailCtkiAkanBerangkatModel();
        $detail->lapor_id = $input['laporId'];
        $detail->nama_jabatan = $input['namaJabatan'];
        $detail->kode_jabatan = $input['kodeJabatan'];
        $detail->jml_sd = $input['jmlSd'];
        $detail->jml_smtp = $input['jmlSmp'];
        $detail->jml_smta = $input['jmlSma'];
        $detail->jml_d3 = $input['jmlD3'];
        $detail->jml_s1 = $input['jmlS1'];
        $detail->jml_s2 = $input['jmlS2'];
        $detail->jml_s3 = $input['jmlS3'];
        $detail->jml_wni_tetap = $input['jmlWniTetap'];
        $detail->jml_wni_tidak_tetap = $input['jmlWniTidakTetap'];
        $detail->jml_wna_tetap = $input['jmlWnaTetap'];
        $detail->jml_wna_tidak_tetap = $input['jmlWnaTidakTetap'];
        $detail->jml_penca_tetap = $input['jmlPencaTetap'];
        $detail->jml_penca_tidak_tetap = $input['jmlPencaTidakTetap'];
        $detail->total = $input['total'];

        return $detail->save();
    }

    public function update($input)
    {
        $detail = DetailCtkiAkanBerangkatModel::find($input['id']);
        $detail->nama_jabatan = $input['namaJabatan'];
        $detail->kode_jabatan = $input['kodeJabatan'];
        $detail->jml_sd = $input['jmlSd'];
        $detail->jml_smtp = $input['jmlSmp'];
        $detail->jml_smta = $input['jmlSma'];
        $detail->jml_d3 = $input['jmlD3'];
        $detail->jml_s1 = $input['jmlS1'];
        $detail->jml_s2 = $input['jmlS2'];
        $detail->jml_s3 = $input['jmlS3'];
        $detail->jml_wni_tetap = $input['jmlWniTetap'];
        $detail->jml_wni_tidak_tetap = $input['jmlWniTidakTetap'];
        $detail->jml_wna_tetap = $input['jmlWnaTetap'];
        $detail->jml_wna_tidak_tetap = $input['jmlWnaTidakTetap'];
        $detail->jml_penca_tetap = $input['jmlPencaTetap'];
        $detail->jml_penca_tidak_tetap = $input['jmlPencaTidakTetap'];
        $detail->total = $input['total'];

        return $detail->save();
    }

    public function delete($id)
    {
        return DetailCtkiAkanBerangkatModel::find($id)->delete();
    }

    public function read($id)
    {
        return DetailCtkiAkanBerangkatModel::find($id);
    }

    public function showAll()
    {
        return null;
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function readByLapor($laporId)
    {
        return DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)->get();
    }

    public function deleteByLapor($laporId)
    {
        return DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)->delete();
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
        $result->setTotalCount(DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('nama_jabatan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kode_jabatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = DetailCtkiAkanBerangkatModel::where('lapor_id','=',$laporId)
                    ->where(function ($q) use($param){
                        $q->where('nama_jabatan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kode_jabatan', 'like', '%' . $param->getKeyword() . '%');
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


    public function checkJabatan($id, $jabatan)
    {
        if($id ==''){
            $result = DetailCtkiAkanBerangkatModel::where('nama_jabatan','=',$jabatan)->count();
        }else{
            $result = DetailCtkiAkanBerangkatModel::where('id','<>',$id)->where('nama_jabatan','=',$jabatan)->count();
        }

        return ($result>0);
    }

    public function checkKodeJabatan($id, $kodeJabatan)
    {
        if($id ==''){
            $result = DetailCtkiAkanBerangkatModel::where('kode_jabatan','=',$kodeJabatan)->count();
        }else{
            $result = DetailCtkiAkanBerangkatModel::where('id','<>',$id)->where('kode_jabatan','=',$kodeJabatan)->count();
        }

        return ($result>0);
    }
}