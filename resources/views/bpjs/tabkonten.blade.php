<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#bpjsKetenagakerjaan" role="tab">
                <i class="fa fa-users"></i>
                BPJS Ketenagakerjaan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#bpjsKesehatan" role="tab">
                <i class="fa fa-hospital-o"></i>
                BPJS Kesehatan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#programPensiun" role="tab">
                <i class="fa fa-sign-out"></i>
                Program Pensiun
            </a>
        </li>
    </ul>
    <div class="tab-content padding-vertical-20">
        <input type="hidden" id="laporId" value="{{$laporId}}"/>
        <div class="tab-pane active" id="bpjsKetenagakerjaan" role="tabpanel">
            <form id="frmBpjsKetenagakerjaan" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($bpjsKetenagakerjaan)>0)
                            <div class="row">
                                <div class="form-group">
                                    <label for="tglMenjadiPeserta" class="control-label col-md-3">Tanggal
                                        Mulai Menjadi Peserta</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control tglMenjadiPeserta"
                                               id="tglMenjadiPeserta" name="tglMenjadiPeserta"
                                               value="{{date('d-m-Y',strtotime($bpjsKetenagakerjaan->mulai_menjadi_peserta))}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomorPendaftaran" class="control-label col-md-3">Nomor
                                        Pendaftaran</label>
                                    <div class="col-md-4">
                                        <input type="text" id="nomorPendaftaran"
                                               value="{{$bpjsKetenagakerjaan->nomor_pendaftaran}}"
                                               name="nomorPendaftaran" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPeserta" class="control-label col-md-3">Jumlah
                                        Peserta</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPeserta" name="jumlahPeserta"
                                               class="form-control"
                                               value="{{$bpjsKetenagakerjaan->jumlah_peserta}}"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanKecelakaanKerja"
                                                       value="" @if($bpjsKetenagakerjaan->jaminan_kecelakaan_kerja !=''){{'checked'}}@endif>Jaminan
                                                Kecelakaan Kerja
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisJaminanKecelkaanKerja"
                                        @if($bpjsKetenagakerjaan->jaminan_kecelakaan_kerja ==''){{'disabled'}}@endif>
                                            <option value="">Pilih</option>
                                            <option value="A" @if($bpjsKetenagakerjaan->jaminan_kecelakaan_kerja =='A'){{'selected'}}@endif>
                                                A
                                            </option>
                                            <option value="B" @if($bpjsKetenagakerjaan->jaminan_kecelakaan_kerja =='B'){{'selected'}}@endif>
                                                B
                                            </option>
                                            <option value="C" @if($bpjsKetenagakerjaan->jaminan_kecelakaan_kerja =='C'){{'selected'}}@endif>
                                                C
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanKematian"
                                                       value="" @if($bpjsKetenagakerjaan->jaminan_kematian !=''){{'checked'}}@endif>Jaminan
                                                Kematian
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsKematian"
                                        @if($bpjsKetenagakerjaan->jaminan_kematian ==''){{'disabled'}}@endif>
                                            <option value="">Pilih</option>
                                            <option value="A" @if($bpjsKetenagakerjaan->jaminan_kematian =='A'){{'selected'}}@endif>
                                                A
                                            </option>
                                            <option value="B" @if($bpjsKetenagakerjaan->jaminan_kematian =='B'){{'selected'}}@endif>
                                                B
                                            </option>
                                            <option value="C" @if($bpjsKetenagakerjaan->jaminan_kematian =='C'){{'selected'}}@endif>
                                                C
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanHariTua"
                                                       value="" @if($bpjsKetenagakerjaan->jaminan_hari_tua !=''){{'checked'}}@endif>Jaminan
                                                Hari Tua
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsJaminanHariTua"
                                        @if($bpjsKetenagakerjaan->jaminan_hari_tua ==''){{'disabled'}}@endif>
                                            <option value="">Pilih</option>
                                            <option value="A" @if($bpjsKetenagakerjaan->jaminan_hari_tua =='A'){{'selected'}}@endif>
                                                A
                                            </option>
                                            <option value="B" @if($bpjsKetenagakerjaan->jaminan_hari_tua =='B'){{'selected'}}@endif>
                                                B
                                            </option>
                                            <option value="C" @if($bpjsKetenagakerjaan->jaminan_hari_tua =='C'){{'selected'}}@endif>
                                                C
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanPensiun"
                                                       value="" @if($bpjsKetenagakerjaan->jaminan_pensiun !=''){{'checked'}}@endif>Jaminan
                                                Pensiun
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsJaminanPensiun"
                                        @if($bpjsKetenagakerjaan->jaminan_pensiun ==''){{'disabled'}}@endif>
                                            <option value="">Pilih</option>
                                            <option value="A" @if($bpjsKetenagakerjaan->jaminan_pensiun =='A'){{'selected'}}@endif>
                                                A
                                            </option>
                                            <option value="B" @if($bpjsKetenagakerjaan->jaminan_pensiun =='B'){{'selected'}}@endif>
                                                B
                                            </option>
                                            <option value="C" @if($bpjsKetenagakerjaan->jaminan_pensiun =='C'){{'selected'}}@endif>
                                                C
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group">
                                    <label for="tglMenjadiPeserta" class="control-label col-md-3">Tanggal
                                        Mulai Menjadi Peserta</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"
                                               id="tglMenjadiPeserta" name="tglMenjadiPeserta"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomorPendaftaran" class="control-label col-md-3">Nomor
                                        Pendaftaran</label>
                                    <div class="col-md-4">
                                        <input type="text" id="nomorPendaftaran"
                                               name="nomorPendaftaran" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPeserta" class="control-label col-md-3">Jumlah
                                        Peserta</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPeserta" name="jumlahPeserta"
                                               class="form-control"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanKecelakaanKerja"
                                                       value="">Jaminan Kecelakaan Kerja
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisJaminanKecelkaanKerja"
                                                disabled>
                                            <option value="">Pilih</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanKematian"
                                                       value="">Jaminan Kematian
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsKematian"
                                                disabled>
                                            <option value="">Pilih</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanHariTua" value="">Jaminan
                                                Hari Tua
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsJaminanHariTua"
                                                disabled>
                                            <option value="">Pilih</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="jaminanPensiun" value="">Jaminan
                                                Pensiun
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="jenisBpjsJaminanPensiun"
                                                disabled>
                                            <option value="">Pilih</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
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
        <div class="tab-pane" id="bpjsKesehatan" role="tabpanel">
            <form id="frmBpjsKesehatan" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($bpjsKesehatan)>0)
                            <div class="row">
                                <div class="form-group">
                                    <label for="tglMenjadiPesertaKesehatan"
                                           class="control-label col-md-3">Tanggal
                                        Mulai Menjadi Peserta</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control tglMenjadiPeserta"
                                               id="tglMenjadiPesertaKesehatan"
                                               name="tglMenjadiPeserta"
                                               value="{{date('d-m-Y',strtotime($bpjsKesehatan->mulai_menjadi_peserta))}}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomorPendaftaranKesehatan"
                                           class="control-label col-md-3">Nomor
                                        Pendaftaran</label>
                                    <div class="col-md-4">
                                        <input type="text" id="nomorPendaftaranKesehatan"
                                               value="{{$bpjsKesehatan->nomor_pendaftaran}}"
                                               name="nomorPendaftaran" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPesertaTenagaKerja"
                                           class="control-label col-md-3">Jumlah
                                        Peserta Tenaga Kerja</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPesertaTenagaKerja"
                                               name="jumlahPesertaTenagaKerja"
                                               class="form-control"
                                               value="{{$bpjsKesehatan->jumlah_peserta_tenaga_kerja}}"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPesertaKeluarga"
                                           class="control-label col-md-3">Jumlah
                                        Peserta Keluarga</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPesertaKeluarga"
                                               name="jumlahPesertaKeluarga"
                                               class="form-control"
                                               value="{{$bpjsKesehatan->jumlah_peserta_keluarga}}"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       id="jaminanPemeliharaanKesehatan"
                                                       value="" @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan !=''){{'checked'}}@endif>Jaminan
                                                Pemeliharaan Kesehatan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control"
                                                id="jenisJaminanPemeliharaanKesehatan"
                                        @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan ==''){{'disabled'}}@endif>
                                            <option value="">Pilih</option>
                                            <option value="A" @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan =='A'){{'selected'}}@endif>
                                                A
                                            </option>
                                            <option value="B" @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan =='B'){{'selected'}}@endif>
                                                B
                                            </option>
                                            <option value="C" @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan =='C'){{'selected'}}@endif>
                                                C
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group">
                                    <label for="tglMenjadiPesertaKesehatan"
                                           class="control-label col-md-3">Tanggal
                                        Mulai Menjadi Peserta</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control tglMenjadiPeserta"
                                               id="tglMenjadiPesertaKesehatan"
                                               name="tglMenjadiPeserta"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomorPendaftaranKesehatan"
                                           class="control-label col-md-3">Nomor
                                        Pendaftaran</label>
                                    <div class="col-md-4">
                                        <input type="text" id="nomorPendaftaranKesehatan"
                                               name="nomorPendaftaran" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPesertaTenagaKerja"
                                           class="control-label col-md-3">Jumlah
                                        Peserta Tenaga Kerja</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPesertaTenagaKerja"
                                               name="jumlahPesertaTenagaKerja"
                                               class="form-control"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPesertaKeluarga"
                                           class="control-label col-md-3">Jumlah
                                        Peserta Keluarga</label>
                                    <div class="col-md-3">
                                        <input type="text" id="jumlahPesertaKeluarga"
                                               name="jumlahPesertaKeluarga"
                                               class="form-control"
                                               onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       id="jaminanPemeliharaanKesehatan"
                                                       value="">Jaminan
                                                Pemeliharaan Kesehatan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control"
                                                id="jenisJaminanPemeliharaanKesehatan" disabled>
                                            <option value="">Pilih</option>
                                            <option value="A">
                                                A
                                            </option>
                                            <option value="B">
                                                B
                                            </option>
                                            <option value="C">
                                                C
                                            </option>
                                        </select>
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
        <div class="tab-pane" id="programPensiun" role="tabpanel">
            <form id="frmProgramPensiun" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($programPensiun)>0)
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="programPensiun" value="1" required @if($programPensiun->jenis_program_pensiun == 1){{'checked'}}@endif>Dilaksanakan oleh
                                        Dana Pensiun Pemberi Kerja
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="programPensiun" value="2" required @if($programPensiun->jenis_program_pensiun == 2){{'checked'}}@endif>Dilaksanakan oleh
                                        Dana Pensiun Lembaga Keuangan
                                    </label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="programPensiun" value="1" required>Dilaksanakan oleh Dana Pensiun Pemberi Kerja
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="programPensiun" value="2" required>Dilaksanakan oleh Dana Pensiun Lembaga Keuangan
                                    </label>
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
    </div>
</div>