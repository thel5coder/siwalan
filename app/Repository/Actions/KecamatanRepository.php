<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.56
 */

namespace App\Repository\Actions;


use App\Models\KecamatanModel;
use App\Repository\Contract\IKecamatanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class KecamatanRepository implements IKecamatanRepository
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
        return KecamatanModel::where('id_kabkota','=',$id)->get();
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