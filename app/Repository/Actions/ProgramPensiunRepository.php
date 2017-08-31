<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 22.49
 */

namespace App\Repository\Actions;


use App\Models\ProgramPensiunModel;
use App\Repository\Contract\IProgramPensiunRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class ProgramPensiunRepository implements IProgramPensiunRepository
{

    public function create($input)
    {
        $programPensiun = new ProgramPensiunModel();
        $programPensiun->lapor_id = $input['laporId'];
        $programPensiun->jenis_program_pensiun = $input['jenisProgramPensiun'];

        return $programPensiun->save();
    }

    public function update($input)
    {
        return ProgramPensiunModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'jenis_program_pensiun'=>$input['jenisProgramPensiun']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return ProgramPensiunModel::where('lapor_id','=',$id)->first();
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