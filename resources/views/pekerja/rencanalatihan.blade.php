<form id="frmRencanaLatihan" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <input type="hidden" id="idRencanaLatihan" value=""/>
            <div class="form-group">
                <label class="control-label col-md-3">Kejuruan</label>
                <div class="col-md-3">
                    <input type="text" id="kejuruan" name="kejuruan"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kode Kejuruan</label>
                <div class="col-md-3">
                    <input type="text" id="kodeKejuruan" name="kodeKejuruan"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Jumlah Peserta</label>
                <div class="col-md-3">
                    <input type="text" id="jmlPeserta" name="jmlPeserta"
                           class="form-control" onkeypress="return hanyaAngka(event)" required/>
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
                <table class="table table-striped table-bordered table-hover" id="tblRencanaPelatihan">
                    <thead>
                    <tr>
                        <th data-column-id="kejuruan">Kejuruan</th>
                        <th data-column-id="kode">Kode</th>
                        <th data-column-id="jml_peserta">Jumlah Peserta</th>
                        <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</form>