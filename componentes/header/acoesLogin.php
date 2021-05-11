<?php 


if(empty($_POST["usuario"]) || empty($_POST['senha'])) {
    header('location: ../../produtos/index.php');
    exit();
}
//Acesso ao banco de dados e a conexão
require("../../database/conexao.php");

//Receber os campos do formulario
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, usuario from tbl_administrador where usuario = '$usuario' and senha = '$senha'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('location: painel.php');
    exit();
}else{
    header('location: index.php');
    }exit();

    




    

// switch($_POST["acao"]){
//     case "login":
    
//     $_POST["usuario"];
//     $_POST["senha"];
//     $_POST["autenticacao"];

//     //mostrar o sql select na tabela tbl_administrador
//     //SELECT * FROM tbl_administrador WHERE usuario = $usuario;
//     $query = "SELECT * FROM tbl_administrador WHERE usuario = $usuario";
    
//     }
    
    //verificar se o ousuario existe e se a senha esta correta

    //se estiver correta, salvar o id e o nome do usuário da sessão

    //redirecionar para tela de listagem
    
    //implementar o login

    //  case "logout":
    //implementar o logout }}}