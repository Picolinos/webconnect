$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
            console.log(page);
            _self.html( data );
        });
        
    });
    $("a").each(function(){
        var _self = $(this);
        _self.click(function(e){
            e.preventDefault();
            var page = _self.attr('href');
            console.log(page);
        });
    });
});

