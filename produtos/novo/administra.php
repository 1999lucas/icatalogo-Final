<?php

#todo arquivo que utilizar sessão precisa chamar a session_start
#inicializa a sessão no php
session_start();


#declara um vetor de erros
$erro = [];
#importa a conexão com o banco de dados

require("../../database/conexao.php");


//VALIDAÇÃO
function validarCampos(){

    //validar se campo descrição está preenchido
    if(!isset($_POST["descricao"]) && $_POST["descricao"]== ""){
        $erros[] = "O campo descrição é obrigatório";
    }

    //validar se o campo peso está preenchido
    if(!isset($_POST["peso"]) && $_POST["peso"] == ""){
        $erros[] = "O campo peso é obrigatório";
    //validar se o campo peso é um número
    }else if(is_numeric(str_replace(",",".",$_POST["peso"]))){
        $erros[] = "O campo peso deve ser um número";
    }

    //validar se o campo quantidade está preenchido
    if(!isset($_POST["quantidade"]) && $_POST["quantidade"] == ""){
        $erros[] = "O campo quantidade é obrigatório";
    //validar se o campo quantidade é um número
    }else if(is_numeric(str_replace(",",".",$_POST["quantidade"]))){
        $erros[] = "O campo quantidade deve ser um número";
    }
    //validar se o campo cor está preenchido
    if(!isset($_POST["cor"]) && $_POST["cor"]== ""){
        $erros[] = "O campo descrição é obrigatório";
    }

    //validar se o campo valor está preenchido e se é um número
    if(isset($_POST["valor"]) && $_POST["valor"] != "" && !is_numeric(str_replace(",",".",$_POST["valor"]))){
        $erros[] = "O campo valor deve ser um número";
    }

    //validar se o campo desconto está preenchido e se é um número
    if(isset($_POST["desconto"]) && $_POST["desconto"] != "" && !is_numeric(str_replace(",",".",$_POST["desconto"]))){
        $erros[] = "O campo desconto deve ser um número";
    } //retorna os erros
    return $erros;
}

//chamamos a função de validação para verificar se tem erros
$erros = validarCampos();

//se houver erros
if(count($erros) > 0) {

    #incluimos um campo erros na sessão e atribuimos um vetor a ela
    $_SESSION["erros"] = $erros;

    //redireciona para pagina do formulário
    header("location: ../novo/index.php"); 
}

        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["descricao"]) && isset($_POST["peso"]) && isset($_POST["quantidade"])&& isset($_POST["cor"]) && isset($_POST["tamanho"]) && isset($_POST["valor"]) && isset($_POST["desconto"])) {
            $descricao = $_POST["descricao"];
            #precisamos trocar a virgula do decimal por ponto
            $peso = str_replace(",",".", $_POST["peso"]);
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $peso = str_replace(",",".", $valor = $_POST["valor"]);
            
            $desconto = $_POST["desconto"];
        
            //declara o SQL de inserção
            $sqlInsert = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto) VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', '$valor', '$desconto')";

            //executa o SQL
            //verificar se deu certo
            $resultado = mysqli_query($conexao, $sqlInsert) or die(mysqli_error($conexao));

            if ($resultado) {
            //se deu certo, redireciona para o arquivo de listagem
            $mensagem = "Produto inserido com sucesso!";
        } else {
            //se não der certo, exibe um erro para o usuário
            $mensagem = "Erro ao inserir o produto!";
        }              
    }

    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: http://localhost/web-backend/icatalogo-parte1/produtos/");