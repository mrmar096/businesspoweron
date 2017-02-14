/**
 * Created by Mario on 14/02/2017.
 */
$(function() {

    $('.confirm-delete').on('click', function(e) {
        e.preventDefault();
        var url=this.href;
        console.log(url);
        var objHtml=$(this);
        var objHtmlValue=objHtml.text();
        $.ajax({
            type:'DELETE',
            url:url,
            dataType : "json",
            beforeSend:function () {
                btn.text("Espere...");
            },
            success:function (response) {
                console.log(response);
                if(response.status==1){
                    if(response.url!=null){
                        window.location.href=response.url;
                    }
                }
                btn.text(objHtmlValue);
            },
            error:function (response) {
                console.log(response);
                if(response.message!=null){
                    console.log(response.message);
                }
                btn.text(objHtmlValue);
            }

        });
    });
});