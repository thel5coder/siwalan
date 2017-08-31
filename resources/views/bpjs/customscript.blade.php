<script>
    $(document).ready(function () {
        $('.tglMenjadiPeserta').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('#jaminanKecelakaanKerja').change(function () {
            if ($(this).prop('checked')) {
                $('#jenisJaminanKecelkaanKerja').prop('disabled', false);
            } else {
                $('#jenisJaminanKecelkaanKerja').prop('disabled', true);
            }
        });

        $('#jaminanKematian').change(function () {
            if ($(this).prop('checked')) {
                $('#jenisBpjsKematian').prop('disabled', false);
            } else {
                $('#jenisBpjsKematian').prop('disabled', true);
            }
        });

        $('#jaminanHariTua').change(function () {
            if ($(this).prop('checked')) {
                $('#jenisBpjsJaminanHariTua').prop('disabled', false);
            } else {
                $('#jenisBpjsJaminanHariTua').prop('disabled', true);
            }
        });

        $('#jaminanPensiun').change(function () {
            if ($(this).prop('checked')) {
                $('#jenisBpjsJaminanPensiun').prop('disabled', false);
            } else {
                $('#jenisBpjsJaminanPensiun').prop('disabled', true);
            }
        });

        $('#jaminanPemeliharaanKesehatan').change(function () {
            if($(this).prop('checked')){
                $('#jenisJaminanPemeliharaanKesehatan').prop('disabled',false);
            }else{
                $('#jenisJaminanPemeliharaanKesehatan').prop('disabled',true);
            }
        });

        $('#frmProgramPensiun').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                programPensiun: {
                    required: true
                }
            },

            messages: {
                programPensiun: {
                    required: "Pilih salah satu program pensiun dahulu"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                runWaitMe('body', 'roundBounce', 'Menyimpan...');

                $.ajax({
                    url: "<?= route('postProgramPensiun')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        jenisProgramPensiun:$("input[name='programPensiun']:checked").val()
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            notificationMessage('Berhasil', 'success');
                            setTimeout(function () {
                                window.location.reload();
                            }, 3000);
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
        });

        $('#frmBpjsKetenagakerjaan').submit(function (e) {
            e.preventDefault();
            runWaitMe('body', 'roundBounce', 'Menyimpan...');
            if ($('#jaminanKecelakaanKerja').prop('checked')) {
                var jenisJaminanKecelakaanKerja = $('#jenisJaminanKecelkaanKerja').val();
            } else {
                var jenisJaminanKecelakaanKerja = '';
            }

            if ($('#jaminanKematian').prop('checked')) {
                var jenisJaminanKematian = $('#jenisBpjsKematian').val();
            } else {
                var jenisJaminanKematian = '';
            }

            if ($('#jaminanHariTua').prop('checked')) {
                var jenisJaminanHariTua = $('#jenisBpjsJaminanHariTua').val();
            } else {
                var jenisJaminanHariTua = '';
            }

            if ($('#jaminanPensiun').prop('checked')) {
                var jenisJaminanPensiun = $('#jenisBpjsJaminanPensiun').val();
            } else {
                var jenisJaminanPensiun = '';
            }

            $.ajax({
                url: "{{route('postBpjsKetenagakerjaan')}}",
                method: "POST",
                data: {
                    laporId: $('#laporId').val(),
                    tglMenjadiPeserta: $('#tglMenjadiPeserta').val(),
                    nomorPendaftaran: $('#nomorPendaftaran').val(),
                    jumlahPeserta: $('#jumlahPeserta').val(),
                    jaminanKecelakaanKerja: jenisJaminanKecelakaanKerja,
                    jaminanKematian: jenisJaminanKematian,
                    jaminanHariTua: jenisJaminanHariTua,
                    jaminanPensiun: jenisJaminanPensiun
                },
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    $('body').waitMe('hide');
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.isSuccess) {
                        notificationMessage('Berhasil', 'success');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $('body').waitMe('hide');
                        var errorMessagesCount = s.message.length;
                        for (var i = 0; i < errorMessagesCount; i++) {
                            notificationMessage(s.message[i], 'error');
                        }
                    }
                }
            });
        });
        $('#frmBpjsKesehatan').submit(function (e) {
            e.preventDefault();
            runWaitMe('body', 'roundBounce', 'Menyimpan...');
            if ($('#jaminanPemeliharaanKesehatan').prop('checked')) {
                var jenisJaminanPemeliharaanKesehatan = $('#jenisJaminanPemeliharaanKesehatan').val();
            } else {
                var jenisJaminanPemeliharaanKesehatan = '';
            }

            $.ajax({
                url: "{{route('postBpjsKesehatan')}}",
                method: "POST",
                data: {
                    laporId: $('#laporId').val(),
                    tglMenjadiPeserta: $('#tglMenjadiPesertaKesehatan').val(),
                    nomorPendaftaran: $('#nomorPendaftaranKesehatan').val(),
                    jmlPesertaTenagaKerja: $('#jumlahPesertaTenagaKerja').val(),
                    jmlPesertaKeluarga: $('#jumlahPesertaKeluarga').val(),
                    jaminanPemeliharaanKesehatan: jenisJaminanPemeliharaanKesehatan
                },
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    $('body').waitMe('hide');
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.isSuccess) {
                        notificationMessage('Berhasil', 'success');
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        $('body').waitMe('hide');
                        var errorMessagesCount = s.message.length;
                        for (var i = 0; i < errorMessagesCount; i++) {
                            notificationMessage(s.message[i], 'error');
                        }
                    }
                }
            });
        });
    });


</script>