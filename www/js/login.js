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
    $("#username , #password").keyup(function(e){
        if(e.keyCode == 13){
          signIn();
        }
    })
});
function signIn(){
    var username = $("#username").val();
    var password = $("#password").val();
    var user = "";
    $.get("http://www.eduardoalvarez.com.br/webconnect/projeto/ajax/ajaxDispatcher.php?classe=userBusiness&metodo=getUserByLoginAndPass&login="+username+"&senha="+password, function( data ) {
        user = JSON.parse(data);
        if(user != false){
            $.ui.backButtonText = "Logout";
            $.ui.loadContent("home", null, null, "fade");
            putPerfilName(user.nome);
            $.ui.backButtonText = "Voltar";    
        }else{
            $("#error").html("Usuário ou senha inválidos");
        }
    });
}
function putPerfilName(nome){
    $("#meu_perfil").html(nome);
}
function signUp(){
    var username = $("#username_user").val();
    var password = $("#password_user").val();
    var nome = $("#nome_user").val();
    var email = $("#email_user").val();
    $.get("http://www.eduardoalvarez.com.br/webconnect/projeto/ajax/ajaxDispatcher.php?classe=userBusiness&metodo=persistUser&login="+username+"&senha="+password+"&nome="+nome+"email="+email, function( data ) {
        if(json_encode(data) == true){
            $.ui.loadContent("main", null, null, "fade");    
            alert('Usuario cadastrado com sucesso! \o');
        }
    });
}   