Raincolor.grid.Items = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'raincolor-grid-items'
        ,url: Raincolor.config.connector_url
        ,baseParams: {
            action: 'mgr/item/getlist'
        }
        ,fields: ['name','color']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('raincolor.name')
            ,dataIndex: 'name'
            ,width: 200
        },{
            header: _('raincolor.color')
            ,dataIndex: 'color'
            ,width: 250
            ,xtype:'templatecolumn', tpl:'<div class="mcolor-label" style="background-color:#{color}">#{color}</div>'
            ,handler: this.updateItem
            ,scope: this
        }]
    });
    Raincolor.grid.Items.superclass.constructor.call(this,config);
};

Ext.extend(Raincolor.grid.Items,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('raincolor.item_update')
            ,handler: this.updateItem
        });
        this.addContextMenuItem(m);
    }

    ,updateItem: function(btn,e) {
        if (!this.menu.record) return false;
        var r = this.menu.record;

        if (!this.windows.updateItem) {
            this.windows.updateItem = MODx.load({
                xtype: 'raincolor-window-item-update'
                ,record: r
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.updateItem.fp.getForm().reset();
        this.windows.updateItem.fp.getForm().setValues(r);
        this.windows.updateItem.show(e.target);
        initColorPanel('mcolor', {hide: false, value: '#' + r.color});
    }
});
Ext.reg('raincolor-grid-items',Raincolor.grid.Items);

Raincolor.window.UpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'raincolor-meuitem'+Ext.id();
    Ext.applyIf(config,{
        title: _('raincolor.item_update')
        ,id: this.ident
        ,height: '393'
        ,width: 475
        ,url: Raincolor.config.connector_url
        ,action: 'mgr/item/update'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('raincolor.name')
            ,name: 'name'
            ,id: this.ident+'-name'
            ,width: 321
        },{
            xtype: 'textfield'
            ,fieldClass: 'mcolor'
            ,fieldLabel: _('raincolor.color')
            ,name: 'color'
            ,id: this.ident+'-color'
            ,width: 300
        }]
    });
    Raincolor.window.UpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.window.UpdateItem,MODx.Window);
Ext.reg('raincolor-window-item-update',Raincolor.window.UpdateItem);