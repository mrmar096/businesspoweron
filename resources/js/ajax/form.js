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
						console.log(response.url);
					}
				}
				btn.text(btnvalue);
			},
			error:function (response) {
				var request=response.responseText;
				var json=JSON.parse(request);
				if(json.message!=null){
					console.log(json.message);
					$("#error-block").show();
					$("#error-block").html(json.message).slideDown;
					setTimeout(function(){ $('#error-block').fadeOut('fast'); }, 3000);
				}
				btn.text(btnvalue);
			}
		});
	});
});


