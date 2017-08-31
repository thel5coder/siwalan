<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 18.35
 */

namespace App\Repository\Actions;


use App\Models\FasilitasKesejahteraanModel;
use App\Repository\Contract\IFasilitasKesejahteraanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class FasilitasKesejahteraanRepository implements IFasilitasKesejahteraanRepository
{

    public function create($input)
    {
        $fasilitas = new FasilitasKesejahteraanModel();
        $fasilitas->lapor_id = $input['laporId'];
        $fasilitas->fasilitas_kesejahteraan_id = $input['fasilitasKesejahteraanId'];

        return $fasilitas->save();
    }

    public function update($input)
    {
        // TODO: Implement update() method.
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
        return FasilitasKesejahteraanModel::where('lapor_id','=',$laporId)->get();
    }

    public function deleteByLapor($laporId)
    {
        return FasilitasKesejahteraanModel::where('lapor_id','=',$laporId)->delete();
    }
}