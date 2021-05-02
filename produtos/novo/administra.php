<?php

//importa a conexão com o banco de dados
require("../../database/conexao.php");


// switch ($_POST["acao"]) {
    
    // case "salvar":
        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["descricao"]) && isset($_POST["peso"]) && isset($_POST["quantidade"])&& isset($_POST["cor"]) && isset($_POST["tamanho"]) && isset($_POST["valor"]) && isset($_POST["desconto"])) {
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $valor = $_POST["valor"];
            $desconto = $_POST["desconto"];

            //declara o SQL de inserção
            $sqlInsert = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto) VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', '$valor', '$desconto')";

            //executa o SQL
            //verificar se deu certo
            $resultado = mysqli_query($conexao, $sqlInsert) or die(mysqli_error($conexao));

             //se deu certo, redireciona para o arquivo de listagem
           
                //se não der certo, exibe um erro para o usuário
            
            
        }
        // break;      
    // }

    //redirecionar para tela de listagem (index.php) com a mensagem
    header("location: http://localhost/web-backend/icatalogo-parte1/produtos/");

?>