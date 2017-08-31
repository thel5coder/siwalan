<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 21.38
 */

namespace App\Repository\Actions;


use App\Models\BpjsKesehatanModel;
use App\Repository\Contract\IBpjsKesehatanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class BpjsKesehatanRepository implements IBpjsKesehatanRepository
{

    public function create($input)
    {
        $bpjs = new BpjsKesehatanModel();
        $bpjs->lapor_id = $input['laporId'];
        $bpjs->mulai_menjadi_peserta = date('Y-m-d',strtotime($input['tglMenjadiPeserta']));
        $bpjs->nomor_pendaftaran = $input['nomorPendaftaran'];
        $bpjs->jumlah_peserta_tenaga_kerja = $input['jmlPesertaTenagaKerja'];
        $bpjs->jumlah_peserta_keluarga = $input['jmlPesertaTenagaKerja'];
        $bpjs->jaminan_pemeliharaan_kesehatan = $input['jaminanPemeliharaanKesehatan'];

        return $bpjs->save();
    }

    public function update($input)
    {
        return BpjsKesehatanModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'mulai_menjadi_peserta'=>date('Y-m-d',strtotime($input['tglMenjadiPeserta'])),
                'nomor_pendaftaran'=>$input['nomorPendaftaran'],
                'jumlah_peserta_tenaga_kerja'=>$input['jmlPesertaTenagaKerja'],
                'jumlah_peserta_keluarga'=>$input['jmlPesertaKeluarga'],
                'jaminan_pemeliharaan_kesehatan'=>$input['jaminanPemeliharaanKesehatan']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return BpjsKesehatanModel::where('lapor_id','=',$id)->first();
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