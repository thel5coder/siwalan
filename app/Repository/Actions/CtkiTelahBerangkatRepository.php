<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 07.55
 */

namespace App\Repository\Actions;


use App\Models\CtkiTelahBerangkatModel;
use App\Repository\Contract\ICtkiTelahBerangkatRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class CtkiTelahBerangkatRepository implements ICtkiTelahBerangkatRepository
{

    public function create($input)
    {
        $ctki = new CtkiTelahBerangkatModel();
        $ctki->lapor_id = $input['laporId'];
        $ctki->jumlah_laki = $input['jumlahLaki'];
        $ctki->jumlah_perempuan = $input['jumlahPerempuan'];
        $ctki->total = (intval($input['jumlahLaki']) +intval($input['jumlahPerempuan']));

        return $ctki->save();
    }

    public function update($input)
    {
        return CtkiTelahBerangkatModel::where('lapor_id','=',$input['laporId'])
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
        return CtkiTelahBerangkatModel::where('lapor_id','=',$id)->first();
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