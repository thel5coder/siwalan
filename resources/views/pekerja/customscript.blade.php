<script>
    var totalAkanBerangkat = 0;
    var totalTelahBerangkat = 0
    $(document).ready(function () {

        $('#frmCtkiAkanBerangkat').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                jmlLakiAkanBerangkat: {
                    required: true
                },
                jmlPerempuanAkanBerangkat: {
                    required: true
                }
            },

            messages: {
                jmlLakiAkanBerangkat: {
                    required: "Jumlah pekerja laki - laki harus di isi"
                },
                jmlPerempuanAkanBerangkat: {
                    required: "Jumlah pekerja perempuan harus di isi"
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
                    url: "<?= route('postCtkiAkanBerangkat')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        jumlahLaki: $('#jmlLakiAkanBerangkat').val(),
                        jumlahPerempuan: $('#jmlPerempuanAkanBerangkat').val()
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
        $('#frmCtkiTelahBerangkat').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                jmlLakiTelahBerangkat: {
                    required: true
                },
                jmlPerempuanTelahBerangkat: {
                    required: true
                }
            },

            messages: {
                jmlLakiTelahBerangkat: {
                    required: "Jumlah pekerja laki - laki harus di isi"
                },
                jmlPerempuanTelahBerangkat: {
                    required: "Jumlah pekerja perempuan harus di isi"
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
                    url: "<?= route('postCtkiTelahBerangkat')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        jumlahLaki: $('#jmlLakiTelahBerangkat').val(),
                        jumlahPerempuan: $('#jmlPerempuanTelahBerangkat').val()
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

        $('.jmlPendidikan').keyup(function () {
            totalAkanBerangkat = 0;
            $('.jmlPendidikan').each(function () {
                totalAkanBerangkat += +$(this).val();
            });
            console.log(totalAkanBerangkat);
        });
        $('.jmlPendidikanTelahBerangkat').keyup(function () {
            totalTelahBerangkat = 0;
            $('.jmlPendidikanTelahBerangkat').each(function () {
                totalTelahBerangkat += +$(this).val();
            });
        });

        $('#frmDetailCtkiAkanBerangkat').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                namaJabatanAkanBerangkat: {
                    required: true
                },
                kodeJabatanakanBerangkat: {
                    required: true
                }
            },

            messages: {
                namaJabatanAkanBerangkat: {
                    required: "Nama jabatan harus di isi"
                },
                kodeJabatanakanBerangkat: {
                    required: "Kode jabatan harus di isi"
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

                var urlPostAkanBerangkat = '';
                var idAkanBerangkat = $('#idAkanBerangkat').val();

                if (idAkanBerangkat == '') {
                    urlPostAkanBerangkat = "<?= route('postDetailCtkiAkanBerangkat')?>";
                } else {
                    urlPostAkanBerangkat = "{{route('updateDetailCtkiAkanBerangkat')}}";
                }

                $.ajax({
                    url: urlPostAkanBerangkat,
                    method: "POST",
                    data: {
                        id: idAkanBerangkat,
                        laporId: $('#laporId').val(),
                        namaJabatan: $('#namaJabatanAkanBerangkat').val(),
                        kodeJabatan: $('#kodeJabatanAkanBerangkat').val(),
                        jmlSd: $('#jmlSdAkanBerangkat').val(),
                        jmlSmp: $('#jmlSmtpAkanBerangkat').val(),
                        jmlSma: $('#jmlSmtaAkanBerangkat').val(),
                        jmlD3: $('#jmlD3AkanBerangkat').val(),
                        jmlS1: $('#jmlS1AkanBerangkat').val(),
                        jmlS2: $('#jmlS2AkanBerangkat').val(),
                        jmlS3: $('#jmlS3AkanBerangkat').val(),
                        jmlWniTetap: $('#jmlPekerjaTetapWniAkanBerangkat').val(),
                        jmlWniTidakTetap: $('#jmlPekerjaTidakTetapWniAkanBerangkat').val(),
                        jmlWnaTetap: $('#jmlPekerjaTetapWnaAkanBerangkat').val(),
                        jmlWnaTidakTetap: $('#jmlPekerjaTidakTetapWnaAkanBerangkat').val(),
                        jmlPencaTetap: $('#jmlPekerjaTetapPencaAkanBerangkat').val(),
                        jmlPencaTidakTetap: $('#jmlPekerjaTidakTetapPencaAkanBerangkat').val(),
                        total: totalAkanBerangkat
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
        });

        $('.cmdBtnUbah').click(function () {
            $.ajax({
                url: "{{url('detail-ctki-akan-berangkat/read')}}/" + $(this).data('row-id'),
                method: "GET",
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.count > 0) {
                        $('#namaJabatanAkanBerangkat').val(s.data.nama_jabatan);
                        $('#kodeJabatanAkanBerangkat').val(s.data.kode_jabatan);
                        $('#jmlSdAkanBerangkat').val(s.data.jml_sd);
                        $('#jmlSmtpAkanBerangkat').val(s.data.jml_smtp);
                        $('#jmlSmtaAkanBerangkat').val(s.data.jml_smta);
                        $('#jmlD3AkanBerangkat').val(s.data.jml_d3);
                        $('#jmlS1AkanBerangkat').val(s.data.jml_s1);
                        $('#jmlS2AkanBerangkat').val(s.data.jml_s2);
                        $('#jmlS3AkanBerangkat').val(s.data.jml_s3);
                        totalAkanBerangkat = s.data.jml_total;
                        $('#jmlPekerjaTetapWniAkanBerangkat').val(s.data.jml_wni_tetap);
                        $('#jmlPekerjaTidakTetapWniAkanBerangkat').val(s.data.jml_wni_tidak_tetap);
                        $('#jmlPekerjaTetapWnaAkanBerangkat').val(s.data.jml_wna_tetap);
                        $('#jmlPekerjaTidakTetapWnaAkanBerangkat').val(s.data.jml_wna_tidak_tetap);
                        $('#jmlPekerjaTetapPencaAkanBerangkat').val(s.data.jml_penca_tetap);
                        $('#jmlPekerjaTidakTetapPencaAkanBerangkat').val(s.data.jml_penca_tidak_tetap);
                        $('#idAkanBerangkat').val(s.data.id);
                        $('#namaJabatanAkanBerangkat').focus();
                    }
                }

            });
        });

        $('.cmdBtnHapus').click(function () {
            var url = "{{url('detail-ctki-akan-berangkat/delete')}}/" + $(this).data('row-id');
            popUpConfirmation(url, '', 'Yakin ingin menghapus data ini?', 'Menghapus...');
        });

        $('#frmDetailCtkiTelahBerangkat').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                namaJabatanTelahBerangkat: {
                    required: true
                },
                kodeJabatanTelahBerangkat: {
                    required: true
                }
            },

            messages: {
                namaJabatanTelahBerangkat: {
                    required: "Nama jabatan harus di isi"
                },
                kodeJabatanTelahBerangkat: {
                    required: "Kode jabatan harus di isi"
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

                var urlPostTelahBerangkat = '';
                var idTelahBerangkat = $('#idTelahBerangkat').val();

                if (idTelahBerangkat == '') {
                    urlPostTelahBerangkat = "<?= route('postDetailCtkiTelahBerangkat')?>";
                } else {
                    urlPostTelahBerangkat = "{{route('updateDetailCtkiTelahBerangkat')}}";
                }

                $.ajax({
                    url: urlPostTelahBerangkat,
                    method: "POST",
                    data: {
                        id: idTelahBerangkat,
                        laporId: $('#laporId').val(),
                        namaJabatan: $('#namaJabatanTelahBerangkat').val(),
                        kodeJabatan: $('#kodeJabatanTelahBerangkat').val(),
                        jmlSd: $('#jmlSdTelahBerangkat').val(),
                        jmlSmp: $('#jmlSmtpTelahBerangkat').val(),
                        jmlSma: $('#jmlSmtaTelahBerangkat').val(),
                        jmlD3: $('#jmlD3TelahBerangkat').val(),
                        jmlS1: $('#jmlS1TelahBerangkat').val(),
                        jmlS2: $('#jmlS2TelahBerangkat').val(),
                        jmlS3: $('#jmlS3TelahBerangkat').val(),
                        jmlWniTetap: $('#jmlPekerjaTetapWniTelahBerangkat').val(),
                        jmlWniTidakTetap: $('#jmlPekerjaTidakTetapWniTelahBerangkat').val(),
                        jmlWnaTetap: $('#jmlPekerjaTetapWnaTelahBerangkat').val(),
                        jmlWnaTidakTetap: $('#jmlPekerjaTidakTetapWnaTelahBerangkat').val(),
                        jmlPencaTetap: $('#jmlPekerjaTetapPencaTelahBerangkat').val(),
                        jmlPencaTidakTetap: $('#jmlPekerjaTidakTetapPencaTelahBerangkat').val(),
                        total: totalTelahBerangkat
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
        });

        $('.cmdBtnUbahTelahBerangkat').click(function () {
            $.ajax({
                url: "{{url('detail-ctki-telah-berangkat/read')}}/" + $(this).data('row-id'),
                method: "GET",
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.count > 0) {
                        $('#namaJabatanTelahBerangkat').val(s.data.nama_jabatan);
                        $('#kodeJabatanTelahBerangkat').val(s.data.kode_jabatan);
                        $('#jmlSdTelahBerangkat').val(s.data.jml_sd);
                        $('#jmlSmtpTelahBerangkat').val(s.data.jml_smtp);
                        $('#jmlSmtaTelahBerangkat').val(s.data.jml_smta);
                        $('#jmlD3TelahBerangkat').val(s.data.jml_d3);
                        $('#jmlS1TelahBerangkat').val(s.data.jml_s1);
                        $('#jmlS2TelahBerangkat').val(s.data.jml_s2);
                        $('#jmlS3TelahBerangkat').val(s.data.jml_s3);
                        totalTelahBerangkat = s.data.jml_total;
                        $('#jmlPekerjaTetapWniTelahBerangkat').val(s.data.jml_wni_tetap);
                        $('#jmlPekerjaTidakTetapWniTelahBerangkat').val(s.data.jml_wni_tidak_tetap);
                        $('#jmlPekerjaTetapWnaTelahBerangkat').val(s.data.jml_wna_tetap);
                        $('#jmlPekerjaTidakTetapWnaTelahBerangkat').val(s.data.jml_wna_tidak_tetap);
                        $('#jmlPekerjaTetapPencaTelahBerangkat').val(s.data.jml_penca_tetap);
                        $('#jmlPekerjaTidakTetapPencaTelahBerangkat').val(s.data.jml_penca_tidak_tetap);
                        $('#idTelahBerangkat').val(s.data.id);
                        $('#namaJabatanTelahBerangkat').focus();
                    }
                }

            });
        });

        $('.cmdBtnHapusTelahBerangkat').click(function () {
            var url = "{{url('detail-ctki-telah-berangkat/delete')}}/" + $(this).data('row-id');
            popUpConfirmation(url, '', 'Yakin ingin menghapus data ini?', 'Menghapus...');
        });

        $('#frmRekapPekerja').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                jmlPenerimaanPekerja: {
                    required: true
                },
                jmlPekerjaBerhenti: {
                    required: true
                }
            },

            messages: {
                jmlPenerimaanPekerja: {
                    required: "Jumlah penerimaan pekerja selama 12 bulan terakhir  harus di isi"
                },
                jmlPekerjaBerhenti: {
                    required: "Jumlah pekerja berhent selama 12 bulan terakhir"
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
                    url: "<?= route('postRekapJumlahPekerja')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        jmlPenerimaanPekerja: $('#jmlPenerimaanPekerja').val(),
                        jmlPekerjaBerhenti: $('#jmlPekerjaBerhenti').val()
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

        $('#frmProgramPelatihan').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                programPelatihanPekerja: {
                    required: true
                },
                programPemegangan: {
                    required: true
                },
                fasilitasPelatihan: {
                    required: true
                },
                programPengindonesiaan: {
                    required: true
                }
            },

            messages: {
                programPelatihanPekerja: {
                    required: "Harus pilih salah satu"
                },
                programPemegangan: {
                    required: "Harus pilih salah satu"
                },
                fasilitasPelatihan: {
                    required: "Harus pilih salah satu"
                },
                programPengindonesiaan: {
                    required: "Harus pilih salah satu"
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
                    url: "<?= route('postProgramPelatihan')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        pelatihanPekerja: $("input[name='programPelatihanPekerja']:checked").val(),
                        programPemegangan: $("input[name='programPemegangan']:checked").val(),
                        fasilitasPelatihan: $("input[name='fasilitasPelatihan']:checked").val(),
                        programPengindonesiaan: $("input[name='programPengindonesiaan']:checked").val()
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
        });

        $('#frmRencanaLatihan').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                kejuruan: {
                    required: true
                },
                jmlPeserta: {
                    required: true
                }
            },

            messages: {
                kejuruan: {
                    required: "Nama kejuruan harus di isi"
                },
                jmlPeserta: {
                    required: "Jumlah peserta harus di isi"
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
                var idRencanaPelatihan = $('#idRencanaLatihan').val();
                if(idRencanaPelatihan =='' || typeof idRencanaPelatihan =='undefined'){
                    var url = "{{route('postRencanaPelatihan')}}";
                }else{
                    var url = "{{route('updateRencanaPelatihan')}}";
                }

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        id:idRencanaPelatihan,
                        laporId: $('#laporId').val(),
                        kejuruan: $('#kejuruan').val(),
                        kodeKejuruan: $('#kodeKejuruan').val(),
                        jmlPeserta: $('#jmlPeserta').val()
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            $('body').waitMe('hide');
                            notificationMessage('Berhasil', 'success');
                            $('#tblRencanaPelatihan').bootgrid('reload');
                            $('#idRencanaLatihan').val('');
                            $('#kejuruan').val('');
                            $('#kodeKejuruan').val('');
                            $('#jmlPeserta').val('');
                            $('#kejuruan').focus();
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

        paginationTable();
    });

    function paginationTable() {
        var grid = $('#tblRencanaPelatihan').bootgrid({
            ajax: true,
            post: function () {
                return {
                    _token: "{{csrf_token()}}"
                };
            },
            url: "{{url('/rencana-pelatihan/')}}/" + $('#laporId').val(),
            formatters: {
                "aksi": function (column, row) {
                    return "<div class=\"btn-group\">" +
                            "<a href=\"#\" class=\"btn btn-warning cmdUbah\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-pencil\"></i> Ubah</a>&nbsp;&nbsp;" +
                            "<a href=\"#\" class=\"btn btn-info cmdHapus\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i> Hapus</a>" +
                            "</div>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function () {
            grid.find('.cmdHapus').click(function () {
                var url = "{{url('/rencana-pelatihan-delete')}}/"+$(this).data('row-id');
                popUpConfirmation(url,'tblRencanaPelatihan','Yakin ingin menghapus data rencana pelatihan?','Menghapus...');
                $('#idRencanaLatihan').val('');
                $('#kejuruan').val('');
                $('#kodeKejuruan').val('');
                $('#jmlPeserta').val('');
                $('#kejuruan').focus();
                return false;
            });

            grid.find('.cmdUbah').click(function () {
                $.ajax({
                    url:"{{url('/rencana-pelatihan-read')}}/"+$(this).data('row-id'),
                    method:"GET",
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.count>0) {
                            $('#idRencanaLatihan').val(s.data.id);
                            $('#kejuruan').val(s.data.kejuruan);
                            $('#kodeKejuruan').val(s.data.kode);
                            $('#jmlPeserta').val(s.data.jml_peserta);
                            $('#kejuruan').focus();
                        }
                    }
                });
            });
        });

    }

</script>