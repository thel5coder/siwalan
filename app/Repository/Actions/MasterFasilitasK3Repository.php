<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 14.19
 */

namespace App\Repository\Actions;


use App\Models\MasterFasilitasK3Model;
use App\Repository\Contract\IMasterFasilitasK3Repository;
use App\Repository\Contract\Pagination\PaginationParam;

class MasterFasilitasK3Repository implements IMasterFasilitasK3Repository
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
        return MasterFasilitasK3Model::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}