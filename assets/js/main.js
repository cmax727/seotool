$(document).ready(function(){
	$('#poplink-1').click(function(){
		$("#pop-1").fadeIn(700);
	});
	$('#poplink-2').click(function(){
		$("#pop-2").fadeIn(700);
	});
	$('.close').click(function(){
		$(this).closest('.popup').fadeOut(700);
	});
	$("#form input").removeAttr('disabled');

	$( "li.parent" ).hover(
		function() {
			$(this).find(".submenu").show();
		}, function() {
			$(this).find(".submenu").hide();
	});
});

function blank_inputs() {
	$("form input").val('');
	$(".submit").val('GO');
}
function blank_inputsContact() {
	$("form input, form textarea").val('');
	$(".submit").val('Send');
	$("#form1 input, #form1 textarea").removeAttr('disabled');
}

$(function() {
    var pull        = $('#pull');
        menu        = $('nav ul');
        menuHeight  = menu.height();

    $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
        $('.submenu').hide();
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});