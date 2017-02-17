
(function () {
    'use strict';
    //Declare Dialog Register
    var dialog = document.querySelector('#dialog');
    var dialogButton = document.querySelector('.dialog-button');
    //Declare Dialog delete
    var dialog_del_Button = document.querySelector('.dialog-del');
    var dialog_del = document.querySelector('#dialog-del');
    //Declare Edit
    var dialog_edit_Button = document.querySelector('.dialog-edit');
    var dialog_edit = document.querySelector('#dialog-edit');

    if(dialog && dialogButton){
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function () {
            console.log("edit");
            dialog.showModal();
        });
        dialog.querySelector('.close')
            .addEventListener('click', function () {
                dialog.close();
            });

    }

    if(dialog_edit && dialog_edit_Button){
        if (!dialog_edit.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialog_edit_Button.addEventListener('click', function () {
            dialog_edit.showModal();
        });
        dialog_edit.querySelector('.close').addEventListener('click', function () {
            dialog_edit.close();
        });
    }

    if(dialog_del && dialog_del_Button){

        if(!dialog_del.showModal){
            dialogPolyfill.registerDialog(dialog_del);
        }
        dialog_del_Button.addEventListener('click', function (e) {
            e.preventDefault();
            var url=this.href;
            console.log(url);
            console.log("AQUI");
            var a=dialog_del.querySelector("a.confirm-delete");
            a.href=url;
            dialog_del.showModal();
        });
        dialog_del.querySelector('.close')
            .addEventListener('click', function () {
                dialog_del.close();
            });
    }
}());