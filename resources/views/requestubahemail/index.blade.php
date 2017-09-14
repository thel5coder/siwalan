@extends('app')
@section('title','Permintaan Rubah Email')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">Permintaan Rubah Email</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Permintaan Rubah Email</li>
                </ul>
            </div>

        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-default panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Permintaan Rubah Email</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblPermintaanRubahEmail">
                            <thead>
                            <tr>
                                <th data-column-id="nama">Nama Perusahaan</th>
                                <th data-column-id="new_email">Email Baru</th>
                                <th data-column-id="alasan_penggantian">Alasan Penggantian</th>
                                <th data-column-id="status" data-formatter="status" data-sortable="false">Status
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function () {

            paginationTable();


        });

        function paginationTable() {
            var grid = $('#tblPermintaanRubahEmail').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{route('paginationRequestUbahEmail')}}",
                formatters: {
                    "status": function (column,row) {
                        if (row.status_request == 'pending') {
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\" data-row-userid=\"" + row.user_id + "\" data-row-newemail=\""+row.new_email+"\" data-row-oldemail=\""+row.email+"\">" +
                                    "<option value=\"\"></option>"+
                                    "<option value=\"pending\" selected>Pending</option>"+
                                    "<option value=\"tolak\">Tolak</option>"+
                                    "<option value=\"setuju\">Setuju</option>"+
                                    "</select>";
                        }else if(row.status_request =='tolak'){
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\" data-row-userid=\"" + row.user_id + "\" data-row-newemail=\""+row.new_email+"\" data-row-oldemail=\""+row.email+"\">" +
                                    "<option value=\"\"></option>"+
                                    "<option value=\"pending\">Pending</option>"+
                                    "<option value=\"tolak\" selected>Tolak</option>"+
                                    "<option value=\"setuju\">Setuju</option>"+
                                    "</select>";
                        }else{
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\" data-row-userid=\"" + row.user_id + "\" data-row-newemail=\""+row.new_email+"\" data-row-oldemail=\""+row.email+"\">" +
                                    "<option value=\"\"></option>"+
                                    "<option value=\"pending\">Pending</option>"+
                                    "<option value=\"tolak\">Tolak</option>"+
                                    "<option value=\"setuju\" selected>Setuju</option>"+
                                    "</select>";
                        }
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {
                grid.find('.cmdChangeStatus').change(function () {
                    var url="{{route('changeStatusRequestChangeEmail')}}";
                    var id = $(this).data('row-id');
                    var userId = $(this).data('row-userid');
                    var newEmail = $(this).data('row-newemail');
                    var oldEmail = $(this).data('row-oldemail');
                    var status = $(this).val();
                    swal({
                        title: "Yakin ingin mengubah status permintaan perubahan email ini?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Ubah Status!'
                    }).then(function () {
                        runWaitMe('body','roundBounce',"Menyimpan...");
                        $.ajax({
                            url:url,
                            method: "POST",
                            data:{
                                id:id,
                                userId:userId,
                                newEmail:newEmail,
                                oldEmail:oldEmail,
                                status:status
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $('body').waitMe('hide');
                                notificationMessage(errorThrown, 'error');
                                $('#tblPermintaanRubahEmail').bootgrid('reload');
                            },
                            success: function (s) {
                                $('body').waitMe('hide');
                                if(s.isSuccess){
                                    $('#tblPermintaanRubahEmail').bootgrid('reload');
                                }else{
                                    var errorMessagesCount = s.message.length;
                                    for (var i = 0; i < errorMessagesCount; i++) {
                                        notificationMessage(s.message[i], 'error');
                                    }
                                }
                            }
                        });
                    });
                })
            });

        }
    </script>
@stop

