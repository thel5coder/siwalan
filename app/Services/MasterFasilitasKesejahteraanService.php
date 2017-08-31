<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 18.17
 */

namespace App\Services;


use App\Repository\Contract\IMasterFasilitasKesejahteraanRepository;

class MasterFasilitasKesejahteraanService extends BaseService
{
    protected $masterFasilitasKesejahteraanRepository;

    public function __construct(IMasterFasilitasKesejahteraanRepository $masterFasilitasKesejahteraanRepository)
    {
        $this->masterFasilitasKesejahteraanRepository = $masterFasilitasKesejahteraanRepository;
    }

    public function showAll(){
        return $this->getAllObject($this->masterFasilitasKesejahteraanRepository);
    }

}