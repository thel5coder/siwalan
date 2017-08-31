<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 22.57
 */

namespace App\Repository\Actions;


use App\Models\JenisUsahaModel;
use App\Repository\Contract\IJenisUsahaRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class JenisUsahaRepository implements IJenisUsahaRepository
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
        return JenisUsahaModel::find($id);
    }

    public function showAll()
    {
        return JenisUsahaModel::all();
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

}