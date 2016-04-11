$(function(){
  $( "#list_button" ).click(function() {
	if ($('#board_list').css('display') == 'none') {
		$('#board_list').slideDown('slow');
	} else {
		$("#board_list").slideUp('fast');
	}
    	
  });
});