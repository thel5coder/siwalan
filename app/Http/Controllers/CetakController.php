<?php

namespace App\Http\Controllers;

use App\Services\BpjsKesehatanService;
use App\Services\BpjsKetenagakerjaanService;
use App\Services\CtkiAkanBerangkatService;
use App\Services\CtkiTelahBerangkatService;
use App\Services\DetailCtkiAkanBerangkatService;
use App\Services\DetailCtkiTelahBerangkatService;
use App\Services\FasilitasPerusahaanService;
use App\Services\InstalasiLimbahAmdalService;
use App\Services\LimbahProduksiService;
use App\Services\MasterFasilitasK3Service;
use App\Services\MasterFasilitasKesejahteraanService;
use App\Services\PengupahanService;
use App\Services\PerangkatHubunganKerjaService;
use App\Services\PerangkatOrganisasiService;
use App\Services\ProgramPelatihanService;
use App\Services\ProgramPensiunService;
use App\Services\RekapPenerimaanPekerjaService;
use App\Services\UmumService;
use App\Services\UserService;
use App\Services\WajibLaporService;
use App\Services\WaktuKerjaService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class CetakController extends Controller
{
    protected $userService;
    protected $wajibLaporService;
    protected $umumService;
    protected $waktuKerjaService;
    protected $limbahProduksiService;
    protected $instalasiLimbahAmdalService;
    protected $pengupahanService;
    protected $masterFasilitasK3Service;
    protected $masterFasilitasKesejateraan;
    protected $fasilitasPerusahaan;
    protected $bpjsKetenegaKerjaanService;
    protected $bpjsKesehatanService;
    protected $programPensiunService;
    protected $perangkatHubunganKerjaService;
    protected $perangkatOrganisasiService;
    protected $ctkiAkanBerangkatService;
    protected $detailCtkiAkanBerangkatService;
    protected $ctkiTelahBerangkatService;
    protected $detailCtkiTelahBerangkatService;
    protected $rekapPenerimaanPekerjaService;
    protected $programPelatihanService;


    public function __construct(UserService $userService, WajibLaporService $wajibLaporService, UmumService $umumService, WaktuKerjaService $waktuKerjaService,
                                LimbahProduksiService $limbahProduksiService, InstalasiLimbahAmdalService $instalasiLimbahAmdalService,
                                PengupahanService $pengupahanService, MasterFasilitasK3Service $masterFasilitasK3Service, FasilitasPerusahaanService $fasilitasPerusahaanService,
                                MasterFasilitasKesejahteraanService $masterFasilitasKesejahteraanService, BpjsKesehatanService $bpjsKesehatanService,
                                BpjsKetenagakerjaanService $bpjsKetenagakerjaanService, ProgramPensiunService $programPensiunService,
                                PerangkatHubunganKerjaService $perangkatHubunganKerjaService, PerangkatOrganisasiService $perangkatOrganisasiService,
                                CtkiAkanBerangkatService $ctkiAkanBerangkatService, DetailCtkiAkanBerangkatService $detailCtkiAkanBerangkatService,
                                CtkiTelahBerangkatService $ctkiTelahBerangkatService, DetailCtkiTelahBerangkatService $detailCtkiTelahBerangkatService,
                                RekapPenerimaanPekerjaService $rekapPenerimaanPekerjaService,ProgramPelatihanService $programPelatihanService)
    {
        $this->userService = $userService;
        $this->wajibLaporService = $wajibLaporService;
        $this->umumService = $umumService;
        $this->waktuKerjaService = $waktuKerjaService;
        $this->limbahProduksiService = $limbahProduksiService;
        $this->instalasiLimbahAmdalService = $instalasiLimbahAmdalService;
        $this->pengupahanService = $pengupahanService;
        $this->masterFasilitasK3Service = $masterFasilitasK3Service;
        $this->masterFasilitasKesejateraan = $masterFasilitasKesejahteraanService;
        $this->fasilitasPerusahaan = $fasilitasPerusahaanService;
        $this->bpjsKesehatanService = $bpjsKesehatanService;
        $this->bpjsKetenegaKerjaanService = $bpjsKetenagakerjaanService;
        $this->programPensiunService = $programPensiunService;
        $this->perangkatHubunganKerjaService = $perangkatHubunganKerjaService;
        $this->perangkatOrganisasiService = $perangkatOrganisasiService;
        $this->ctkiAkanBerangkatService = $ctkiAkanBerangkatService;
        $this->detailCtkiAkanBerangkatService = $detailCtkiAkanBerangkatService;
        $this->ctkiTelahBerangkatService = $ctkiTelahBerangkatService;
        $this->detailCtkiTelahBerangkatService = $detailCtkiTelahBerangkatService;
        $this->rekapPenerimaanPekerjaService= $rekapPenerimaanPekerjaService;
        $this->programPelatihanService = $programPelatihanService;
    }

    public function cetak($id, $perusahaanId)
    {
        $perusahaan = $this->userService->read($perusahaanId)->getResult();
        $wajibLapor = $this->wajibLaporService->read($id)->getResult();
        $ketenagaKerjaanUmum = $this->umumService->read($id)->getResult();
        $waktuKerja = $this->waktuKerjaService->readByLapor($id)->getResult();
        $masteWaktuKerja = $this->waktuKerjaService->showAllMasterWaktuKerja()->getResult();
        $dataLimbahProduksi = $this->limbahProduksiService->readByLapor($id)->getResult();
        $instalasiLImbahAmdal = $this->instalasiLimbahAmdalService->readByLapor($id)->getResult();
        $pengupahan = $this->pengupahanService->readByLapor($id)->getResult();
        $masterFasilitasK3 = $this->masterFasilitasK3Service->showAll()->getResult();
        $masterFasilitasKesejahteraan = $this->masterFasilitasKesejateraan->showAll()->getResult();
        $fasilitasPerusahaanK3 = $this->fasilitasPerusahaan->readFasilitasK3ByLapor($id)->getResult();
        $fasilitasPeruahaanKesejahteraan = $this->fasilitasPerusahaan->readFasilitasKesejahteraanByLapor($id)->getResult();
        $bpjsKetenagaKerjaan = $this->bpjsKetenegaKerjaanService->read($id)->getResult();
        $bpjsKesehatan = $this->bpjsKesehatanService->read($id)->getResult();
        $programPensiun = $this->programPensiunService->read($id)->getResult();
        $perangkatHubunganKerja = $this->perangkatHubunganKerjaService->read($id)->getResult();
        $perangkatOrganisasi = $this->perangkatOrganisasiService->read($id)->getResult();
        $ctkiAkanBerangkat = $this->ctkiAkanBerangkatService->read($id)->getResult();
        $dataDetailCtkiAkanBerangkat = $this->detailCtkiAkanBerangkatService->readByLapor($id)->getResult();
        $ctkiTelahBerangkat = $this->ctkiTelahBerangkatService->read($id)->getResult();
        $dataDetailCtkiTelahBerangkat = $this->detailCtkiTelahBerangkatService->readByLapor($id)->getResult();
        $rekapPenerimaanPekerja=$this->rekapPenerimaanPekerjaService->read($id)->getResult();
        $programPelatihan = $this->programPelatihanService->read($id)->getResult();
//

        return view('cetakan.wajiblapor')
            ->with('lapor', $wajibLapor)
            ->with('perusahaan', $perusahaan)
            ->with('umum', $ketenagaKerjaanUmum)
            ->with('waktuKerja', $waktuKerja)
            ->with('dataMasterWaktuKerja', $masteWaktuKerja)
            ->with('dataLimbahProduksi', $dataLimbahProduksi)
            ->with('instalasiLimbahAmdal', $instalasiLImbahAmdal)
            ->with('pengupahan', $pengupahan)
            ->with('dataMasterFasilitasK3', $masterFasilitasK3)
            ->with('dataMasterFasilitasKesejahteraan', $masterFasilitasKesejahteraan)
            ->with('fasilitasPerusahaanK3', $fasilitasPerusahaanK3)
            ->with('fasilitasPerusahaanKesejahteraan', $fasilitasPeruahaanKesejahteraan)
            ->with('bpjsKetenagaKerjaan', $bpjsKetenagaKerjaan)
            ->with('bpjsKesehatan', $bpjsKesehatan)
            ->with('programPensiun', $programPensiun)
            ->with('perangkatHubunganKerja', $perangkatHubunganKerja)
            ->with('perangkatOrganisasi', $perangkatOrganisasi)
            ->with('ctkiAkanBerangkat', $ctkiAkanBerangkat)
            ->with('dataDetailCtkiAkanBerangkat', $dataDetailCtkiAkanBerangkat)
            ->with('ctkiTelahBerangkat', $ctkiTelahBerangkat)
            ->with('dataDetailCtkiTelahBerangkat', $dataDetailCtkiTelahBerangkat)
            ->with('rekapPenerimaanPekerja',$rekapPenerimaanPekerja)
            ->with('programPelatihan',$programPelatihan);
    }

    public function cetakBuktiLapor($id)
    {
        $wajibLapor = $this->wajibLaporService->read($id)->getResult();

        return view('cetakan.bukti')
            ->with('wajibLapor', $wajibLapor);
    }
}
