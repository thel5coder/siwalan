<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryAppProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\\Repository\\Contract\\IUserRepository', 'App\\Repository\\Actions\UserRepository');
        $this->app->bind('App\\Repository\\Contract\\IMasterWaktuKerjaRepository', 'App\\Repository\\Actions\MasterWaktuKerjaRepository');
        $this->app->bind('App\\Repository\\Contract\\IUmumRepository', 'App\\Repository\\Actions\UmumRepository');
        $this->app->bind('App\\Repository\\Contract\\IKabupatenRepository', 'App\\Repository\\Actions\KabupatenRepository');
        $this->app->bind('App\\Repository\\Contract\\IKecamatanRepository', 'App\\Repository\\Actions\KecamatanRepository');
        $this->app->bind('App\\Repository\\Contract\\IJenisUsahaRepository', 'App\\Repository\\Actions\JenisUsahaRepository');
        $this->app->bind('App\\Repository\\Contract\\IGroupKorwilRepository', 'App\\Repository\\Actions\GroupKorwilRepository');
        $this->app->bind('App\\Repository\\Contract\\IKepemilikanRepository', 'App\\Repository\\Actions\KepemilikanRepository');
        $this->app->bind('App\\Repository\\Contract\\ILaporRepository', 'App\\Repository\\Actions\LaporRepository');
        $this->app->bind('App\\Repository\\Contract\\IWaktuKerjaRepository', 'App\\Repository\\Actions\WaktuKerjaRepository');
        $this->app->bind('App\\Repository\\Contract\\IMasterAlatBahanRepository', 'App\\Repository\\Actions\MasterAlatBahanRepository');
        $this->app->bind('App\\Repository\\Contract\\IPenggunaanAlatBahanRepository', 'App\\Repository\\Actions\PenggunaanAlatBahanRepository');
        $this->app->bind('App\\Repository\\Contract\\ILimbahProduksiRepository', 'App\\Repository\\Actions\LimbahProduksiRepository');
        $this->app->bind('App\\Repository\\Contract\\IInstalasiLimbahAmdalRepository', 'App\\Repository\\Actions\InstalasiLimbahAmdalRepository');
        $this->app->bind('App\\Repository\\Contract\\IPengupahanRepository', 'App\\Repository\\Actions\PengupahanRepository');
        $this->app->bind('App\\Repository\\Contract\\IMasterFasilitasK3Repository', 'App\\Repository\\Actions\MasterFasilitasK3Repository');
        $this->app->bind('App\\Repository\\Contract\\IFasilitasK3Repository', 'App\\Repository\\Actions\FasilitasK3Repository');
        $this->app->bind('App\\Repository\\Contract\\IMasterFasilitasKesejahteraanRepository', 'App\\Repository\\Actions\MasterFasilitasKesejahteraanRepository');
        $this->app->bind('App\\Repository\\Contract\\IFasilitasKesejahteraanRepository', 'App\\Repository\\Actions\FasilitasKesejahteraanRepository');
        $this->app->bind('App\\Repository\\Contract\\IBpjsKetenagakerjaanRepository', 'App\\Repository\\Actions\BpjsKetenagakerjaanRepository');
        $this->app->bind('App\\Repository\\Contract\\IBpjsKesehatanRepository', 'App\\Repository\\Actions\BpjsKesehatanRepository');
        $this->app->bind('App\\Repository\\Contract\\IProgramPensiunRepository', 'App\\Repository\\Actions\ProgramPensiunRepository');
        $this->app->bind('App\\Repository\\Contract\\IPerangkatHubunganKerjaRepository', 'App\\Repository\\Actions\PerangkatHubunganKerjaRepository');
        $this->app->bind('App\\Repository\\Contract\\IPerangkatOrganisasiRepository', 'App\\Repository\\Actions\PerangkatOrganisasiRepository');
        $this->app->bind('App\\Repository\\Contract\\ICtkiAkanBerangkatRepository', 'App\\Repository\\Actions\CtkiAkanBerangkatRepository');
        $this->app->bind('App\\Repository\\Contract\\IDetailCtkiAkanBerangkatRepository', 'App\\Repository\\Actions\DetailCtkiAkanBerangkatRepository');
        $this->app->bind('App\\Repository\\Contract\\ICtkiTelahBerangkatRepository', 'App\\Repository\\Actions\CtkiTelahBerangkatRepository');
        $this->app->bind('App\\Repository\\Contract\\IDetailCtkiTelahBerangkatRepository', 'App\\Repository\\Actions\DetailCtkiTelahBerangkatRepository');
        $this->app->bind('App\\Repository\\Contract\\IRekapPenerimaanPekerjaRepository', 'App\\Repository\\Actions\RekapPenerimaanPekerjaRepository');
        $this->app->bind('App\\Repository\\Contract\\IProgramPelatihanRepository', 'App\\Repository\\Actions\ProgramPelatihanRepository');
        $this->app->bind('App\\Repository\\Contract\\IRencanaPelatihanRepository', 'App\\Repository\\Actions\RencanaPelatihanRepository');
        $this->app->bind('App\\Repository\\Contract\\IUbahEmailRepository', 'App\\Repository\\Actions\UbahEmailRepository');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
