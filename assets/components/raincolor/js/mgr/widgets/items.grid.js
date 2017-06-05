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
        }]
        ,tbar: [{
            text: _('raincolor.item_create')
            ,handler: this.createItem
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
        m.push('-');
        m.push({
            text: _('raincolor.item_remove')
            ,handler: this.removeItem
        });
        this.addContextMenuItem(m);
    }
    
    ,createItem: function(btn,e) {
        if (!this.windows.createItem) {
            this.windows.createItem = MODx.load({
                xtype: 'raincolor-window-item-create'
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.createItem.fp.getForm().reset();
        this.windows.createItem.show(e.target);
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
    }
    
    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('raincolor.item_remove')
            ,text: _('raincolor.item_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/item/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }
});
Ext.reg('raincolor-grid-items',Raincolor.grid.Items);




Raincolor.window.CreateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'raincolor-mecitem'+Ext.id();
    Ext.applyIf(config,{
        title: _('raincolor.item_create')
        ,id: this.ident
        ,height: 'auto'
        ,width: 475
        ,url: Raincolor.config.connector_url
        ,action: 'mgr/item/create'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('raincolor.name')
            ,name: 'name'
            ,id: this.ident+'-name'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: _('raincolor.color')
            ,name: 'color'
            ,id: this.ident+'-color'
            ,anchor: '100%'
        }]
    });
    Raincolor.window.CreateItem.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.window.CreateItem,MODx.Window);
Ext.reg('raincolor-window-item-create',Raincolor.window.CreateItem);


Raincolor.window.UpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'raincolor-meuitem'+Ext.id();
    Ext.applyIf(config,{
        title: _('raincolor.item_update')
        ,id: this.ident
        ,height: 'auto'
        ,width: 475
        ,url: Raincolor.config.connector_url
        ,action: 'mgr/item/update'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('raincolor.name')
            ,name: 'name'
            ,id: this.ident+'-name'
            ,width: 300
        },{
            xtype: 'textarea'
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