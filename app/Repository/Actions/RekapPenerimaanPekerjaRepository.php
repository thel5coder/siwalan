<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 09.00
 */

namespace App\Repository\Actions;


use App\Models\RekapPenerimaanPekerjaModel;
use App\Repository\Contract\IRekapPenerimaanPekerjaRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class RekapPenerimaanPekerjaRepository implements IRekapPenerimaanPekerjaRepository
{

    public function create($input)
    {
        $rekap = new RekapPenerimaanPekerjaModel();
        $rekap->lapor_id = $input['laporId'];
        $rekap->jml_penerimaan_pekerja = $input['jmlPenerimaanPekerja'];
        $rekap->jml_pekerja_berhenti = $input['jmlPekerjaBerhenti'];

        return $rekap->save();
    }

    public function update($input)
    {
        return RekapPenerimaanPekerjaModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'jml_penerimaan_pekerja'=>$input['jmlPenerimaanPekerja'],
                'jml_pekerja_berhenti'=>$input['jmlPekerjaBerhenti']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return RekapPenerimaanPekerjaModel::where('lapor_id','=',$id)->first();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}