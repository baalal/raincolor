var Raincolor = Raincolor || {};
Raincolor.initialize = function(){
	if (typeof $ == 'undefined') {
		var script = document.createElement('script');
		script.src = RaincolorConfig.jsUrl + "lib/jquery.min.js";
		document.body.appendChild(script);
	}

	$.getScript(RaincolorConfig.jsUrl + "lib/jquery.minicolors.min.js");
}

$(document).ready(function () {
	Raincolor.initialize();
});