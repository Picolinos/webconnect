$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
          _self.html( data );
        });
    });
    $(".import").each(function(){
        $(this).click(function(e){
            e.preventDefault();
            var _self = $(this);
            var page = _self.rel('rel');
            $.ui.loadContent(page, null, null, "fade");
        });
    });
});

