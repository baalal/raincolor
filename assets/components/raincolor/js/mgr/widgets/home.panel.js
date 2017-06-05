Raincolor.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('raincolor')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('raincolor.colors')
                ,items: [{
                    html: '<p>'+_('raincolor.colors_intro')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'raincolor-grid-items'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    Raincolor.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.panel.Home,MODx.Panel);
Ext.reg('raincolor-panel-home',Raincolor.panel.Home);
