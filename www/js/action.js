$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        var get = $.get(page);
        var html = get.resposeText;
        console.log(html);
        console.log(page);
        console.log(get);
        _self.html(html);
    });
   
});