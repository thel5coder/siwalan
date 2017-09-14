<form id="frmProgramPelatihan" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            @if(count($programPelatihan)>0)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pelatihan bagi Pekerja</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPelatihanPekerja"
                                           value="1" @if($programPelatihan->program_pelatihan_bagi_pekerja == 1) {{'checked'}} @endif required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPelatihanPekerja"
                                           value="0" @if($programPelatihan->program_pelatihan_bagi_pekerja == 0) {{'checked'}} @endif required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pemegangan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPemegangan"
                                           value="1" @if($programPelatihan->program_pemegangan == 1) {{'checked'}} @endif required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPemegangan"
                                           value="0" @if($programPelatihan->program_pemegangan == 0) {{'checked'}} @endif required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Fasilitas Pelatihan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="fasilitasPelatihan"
                                           value="1" @if($programPelatihan->fasilitas_pelatihan == 1) {{'checked'}} @endif required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="fasilitasPelatihan"
                                           value="0" @if($programPelatihan->fasilitas_pelatihan == 0) {{'checked'}} @endif required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pengindonesiaan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPengindonesiaan"
                                           value="1" @if($programPelatihan->program_pengindonesiaan == 1) {{'checked'}} @endif required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPengindonesiaan"
                                           value="0" @if($programPelatihan->program_pengindonesiaan == 0) {{'checked'}} @endif required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pelatihan bagi Pekerja</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPelatihanPekerja"
                                           value="1" required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPelatihanPekerja"
                                           value="0" required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pemegangan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPemegangan"
                                           value="1" required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPemegangan"
                                           value="0" required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Fasilitas Pelatihan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="fasilitasPelatihan"
                                           value="1" required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="fasilitasPelatihan"
                                           value="0" required>Tidak
                                    Ada
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Program Pengindonesiaan</label>
                        <div class="col-md-3">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPengindonesiaan"
                                           value="1" required>Ada
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="programPengindonesiaan"
                                           value="0" required>Tidak
                                    Ada
                                </label>
                            </div>
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