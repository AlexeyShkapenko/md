$(document).ready(function(){

var inProgress = false;

var startFrom = 4;

    $(window).scroll(function() {

        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {

        $.ajax({

            url: './php/operate_Post.php',

            method: 'POST',

            data: {"startFrom" : startFrom,
			"id": $('#get_id').val()
			},

            beforeSend: function() {

            inProgress = true;},
			success: function(data){
			if (data){
				$("#articles").append(data);
			}
			}
            }).done(function(data){

            inProgress = false;

            startFrom += 4;
            });
        }
    });
});