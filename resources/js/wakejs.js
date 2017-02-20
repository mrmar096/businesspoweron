/**
 * Created by Toni hernandez on 15/02/2017.
 */
$(function () {
    $('.devices-card input[type="checkbox"]').change(function (e) {
        'use strict';
        var id=this.id;
        var status=this.checked;
        var snackbarContainer = document.querySelector('#demo-toast-example');
        var url;
        if(status) {

            url = window.location.href + "/wakeup/"+ id;
            console.log(url);
            $.post(url, function (data) {
                console.log(data);
                var datos = {message: 'Encendiendo Equipo', timeout: 2000};
                snackbarContainer.MaterialSnackbar.showSnackbar(datos);
            });
        }else{
            url=window.location.href + "/poweroff/"+id;
            console.log(url);
            $.post(url, function (data) {
                console.log(data);
                var datos = {message: 'Apagando Equipo', timeout: 2000};
                snackbarContainer.MaterialSnackbar.showSnackbar(datos);
            });
        }


    })
});

