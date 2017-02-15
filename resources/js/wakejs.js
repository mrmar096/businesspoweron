/**
 * Created by Woulf_Alpha on 15/02/2017.
 */
$(function () {
    $('.devices-card input[type="checkbox"]').change(function (e) {
        var id=this.id;
        var status=this.checked;
        var url;
        if(status) {
            url=window.location.href+"/wakeup/"+id;
            $.post(url, function (data) {
                console.log(data);
            });
        }else{
            url=window.location.href+"/poweroff/"+id;
            $.post(url, function (data) {
                console.log(data);
            });
        }
    })
});