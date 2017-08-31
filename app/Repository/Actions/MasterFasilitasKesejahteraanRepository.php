<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 18.15
 */

namespace App\Repository\Actions;


use App\Models\MasterFasilitasKesejahteraanModel;
use App\Repository\Contract\IMasterFasilitasKesejahteraanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class MasterFasilitasKesejahteraanRepository implements IMasterFasilitasKesejahteraanRepository
{

    public function create($input)
    {
        // TODO: Implement create() method.
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
        return MasterFasilitasKesejahteraanModel::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}