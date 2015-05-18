$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        var pagina = $.get(page);
        var html =  pagina.responseText;
        var html1 = pagina.response;
        var html2 = pagina.response;
        console.log("---"+html1+"---");
        console.log("---"+html2+"---");
        _self.html(html1);
    });
   
});