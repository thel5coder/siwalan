<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#perangkatHubunganKerja" role="tab">
                <i class="icon-briefcase"></i>
                Perangkat Hubungan Kerja
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#perangkatOrganisasiKetenagakerjaan" role="tab">
                <i class="icon-make-group"></i>
                Perangkat Organisasi Ketenagakerjaan
            </a>
        </li>
    </ul>
    <div class="tab-content padding-vertical-20">
        <input type="hidden" id="laporId" value="{{$laporId}}"/>
        <div class="tab-pane active" id="perangkatHubunganKerja" role="tabpanel">
            <form id="frmPerangkatHubunganKerja" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($perangkatHubunganKerja)>0)
                            <div class="row">
                                <div class="form-group">
                                    <label for="perangkatHubKerja" class="control-label col-md-3">Perangkat Hub
                                        Kerja</label>
                                    <div class="col-md-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="pk" name="jenisHubungan"
                                                   required @if($perangkatHubunganKerja->pk == 1){{'checked'}}@endif> PK
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="pp" name="jenisHubungan"
                                                   required @if($perangkatHubunganKerja->pp == 1){{'checked'}}@endif> PP
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="kkb" name="jenisHubungan"
                                                   required @if($perangkatHubunganKerja->kkb == 1){{'checked'}}@endif>
                                            KKB
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="tglPengesahanKkbPk"
                                     @if($perangkatHubunganKerja->pk == 1 || $perangkatHubunganKerja->kkb == 1) style="display: block"
                                     @else style="display: none" @endif>
                                    <label for="tglPengesahan" class="control-label col-md-3">Tanggal Pengesahan
                                        PK/KKB</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="tglPengesahan" id="tglPengesahan"
                                               value="{{date('d-m-Y',strtotime($perangkatHubunganKerja->tgl_pengesahan_pk_kkb))}}"/>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group">
                                    <label for="perangkatHubKerja" class="control-label col-md-3">Perangkat Hub
                                        Kerja</label>
                                    <div class="col-md-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="pk" name="jenisHubungan" required> PK
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="pp" name="jenisHubungan" required> PP
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="kkb" name="jenisHubungan" required> KKB
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="tglPengesahanKkbPk">
                                    <label for="tglPengesahan" class="control-label col-md-3">Tanggal Pengesahan
                                        PK/KKB</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="tglPengesahan"
                                               id="tglPengesahan"/>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-primary heading-btn pull-left"><i
                                        class="fa fa-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="tab-pane" id="perangkatOrganisasiKetenagakerjaan" role="tabpanel">
            <form id="frmPerangkatOrginasiKetenagakerjaan" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Perangkat Organisasi Ketanagakerjaan</label>
                            <div class="col-md-9">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="perangkatOrganisasi" value="Biparit"> Biparit
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="perangkatOrganisasi" value="SPTP"> SPTP
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="perangkatOrganisasi" value="Org.Pek"> Org.Pek
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="perangkatOrganisasi" value="P2K3"> P2K3
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="perangkatOrganisasi" value="Apindo"> Apindo
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-primary heading-btn pull-left"><i
                                        class="fa fa-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>