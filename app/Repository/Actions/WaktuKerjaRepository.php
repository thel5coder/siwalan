<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 09.43
 */

namespace App\Repository\Actions;


use App\Models\WaktuKerjaModel;
use App\Repository\Contract\IWaktuKerjaRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class WaktuKerjaRepository implements IWaktuKerjaRepository
{

    public function create($input)
    {
        $waktuKerja = new WaktuKerjaModel();
        $waktuKerja->perusahaan_id = auth()->user()->id;
        $waktuKerja->lapor_id = $input['laporId'];
        $waktuKerja->waktu_kerja_id = $input['masterKerjaId'];

        return $waktuKerja->save();
    }

    public function update($input)
    {
        return WaktuKerjaModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'waktu_kerj_id'=>$input['waktuKerjaId']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return WaktuKerjaModel::where('perusahaan_id','=',$id)->get();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function readByWajibLapor($laporId)
    {
        return WaktuKerjaModel::where('lapor_id','=',$laporId)->orderBy('waktu_kerja_id','asc')->get();
    }

    public function deleteByWajibLapor($laporId)
    {
        return WaktuKerjaModel::where('lapor_id','=',$laporId)->delete();
    }


}