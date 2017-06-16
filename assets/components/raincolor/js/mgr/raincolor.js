var Raincolor = function(config) {
    config = config || {};

    Raincolor.superclass.constructor.call(this,config);
};

Ext.extend(Raincolor,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('raincolor',Raincolor);
Raincolor = new Raincolor();

