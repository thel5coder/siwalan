<form id="frmCtkiTelahBerangkat" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            @if(count($ctkiTelahBerangkat)>0)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah Pekerja Laki - laki</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlLakiTelahBerangkat" name="jmlLakiTelahBerangkat" value="{{$ctkiTelahBerangkat->jumlah_laki}}"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah Pekerja Perempuan</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPerempuanTelahBerangkat" name="jmlPerempuanTelahBerangkat"
                                   value="{{$ctkiTelahBerangkat->jumlah_perempuan}}"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah Pekerja Laki - laki</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlLakiTelahBerangkat" name="jmlLakiTelahBerangkat" value="0"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah Pekerja Perempuan</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPerempuanTelahBerangkat" name="jmlPerempuanTelahBerangkat"
                                   value="0"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
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