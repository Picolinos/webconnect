$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page);
        var html = get.resposeText;
        _self.html(html);
    });
   
});