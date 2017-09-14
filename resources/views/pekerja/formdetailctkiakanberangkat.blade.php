<form id="frmDetailCtkiAkanBerangkat" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <input type="hidden" id="idAkanBerangkat"/>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Jabatan</label>
                <div class="col-md-3">
                    <input type="text" id="namaJabatanAkanBerangkat" name="namaJabatanAkanBerangkat"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Jabatan</label>
                <div class="col-md-3">
                    <input type="text" id="kodeJabatanAkanBerangkat" name="kodeJabatanAkanBerangkat"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Pendidikan</label>
                <div class="col-md-9">
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SD
                            <input type="text" class="form-control jmlPendidikan" id="jmlSdAkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SMTP
                            <input type="text" class="form-control jmlPendidikan" id="jmlSmtpAkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan SMTA
                            <input type="text" class="form-control jmlPendidikan" id="jmlSmtaAkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan D3
                            <input type="text" class="form-control jmlPendidikan" id="jmlD3AkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S1
                            <input type="text" class="form-control jmlPendidikan" id="jmlS1AkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S2
                            <input type="text" class="form-control jmlPendidikan" id="jmlS2AkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Pendidikan S3
                            <input type="text" class="form-control jmlPendidikan" id="jmlS3AkanBerangkat" value="0"
                                   onkeypress="return hanyaAngka(event)"/>
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
                            <input type="text" class="form-control" id="jmlPekerjaTetapWniAkanBerangkat" value="0"
                                   onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap WNI
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapWniAkanBerangkat" value="0"
                                   onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tetap WNA
                            <input type="text" class="form-control" id="jmlPekerjaTetapWnaAkanBerangkat" value="0"
                                   onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap WNA
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapWnaAkanBerangkat" value="0"
                                   onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tetap PENCA
                            <input type="text" class="form-control" id="jmlPekerjaTetapPencaAkanBerangkat" value="0"
                                   onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label>
                            Jumlah Pekerja Tidak Tetap PENCA
                            <input type="text" class="form-control" id="jmlPekerjaTidakTetapPencaAkanBerangkat"
                                   value="0" onclick="return hanyaAngka(event)"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3"></label>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary heading-btn pull-left"><i
                                class="fa fa-check"></i> Simpan
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tblDetailCtkiAkanBerangkat">
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
                        <th data-column-id="jml_sd">SD</th>
                        <th data-column-id="jml_smp">SMTP</th>
                        <th data-column-id="jml_sma">SMTA</th>
                        <th data-column-id="jml_d3">D3</th>
                        <th data-column-id="jml_s1">S1</th>
                        <th data-column-id="jml_s2">S2</th>
                        <th data-column-id="jml_s3">S3</th>
                        <th data-column-id="total">Jumlah</th>
                        <th data-column-id="jml_wni_tetap">Tetap</th>
                        <th data-column-id="jml_wni_tidak_tetap">Tidak Tetap</th>
                        <th data-column-id="jml_wna_tetap">Tetap</th>
                        <th data-column-id="jml_wna_tidak_tetap">Tidak Tetap</th>
                        <th data-column-id="jml_penca_tetap">Tetap</th>
                        <th data-column-id="jml_penca_tidak_tetap">Tidak Tetap</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailCtkiAkanBerangkat as $detailAkanBerangkat)
                        <tr>
                            <td>{{$detailAkanBerangkat->nama_jabatan}}</td>
                            <td>{{$detailAkanBerangkat->kode_jabatan}}</td>
                            <td>{{$detailAkanBerangkat->jml_sd}}</td>
                            <td>{{$detailAkanBerangkat->jml_smtp}}</td>
                            <td>{{$detailAkanBerangkat->jml_smta}}</td>
                            <td>{{$detailAkanBerangkat->jml_d3}}</td>
                            <td>{{$detailAkanBerangkat->jml_s1}}</td>
                            <td>{{$detailAkanBerangkat->jml_s2}}</td>
                            <td>{{$detailAkanBerangkat->jml_s3}}</td>
                            <td>{{$detailAkanBerangkat->total}}</td>
                            <td>{{$detailAkanBerangkat->jml_wni_tetap}}</td>
                            <td>{{$detailAkanBerangkat->jml_wni_tidak_tetap}}</td>
                            <td>{{$detailAkanBerangkat->jml_wna_tetap}}</td>
                            <td>{{$detailAkanBerangkat->jml_wna_tidak_tetap}}</td>
                            <td>{{$detailAkanBerangkat->jml_penca_tetap}}</td>
                            <td>{{$detailAkanBerangkat->jml_penca_tidak_tetap}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-icon btn-primary cmdBtnUbah"
                                            data-row-id="{{$detailAkanBerangkat->id}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-danger cmdBtnHapus"
                                            data-row-id="{{$detailAkanBerangkat->id}}">
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
    </div>
</form>