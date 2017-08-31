<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.53
 */

namespace App\Repository\Actions;


use App\Models\KabupatenModel;
use App\Repository\Contract\IKabupatenRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class KabupatenRepository implements IKabupatenRepository
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
        return KabupatenModel::where('id_prov','=',$id)->get();
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