/**
 * Created by Mario on 14/02/2017.
 */
$(function() {

    $('a.confirm-delete').on('click', function(e) {
        e.preventDefault();
        console.log("llegado ajax");
        var url=this.href;
        console.log(url);
        var objHtml=$(this);
        var objHtmlValue=objHtml.text();
        $.ajax({
            type:'DELETE',
            url:url,
            dataType : "json",
            beforeSend:function () {
                objHtml.text("Espere...");
            },
            success:function (response) {
                console.log(response);
                if(response.status==1){
                    location.reload();
                }
                objHtml.text(objHtmlValue);
            },
            error:function (response) {
                console.log(response);
                if(response.message!=null){
                    console.log(response.message);
                }
                objHtml.text(objHtmlValue);
            }

        });
    });
});
