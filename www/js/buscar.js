$("#busca_filtro").keyup(function(e){
    if(e.keyCode == 13){
        $.ui.loadContent("eventos", null, null, "fade");
    }
});