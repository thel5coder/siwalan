<script>
    var pk,pp,kkb;
    $(document).ready(function () {
        $('#tglPengesahan').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('#tglPengesahanKkbPk').hide();

        $('#pk').change(function () {
            if($(this).prop('checked')){
                $('#tglPengesahanKkbPk').show();
                pk =1;
            }else{
                $('#tglPengesahanKkbPk').hide();
                pk=0;
            }
        });

        $('#kkb').change(function () {
            if($(this).prop('checked')){
                $('#tglPengesahanKkbPk').show();
                kkb = 1;
            }else{
                $('#tglPengesahanKkbPk').hide();
                kkb = 0;
            }
        });

        $('#pp').change(function () {
            if($(this).prop('checked')){
                pp = 1;
            }else{
                pp = 0;
            }
        });

        $('#frmPerangkatHubunganKerja').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                jenisHubungan: {
                    required: true
                }
            },

            messages: {
                jenisHubungan: {
                    required: "Pilih salah dahulu perangkat hubungan kerja"
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
                if($('pk').prop('checked')){
                    pk = 1;
                }else{
                    pk = 0;
                }

                if($('#pp').prop('checked')){
                    pp = 1;
                }else{
                    pp= 0;
                }

                if($('#kkb').prop('checked')){
                    kkb = 1;
                }else{
                    kkb = 0;
                }

                $.ajax({
                    url: "<?= route('postPerangkatHubunganKerja')?>",
                    method: "POST",
                    data: {
                        laporId: $('#laporId').val(),
                        pk:pk,
                        pp:pp,
                        kkb:kkb,
                        tglPengesahan:$('#tglPengesahan').val()
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
    })
</script>