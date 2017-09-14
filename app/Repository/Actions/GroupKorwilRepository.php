<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 00.58
 */

namespace App\Repository\Actions;


use App\Models\GroupKorwil;
use App\Models\MasterKorwilModel;
use App\Repository\Contract\IGroupKorwilRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

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
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(MasterKorwilModel::count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = MasterKorwilModel::take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = MasterKorwilModel::skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = MasterKorwilModel::where('nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = MasterKorwilModel::where('nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        for($i=0;$i<count($data);$i++){
            $kabupaten='';
            $idKorwil = $data[$i]['id'];
            $dataKabupaten = GroupKorwil::join('kabupaten','kabupaten.id','=','group_korwil.kabupaten_id')
                ->select('kabupaten.nama_kabupaten')
                ->where('group_korwil.korwil_id','=',$idKorwil)->get();
            for($j=0;$j<count($dataKabupaten);$j++){
                if($j+1 != count($dataKabupaten)){
                    $kabupaten .= $dataKabupaten[$j]->nama_kabupaten.",";
                }else{
                    $kabupaten .= $dataKabupaten[$j]->nama_kabupaten;
                }
            }
            $data[$i]['nama_kabupaten']=$kabupaten;
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function readMasterKorwil($id)
    {
        return MasterKorwilModel::find($id);
    }

}