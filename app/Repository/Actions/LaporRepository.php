<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 06.02
 */

namespace App\Repository\Actions;


use App\Models\WajibLaporModel;
use App\Repository\Contract\ILaporRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class LaporRepository implements ILaporRepository
{

    public function create($input)
    {
        $lapor = new WajibLaporModel();
        $lapor->perusahaan_id = $input['perusahaanId'];
        $lapor->tgl_lapor =$input['tglLapor'];
        $lapor->kode_wilayah = $input['kodeWilayah'];
        $lapor->tahun = $input['tahun'];
        $lapor->kode_kblui = $input['kodeKblui'];
        $lapor->laporan_ke = $input['laporanKe'];
        $lapor->tgl_lapor_selanjutnya = $input['laporanSelanjutnya'];

        return $lapor->save();
    }

    public function update($input)
    {
        $lapor = WajibLaporModel::find($input['id']);
        $lapor->tgl_lapor = $input['tglLapor'];
        $lapor->nomor_registrasi = $input['nomorRegistrasi'];
        $lapor->tgl_lapor_selanjutnya = $input['tglLaporSelanjutnya'];

        return $lapor->save();
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
        $result->setTotalCount(WajibLaporModel::count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
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

    public function checkExistingLapor($tahun)
    {
        $result = WajibLaporModel::where('tahun','=',$tahun)->count();

        return ($result > 0);
    }

    public function getPaginationByPerusahaan(PaginationParam $param)
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
        $result->setTotalCount(WajibLaporModel::where('perusahaan_id','=',auth()->user()->id)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::where('perusahaan_id','=',auth()->user()->id)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('perusahaan_id','=',auth()->user()->id)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::where('perusahaan_id','=',auth()->user()->id)
                    ->where(function ($q)use($param){
                        $q->where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('perusahaan_id','=',auth()->user()->id)
                    ->where(function ($q)use($param){
                        $q->where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
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