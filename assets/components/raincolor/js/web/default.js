$(document).ready(function(){
	var rc = $('.raincolor-product');
	$(rc)
	$(rc).click(function(){
		$('input[name="options[color]"').attr('value', $(this).attr('title'));
		if($(rc).hasClass('checked')) $(rc).removeClass('checked');
		$(this).addClass('checked');
	})
})