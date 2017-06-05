Ext.onReady(function() {
    MODx.load({ xtype: 'raincolor-page-home'});
});

Raincolor.page.Home = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		components: [{
			xtype: 'raincolor-panel-home'
			,renderTo: 'raincolor-panel-home-div'
		}]
	}); 
	Raincolor.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.page.Home,MODx.Component);
Ext.reg('raincolor-page-home',Raincolor.page.Home);