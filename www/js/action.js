$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id');//+".html";
        console.log(page);
        _self.load(page, function(response, status, xhr) {
            alert(status);
            alert( "Load was performed." );
        });//carrega a página referente a esse panel. 
    });
   
});