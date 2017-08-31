<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 09.45
 */

namespace App\Repository\Actions;


use App\Models\PengupahanModel;
use App\Repository\Contract\IPengupahanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class PengupahanRepository implements IPengupahanRepository
{

    public function create($input)
    {
        $pengupahan = new PengupahanModel();
        $pengupahan->lapor_id = $input['laporId'];
        $pengupahan->jumlah_upah_pekerja_dibayarkan = $input['upahDiBayarkan'];
        $pengupahan->tingkat_upah_tertinggi = $input['tingkatUpahTertinggi'];
        $pengupahan->tingkat_upah_terendah = $input['tingkatUpahTerendah'];
        $pengupahan->jumlah_penerima_umk_ump_umsk = $input['jmlPenerimaUmkUmpUmsk'];
        $pengupahan->jumlah_penerima_umk_ump_umsk_dalam_persen = $input['jmlPenerimaUmkUmpUmskPersen'];
        $pengupahan->tunjangan_hari_raya_keagamaan = $input['tunjanganHariRayaKeagamaan'];
        $pengupahan->bonus_gratifikasi = $input['bonusGratifikasi'];

        return $pengupahan->save();
    }

    public function update($input)
    {
        return PengupahanModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'jumlah_upah_pekerja_dibayarkan'=>$input['upahDiBayarkan'],
                'tingkat_upah_tertinggi'=>$input['tingkatUpahTertinggi'],
                'tingkat_upah_terendah'=>$input['tingkatUpahTerendah'],
                'jumlah_penerima_umk_ump_umsk'=>$input['jmlPenerimaUmkUmpUmsk'],
                'jumlah_penerima_umk_ump_umsk_dalam_persen'=>$input['jmlPenerimaUmkUmpUmskPersen'],
                'tunjangan_hari_raya_keagamaan'=>$input['tunjanganHariRayaKeagamaan'],
                'bonus_gratifikasi'=>$input['bonusGratifikasi']
            ]);
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
        // TODO: Implement paginationData() method.
    }

    public function readByLapor($laporId)
    {
        return PengupahanModel::where('lapor_id','=',$laporId)->first();
    }
}