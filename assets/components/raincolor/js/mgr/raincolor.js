var Raincolor = function(config) {
    config = config || {};

    var interval = setInterval(function(){
		if($('.mcolor').length){
			$('.mcolor').each(function(){
				$(this).minicolors();
			})
			clearInterval(interval);
		}
	}, 500);

    Raincolor.superclass.constructor.call(this,config);
};

Ext.extend(Raincolor,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('raincolor',Raincolor);

Raincolor = new Raincolor();

