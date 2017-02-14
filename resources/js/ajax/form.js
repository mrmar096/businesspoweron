/**
 * Created by Mario on 09/02/2017.
 */
$(function() {
	$("#error-block").hide();
	$('form').on('submit', function(e) {
		e.preventDefault();
		var url=this.action;
		console.log(url);
		var form=$(this);
		var btn=$(this).find("button[type='submit']");
		var btnvalue=btn.text();

		$.ajax({
			type:'POST',
			url:url,
			data:form.serialize(),
			dataType : "json",
			beforeSend:function () {
				$("#error-block").hide();
				btn.text("Espere...");
			},
			success:function (response) {
				console.log(response);
				if(response.status==1){
					if(response.url!=null){
						window.location.href=response.url;
					}
				}
				btn.text(btnvalue);
			},
			error:function (response) {
				console.log(response);
				if(response.message!=null){

					console.log(response.message);
					var dismiss='<button type="button" class="close" data-dismiss="alert">×</button>';
					$("#error-block").html(dismiss+" "+response.mensaje).slideDown();
				}
				btn.text(btnvalue);
			}

		});
	});
});
