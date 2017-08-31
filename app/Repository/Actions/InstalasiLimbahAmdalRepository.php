<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 09.04
 */

namespace App\Repository\Actions;


use App\Models\InstalasiLimbahAmdalModel;
use App\Repository\Contract\IInstalasiLimbahAmdalRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class InstalasiLimbahAmdalRepository implements IInstalasiLimbahAmdalRepository
{

    public function create($input)
    {
        $instalasiLimbahAmdal = new InstalasiLimbahAmdalModel();
        $instalasiLimbahAmdal->lapor_id = $input['laporId'];
        $instalasiLimbahAmdal->instalasi_limbah = $input['instalasiLimbah'];
        $instalasiLimbahAmdal->amdal = $input['sertifikatAmdal'];
        $instalasiLimbahAmdal->no_sertifikat = $input['noSertifikat'];
        $instalasiLimbahAmdal->tgl_sertifikat = $input['tglSertifikat'];

        return $instalasiLimbahAmdal->save();
    }

    public function update($input)
    {
        return InstalasiLimbahAmdalModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'amdal'=>$input['sertifikatAmdal'],
                'no_sertifikat'=>$input['noSertifikat'],
                'tgl_sertifikat'=>$input['tglSertifikat']
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
        return InstalasiLimbahAmdalModel::where('lapor_id','=',$laporId)->first();
    }
}