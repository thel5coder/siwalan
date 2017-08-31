<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 07.42
 */

namespace App\Repository\Actions;


use App\Models\LimbahProduksiModel;
use App\Repository\Contract\ILimbahProduksiRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class LimbahProduksiRepository implements ILimbahProduksiRepository
{

    public function create($input)
    {
        $limbahProduksi = new LimbahProduksiModel();
        $limbahProduksi->lapor_id = $input['laporId'];
        $limbahProduksi->jenis_limbah_produksi = $input['jenisLimbahProduksi'];

        return $limbahProduksi->save();
    }

    public function update($input)
    {
        return null;
    }

    public function delete($id)
    {
        return null;
    }

    public function read($id)
    {
        return null;
    }

    public function showAll()
    {
        return null;
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function readByLapor($laporId)
    {
        return LimbahProduksiModel::where('lapor_id','=',$laporId)->get();
    }

    public function deleteByLapor($laporId)
    {
        return LimbahProduksiModel::where('lapor_id','=',$laporId)->delete();
    }


}