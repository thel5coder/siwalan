<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 01/09/2017
 * Time: 01.05
 */

namespace App\Repository\Actions;


use App\Models\PerangkatOrganisasiKetenagakerjaanModel;
use App\Repository\Contract\IPerangkatOrganisasiRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class PerangkatOrganisasiRepository implements IPerangkatOrganisasiRepository
{

    public function create($input)
    {
        $perangkat = new PerangkatOrganisasiKetenagakerjaanModel();
        $perangkat->lapor_id = $input['laporId'];
        $perangkat->jenis_perangkat_organisasi = $input['jenisPerangkatOrganisasi'];

        return $perangkat->save();
    }

    public function update($input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return PerangkatOrganisasiKetenagakerjaanModel::where('lapor_id','=',$id)->delete();
    }

    public function read($id)
    {
        return PerangkatOrganisasiKetenagakerjaanModel::where('lapor_id','=',$id)->get();
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