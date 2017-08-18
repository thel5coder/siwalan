<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 18/08/2017
 * Time: 06.15
 */

namespace App\Repository\Actions;


use App\Models\MasterWaktuKerjaModel;
use App\Repository\Contract\IMasterWaktuKerjaRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class MasterWaktuKerjaRepository implements IMasterWaktuKerjaRepository
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
        return MasterWaktuKerjaModel::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}