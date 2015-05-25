$(function(){
    
    
    $("div.import").each(function(){
        var _self = $(this);
        var page = _self.attr('id')+".html";
        $.get(page, function( data ) {
          
            _self.html( data );
        });
        
    });
    setTimeout(function(){
        
        $(".popup").click(function(){
            var pop = $("#"+$(this).attr('rel'));
            addOverlay(pop);
            addBtns(pop);
            pop.show("slow");
        });
    },2000);
    function addOverlay(pop){
        var overlay = pop.closest('.panel').find('.overlay');
        if(overlay.length == 0){
            pop.closest('.panel').append("<div class='overlay'></div>");
        }else{
           overlay.show(); 
        }
    }
    function addBtns(pop){
        var btns = $("<div class='buttons'></div>");
        var ok = $("<div class='btn ok'>Ok</div>");
        var cancelar = $("<div class='btn cancelar'>Cancelar</div>");
        btns.append(ok);
        btns.append(cancelar);
        var close = $("<div class='popup-close'>X</div>")
        close.click(function(){
            var content = $(this).closest('.popup-content');
            content.hide(); 
            $(this).closest('.panel').find('.overlay').hide();
        });
        cancelar.click(function(){
            close.click();
        });
        ok.click(function(){
            close.click();
        });
        if(pop.find('.buttons').length == 0){
            pop.append(btns);
            pop.find(".popup-title").append(close)
        }
    }
});



$(function(){
    var scrollStartPos=0;
    $(".panel").on("touchstart", function(event) {
        scrollStartPos=this.scrollTop+event.touches[0].pageY;
        event.stopPropagation();
    },false);

    $(".panel").on("touchmove", function(event) {
        this.scrollTop=scrollStartPos-event.touches[0].pageY;
        event.preventDefault();
    },false);
    
    $(".panel").on("touchend", function(event) {
        //seriaalgumacoisaaqui
    },false);
});
 
     