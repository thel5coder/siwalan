<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 30/08/2017
 * Time: 23.39
 */

namespace App\Repository\Actions;


use App\Models\MasterAlatBahanModel;
use App\Repository\Contract\IMasterAlatBahanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class MasterAlatBahanRepository implements IMasterAlatBahanRepository
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
        return MasterAlatBahanModel::orderBy('id','asc')->get();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}