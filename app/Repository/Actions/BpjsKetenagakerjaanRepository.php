<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 19.30
 */

namespace App\Repository\Actions;


use App\Models\BpjsKetenagakerjaanModel;
use App\Repository\Contract\IBpjsKetenagakerjaanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class BpjsKetenagakerjaanRepository implements IBpjsKetenagakerjaanRepository
{

    public function create($input)
    {
        $bpjs = new BpjsKetenagakerjaanModel();
        $bpjs->lapor_id = $input['laporId'];
        $bpjs->mulai_menjadi_peserta = date('Y-m-d',strtotime($input['tglMenjadiPeserta']));
        $bpjs->nomor_pendaftaran = $input['nomorPendaftaran'];
        $bpjs->jumlah_peserta = $input['jumlahPeserta'];
        $bpjs->jaminan_kecelakaan_kerja = $input['jaminanKecelakaanKerja'];
        $bpjs->jaminan_kematian = $input['jaminanKematian'];
        $bpjs->jaminan_hari_tua = $input['jaminanHariTua'];
        $bpjs->jaminan_pensiun = $input['jaminanPensiun'];

        return $bpjs->save();
    }

    public function update($input)
    {
        return BpjsKetenagakerjaanModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'mulai_menjadi_peserta'=>date('Y-m-d',strtotime($input['tglMenjadiPeserta'])),
                'nomor_pendaftaran'=>$input['nomorPendaftaran'],
                'jumlah_peserta'=>$input['jumlahPeserta'],
                'jaminan_kecelakaan_kerja'=>$input['jaminanKecelakaanKerja'],
                'jaminan_kematian'=>$input['jaminanKematian'],
                'jaminan_hari_tua'=>$input['jaminanHariTua'],
                'jaminan_pensiun'=>$input['jaminanPensiun']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return BpjsKetenagakerjaanModel::where('lapor_id','=',$id)->first();
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