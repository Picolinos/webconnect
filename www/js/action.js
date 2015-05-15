$("a").click(function(){
    var href = $(this).attr('href');
    window.location.replace(href);
})