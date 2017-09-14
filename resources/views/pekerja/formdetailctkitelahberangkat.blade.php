<form id="frmDetailCtkiTelahBerangkat" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <input type="hidden" id="idTelahBerangkat" value=""/>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Jabatan</label>
                <div class="col-md-3">
                    <input type="text" id="namaJabatanTelahBerangkat" name="namaJabatanTelahBerangkat"
                           class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Jabatan</label>
                <div class="col-md-3">
                    <input type="text" id="kodeJabatanTelahBerangkat" name="kodeJabatanTelahBerangkat"
                           class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Pendidikan</label>
                <div class="col-md-9">
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SD
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlSdTelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SMTP
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlSmtpTelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SMTA
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlSmtaTelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan D3
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlD3TelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S1
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlS1TelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S2
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlS2TelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S3
                            <input type="text" class="form-control jmlPendidikanTelahBerangkat" id="jmlS3TelahBerangkat" value="0" onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Hubungan Kerja</label>
                <div class="col-md-9">
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tetap WNI
                            <input type="text" class="form-control" id="jmlPekerjaTetapWniTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap WNI
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapWniTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tetap WNA
                            <input type="text" class="form-control" id="jmlPekerjaTetapWnaTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap WNA
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapWnaTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tetap PENCA
                            <input type="text" class="form-control" id="jmlPekerjaTetapPencaTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap PENCA
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapPencaTelahBerangkat" value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tblDetailCtkiTelahBerangkat">
                    <thead>
                    <tr>
                        <th data-column-id="nama_jabatan" rowspan="3">Jabatan</th>
                        <th data-column-id="kode_jabatan" rowspan="3">Kode</th>
                        <th colspan="8" rowspan="2">Pendidikan</th>
                        <th colspan="6">Hubungan Kerja</th>
                        <th data-column-id="aksi" data-formatter="aksi" data-sortable="false" rowspan="3">Aksi
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">WNI</th>
                        <th colspan="2">WNA</th>
                        <th colspan="2">PENCA</th>
                    </tr>
                    <tr>
                        <th>SD</th>
                        <th>SMTP</th>
                        <th>SMTA</th>
                        <th>D3</th>
                        <th>S1</th>
                        <th>S2</th>
                        <th>S3</th>
                        <th>Jumlah</th>
                        <th>Tetap</th>
                        <th>Tidak Tetap</th>
                        <th>Tetap</th>
                        <th>Tidak Tetap</th>
                        <th>Tetap</th>
                        <th>Tidak Tetap</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailCtkiTelahBerangkat as $detailTelahBerangkat)
                        <tr>
                            <td>{{$detailTelahBerangkat->nama_jabatan}}</td>
                            <td>{{$detailTelahBerangkat->kode_jabatan}}</td>
                            <td>{{$detailTelahBerangkat->jml_sd}}</td>
                            <td>{{$detailTelahBerangkat->jml_smtp}}</td>
                            <td>{{$detailTelahBerangkat->jml_smta}}</td>
                            <td>{{$detailTelahBerangkat->jml_d3}}</td>
                            <td>{{$detailTelahBerangkat->jml_s1}}</td>
                            <td>{{$detailTelahBerangkat->jml_s2}}</td>
                            <td>{{$detailTelahBerangkat->jml_s3}}</td>
                            <td>{{$detailTelahBerangkat->total}}</td>
                            <td>{{$detailTelahBerangkat->jml_wni_tetap}}</td>
                            <td>{{$detailTelahBerangkat->jml_wni_tidak_tetap}}</td>
                            <td>{{$detailTelahBerangkat->jml_wna_tetap}}</td>
                            <td>{{$detailTelahBerangkat->jml_wna_tidak_tetap}}</td>
                            <td>{{$detailTelahBerangkat->jml_penca_tetap}}</td>
                            <td>{{$detailTelahBerangkat->jml_penca_tidak_tetap}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-icon btn-primary cmdBtnUbahTelahBerangkat"
                                            data-row-id="{{$detailTelahBerangkat->id}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-danger cmdBtnHapusTelahBerangkat"
                                            data-row-id="{{$detailTelahBerangkat->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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