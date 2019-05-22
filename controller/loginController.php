
<?php

/** anon */
function index() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $password = sha1($_POST["password"]);
        
        if(authLogin($login, $password)) {
            redirecionar("../administrador/index");
        } else {
            alert("Usuário ou Senha inválidos.");
        }
    }

    displayNoTemplate("login/form");
}

/** anon */
function logout() {
    authLogout();
    alert("Sessão encerrada com sucesso. Até breve.");
    redirecionar("../login/index");
}

?>