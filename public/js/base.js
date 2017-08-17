
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
    BootstrapDialog.show({
        title: 'Confirmation Dialog',
        message: message,
        cssClass: 'confirmation-dialog',
        draggable: true,
        buttons: [{
            label: 'Yes',
            icon: 'glyphicon glyphicon-send',
            cssClass: 'btn-primary',
            autospin: true,
            action: function (dialog) {
                runWaitMe('body','roundBounce', msgProcess);
                $.ajax({
                    url: url,
                    type: "GET",
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        dialog.close();
                        $('body').waitMe('hide');
                        notificationMessage(errorThrown, 'error');
                    },
                    success: function (s) {
                        dialog.close();
                        $('body').waitMe('hide');
                        $('#'+tableId).bootgrid('reload');
                    },
                    complete: function () {
                        dialog.close();
                    }
                });
            }
        }, {
            label: 'Cancel',
            action: function (dialog) {
                dialog.close();
            }
        }]
    });
}
