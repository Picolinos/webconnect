$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
          _self.html( data );
        });
    });
    $("a.import").click(function(e){
        e.preventDefault();
        console.log('teste');
    });
});