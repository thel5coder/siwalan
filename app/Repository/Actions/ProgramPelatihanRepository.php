<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 09.21
 */

namespace App\Repository\Actions;


use App\Models\ProgramPelatihanModel;
use App\Repository\Contract\IProgramPelatihanRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class ProgramPelatihanRepository implements IProgramPelatihanRepository
{

    public function create($input)
    {
        $programPelatihan = new ProgramPelatihanModel();
        $programPelatihan->lapor_id = $input['laporId'];
        $programPelatihan->program_pelatihan_bagi_pekerja = $input['pelatihanPekerja'];
        $programPelatihan->program_pemegangan = $input['programPemegangan'];
        $programPelatihan->fasilitas_pelatihan = $input['fasilitasPelatihan'];
        $programPelatihan->program_pengindonesiaan = $input['programPengindonesiaan'];

        return $programPelatihan->save();
    }

    public function update($input)
    {
        return ProgramPelatihanModel::where('lapor_id','=',$input['laporId'])
            ->update([
                'program_pelatihan_bagi_pekerja'=>$input['pelatihanPekerja'],
                'program_pemegangan'=>$input['programPemegangan'],
                'fasilitas_pelatihan'=>$input['fasilitasPelatihan'],
                'program_pengindonesiaan'=>$input['programPengindonesiaan']
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return ProgramPelatihanModel::where('lapor_id','=',$id)->first();
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