@extends('app')
@section('title','Waktu Kerja')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">2. Waktu Kerja</span>
                </h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">2. Waktu Kerja</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <form id="formWaktuKerja">
                <div class="panel panel-default panel-flat">
                    <div class="panel-heading">
                        Waktu Kerja
                    </div>
                    <div class="panel-body">
                        <input type="hidden" value="{{$laporId}}" id="laporId"/>
                        @if(count($waktuKerja)>0)
                            <?php $select = array(); ?>
                            @for($i=0;$i<8;$i++)
                                @if(isset($waktuKerja[$i]))
                                    <?php $select[] = 'checked'?>
                                @else
                                    <?php $select[] = ''?>
                                @endif
                            @endfor
                            <div class="row">
                                <div class="form-group">
                                    @for($i=0;$i<count($masterWaktuKerja);$i++)
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{$masterWaktuKerja[$i]->id}}"
                                                           class="masterWaktuKerja" {{$select[$i]}}> {{$masterWaktuKerja[$i]->nama_waktu_kerja}}
                                                </label>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group">
                                    @foreach($masterWaktuKerja as $masterKerja)
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{$masterKerja->id}}"
                                                           class="masterWaktuKerja"> {{$masterKerja->nama_waktu_kerja}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
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
@stop
@section('customscript')
    <script>
        var count = 0;
        var idMasterKerja = [];
        $(document).ready(function () {
            $('#formWaktuKerja').submit(function (e) {
                e.preventDefault();
                runWaitMe('body', 'roundBounce', 'Menyimpan...');
                if (idMasterKerja.length == 0) {
                    $('body').waitMe('hide');
                    notificationMessage('Pilih waktu kerja dahulu', 'info');
                    return false;
                } else {
                    $.ajax({
                        url: "{{route('postWaktuKerja')}}",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            masterKerjaId: idMasterKerja
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                $('body').waitMe('hide');
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            })

            $('.masterWaktuKerja').change(function () {
                idMasterKerja = [];
                $('.masterWaktuKerja').each(function () {
                    if ($(this).prop('checked')) {
                        idMasterKerja.push($(this).val())
                    }
                });
                console.log(idMasterKerja);
            })
        });
    </script>
@stop

