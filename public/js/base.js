
function notificationMessage(message, type) {
    toastr.options.positionClass = "toast-top-full-width";
    onclick:null;
    toastr.options.closeButton = true;
    toastr.options.showDuration = "300";
    toastr.options.hideDuration = "1000";
    toastr.options.timeOut = "5000";
    toastr.options.extendedTimeOut = "1000";
    toastr.options.showEasing = "swing";
    toastr.options.hideEasing = "linear";
    toastr.options.showMethod = "slideDown";
    toastr.options.hideMethod = "slideUp";
    toastr[type](message, type);
}

function runWaitMe(renderEffect, effect, text) {
    $(renderEffect).waitMe({
        effect: effect,
        text: text,
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        onClose: function () {
        }
    });
}

function popUpConfirmation(url,tableId,message,msgProcess) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Hapus!'
    }).then(function () {
        runWaitMe('body','roundBounce',msgProcess);
        $.ajax({
            url:url,
            method: "POST",
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('body').waitMe('hide');
                notificationMessage(errorThrown, 'error');
                $('#'+tableId).bootgrid('reload');
            },
            success: function (s) {
                $('body').waitMe('hide');
                notificationMessage('berhasil','success');
                $('#'+tableId).bootgrid('reload');
            }
        })
    })
}

function hanyaAngka(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function setDataTabel() {

}
