<form id="frmRekapPekerja" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            @if(count($rekapPenerimaanPekerja)>0)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah penerimaan pekerja selama 12 bulan terakhir</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPenerimaanPekerja" name="jmlPenerimaanPekerja" value="{{$rekapPenerimaanPekerja->jml_penerimaan_pekerja}}"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah pekerja berhent selama 12 bulan terakhir</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPekerjaBerhenti" name="jmlPekerjaBerhenti" value="{{$rekapPenerimaanPekerja->jml_pekerja_berhenti}}"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah penerimaan pekerja selama 12 bulan terakhir</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPenerimaanPekerja" name="jmlPenerimaanPekerja" value="0"
                                   class="form-control" onkeypress="return hanyaAngka(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Jumlah pekerja berhent selama 12 bulan terakhir</label>
                        <div class="col-md-3">
                            <input type="text" id="jmlPekerjaBerhenti" name="jmlPekerjaBerhenti" value="0"
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