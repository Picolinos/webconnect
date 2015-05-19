$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
            console.log(page);
            _self.html( data );
        });
        
    });
});

