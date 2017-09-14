<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 01/09/2017
 * Time: 01.51
 */

namespace App\Repository\Actions;


use App\Models\CtkiBerangkatModel;
use App\Repository\Contract\ICtkiAkanBerangkatRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class CtkiAkanBerangkatRepository implements ICtkiAkanBerangkatRepository
{

    public function create($input)
    {
        $ctki = new CtkiBerangkatModel();
        $ctki->lapor_id = $input['laporId'];
        $ctki->jumlah_laki = $input['jumlahLaki'];
        $ctki->jumlah_perempuan = $input['jumlahPerempuan'];
        $ctki->total = (intval($input['jumlahLaki'])+intval($input['jumlahPerempuan']));

        return $ctki->save();
    }

    public function update($input)
    {
        return CtkiBerangkatModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'jumlah_laki'=>$input['jumlahLaki'],
                'jumlah_perempuan'=>$input['jumlahPerempuan'],
                'total'=>(intval($input['jumlahLaki'])+intval($input['jumlahPerempuan']))
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return CtkiBerangkatModel::where('lapor_id','=',$id)->first();
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