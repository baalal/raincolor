function initColorPanel(cls, config){
        var interval = setInterval(function(){
        if($('.'+cls)){
            $('.'+cls).minicolors('settings', config);
            clearInterval(interval);
        }
    }, 500);
}