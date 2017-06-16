Ext.onReady(function() {
	// window.setTimeout(function() {
		// var tabs = ['minishop2-product-settings-panel', 'minishop2-product-tabs'];
		// for (var i=0; i<tabs.length; i++) {
			// Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function() {
				// this.on('beforerender', function() {
					Ext.getCmp('minishop2-product-tabs')
					.add({
						title: 'Цвета'
						,hideMode: 'offsets'
						,items: [
							{
								html: 'Описание',
								cls: 'modx-page-header container',
								border: false
							},{
								xtype: 'raincolor-grid-items',
								cls: (this.id == 'minishop2-product-tabs' ? 'main-wrapper' : ''),
								style: (this.id == 'minishop2-product-tabs' ? 'padding-top: 0px;' : '')
							}
						]
					});
				// });
			// });
		// }
	// }, 10);
});