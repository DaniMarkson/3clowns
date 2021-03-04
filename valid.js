$(document).ready(function(){

	$(".ticket").submit(function(event){
		event.preventDefault();
		var fb = $(this);
		
        var formData = new FormData(this);
        var fName = "ticket";
        $.ajax({
            url: fName + ".php",
            type: "post",
            data: formData,
            dataType:'json',
            success: function(res) {
                
				fb.trigger("reset");		
			},
            error: function(){
                fb.find('.res').html('Ваша заявка не отправлена! Попробуйте еще раз');
            },
            cache: false,
            contentType: false,
            processData: false
        });
		
	});
});