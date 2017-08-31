<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.59
 */

namespace App\Services;


use App\Repository\Contract\IKabupatenRepository;

class KabupatenService extends BaseService
{
    protected $kabupatenRepository;

    public function __construct(IKabupatenRepository $kabupatenRepository)
    {
        $this->kabupatenRepository = $kabupatenRepository;
    }

    public function read($id){
        return $this->readObject($this->kabupatenRepository,$id);
    }



}