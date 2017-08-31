<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 23.17
 */

namespace App\Repository\Actions;


use App\Models\PerangkatHubunganKerjaModel;
use App\Repository\Contract\IPerangkatHubunganKerjaRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class PerangkatHubunganKerjaRepository implements IPerangkatHubunganKerjaRepository
{

    public function create($input)
    {
        $perangkatHubKerja = new PerangkatHubunganKerjaModel();
        $perangkatHubKerja->lapor_id = $input['laporId'];
        $perangkatHubKerja->pk = $input['pk'];
        $perangkatHubKerja->pp = $input['pp'];
        $perangkatHubKerja->kkb = $input['kkb'];
        $perangkatHubKerja->tgl_pengesahan_pk_kkb = date('Y-m-d',strtotime($input['tglPengesahan']));

        return $perangkatHubKerja->save();
    }

    public function update($input)
    {
        return PerangkatHubunganKerjaModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'pk'=>$input['pk'],
                'pp'=>$input['pp'],
                'kkb'=>$input['kkb'],
                'tgl_pengesahan_pk_kkb'=>date('Y-m-d',strtotime($input['tglPengesahan']))
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return PerangkatHubunganKerjaModel::where('lapor_id','=',$id)->first();
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