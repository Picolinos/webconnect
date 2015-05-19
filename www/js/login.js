$.ui.autoLaunch = false; 
$.ui.backButtonText = "Voltar";

$(document).ready(function(){
    $.ui.launch();
    // setup signin and signup button events
    $("#login").on("click", function(){
        signIn();
    });

    $("#register").on("click", function(){
        signUp();
    });
});
function signIn(){
    var username = $("#username").val();
    var password = $("#password").val();
    if(username == 'admin' && password=='admin'){
        //window.location.replace("home.html");
        $.ui.backButtonText = "Logout";
        $.ui.loadContent("home", null, null, "fade");
        $.ui.backButtonText = "Voltar";
    }else{
        $("#error").html("Usuario ou senha invalidos");
    }
}
function signUp(){
    $.ui.loadContent("main", null, null, "fade");
}   