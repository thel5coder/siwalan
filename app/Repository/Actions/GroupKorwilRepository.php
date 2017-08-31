<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 00.58
 */

namespace App\Repository\Actions;


use App\Models\GroupKorwil;
use App\Repository\Contract\IGroupKorwilRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class GroupKorwilRepository implements IGroupKorwilRepository
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
        return GroupKorwil::join('master_korwil','master_korwil.id','=','group_korwil.korwil_id')
            ->select('master_korwil.nama_korwil','group_korwil.kabupaten_id','group_korwil.korwil_id')
            ->where('group_korwil.kabupaten_id','=',$id)
            ->first();
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