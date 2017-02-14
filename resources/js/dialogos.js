
(function () {
    'use strict';


    //Declare Dialog Register
    var dialog = document.querySelector('#dialog');
    var dialogButton = document.querySelector('.dialog-button');
    //Declare Dialog delete
    var dialog_del_Button = document.querySelector('.dialog-del');
    var dialog_del = document.querySelector('#dialog-del');

    if(dialog && dialogButton){
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function () {
            dialog.showModal();
        });
        dialog.querySelector('.close')
            .addEventListener('click', function () {
                dialog.close();
            });

    }
    if(dialog_del && dialog_del_Button){
        if(!dialog_del.showModal){
            dialogPolyfill.registerDialog(dialog_del);
        }
        dialog_del_Button.addEventListener('click', function () {
            dialog_del.showModal();
        });
        dialog_del.querySelector('.close')
            .addEventListener('click', function () {
               
                dialog_del.close();
            });
    }


}());