Raincolor.grid.Product = function(config) {
    config = config || {};
    // this.sm = new Ext.grid.CheckboxSelectionModel();
    Ext.applyIf(config,{
        id: 'raincolor-grid-items'
        ,url: Raincolor.config.connector_url
        ,baseParams: {
            action: 'mgr/product/getlist'
            ,id: MODx.request.id
        }
        ,fields: ['name','color']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        // ,sm: this.sm
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
    Raincolor.grid.Product.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.grid.Product,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: 'Изменить'
            ,handler: this.updateItem
        });
        this.addContextMenuItem(m);
    }

    ,getColumns: function() {
        var all = {
            id: {hidden: true, sortable: true, width: 40}
            ,remains: {header: _('mspr_product_remains'), sortable: true, width: 50, editor: {xtype:'numberfield'}}
            ,color: {header: _('mspr_product_color'), width: 100, renderer: msProductRemains.utils.defined}
            ,size: {header: _('mspr_product_size'), width: 100, renderer: msProductRemains.utils.defined}
        };

        for (var i in msProductRemains.plugin) {
            if (typeof(msProductRemains.plugin[i]['getColumns']) == 'function') {
                var add = msProductRemains.plugin[i].getColumns();
                Ext.apply(all, add);
            }
        }

        var options = miniShop2.config.option_fields;
        for (var i = 0; i < options.length; i++) {
            Ext.apply(all, {[options[i].key]: {header: options[i].caption, width: 100, renderer: msProductRemains.utils.defined}});
        }

        var columns = [this.sm];
        for(var i=0; i < msProductRemains.config.product_grid_fields.length; i++) {
            var field = msProductRemains.config.product_grid_fields[i];
            if (all[field]) {
                Ext.applyIf(all[field], {
                    header: _('ms2_product_' + field)
                    ,dataIndex: field
                });
                columns.push(all[field]);
            }
        }

        return columns;
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
Ext.reg('raincolor-grid-items',Raincolor.grid.Product);

Raincolor.window.UpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'raincolor-meuitem'+Ext.id();
    Ext.applyIf(config,{
        title: 'Изменить'
        ,id: this.ident
        ,height: '393'
        ,width: 475
        ,url: Raincolor.config.connector_url
        ,action: 'mgr/product/update'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: 'Имя'
            ,name: 'name'
            ,id: this.ident+'-name'
            ,width: 321
        },{
            xtype: 'textfield'
            ,fieldClass: 'mcolor'
            ,fieldLabel: 'Цвет'
            ,name: 'color'
            ,id: this.ident+'-color'
            ,width: 300
        }]
    });
    Raincolor.window.UpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(Raincolor.window.UpdateItem,MODx.Window);
Ext.reg('raincolor-window-item-update',Raincolor.window.UpdateItem);