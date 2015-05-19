$(function(){
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
            console.log(page);
            _self.html( data );
        });
        
    });
    setTimeout(function(){
        $(".popup").click(function(){
            var pop = $("#"+$(this).attr('rel'));
            pop.show();
        });
    },2000);
});

