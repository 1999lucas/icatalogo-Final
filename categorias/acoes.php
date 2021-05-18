<?php

require("../database/conexao.php");

switch($_POST["acao"]){
        case "inserir":
                if(isset($_POST["descricao"])) {

                        //receber os campos do formulário
                        $tarefa = $_POST["descricao"];

                         //mostrar o sql de insert
                        $sqlDescricao = "INSERT INTO tbl_categoria (descricao) VALUES ('$tarefa')";
                        
                        //executar o sql de insert
                        $resultado = mysqli_query($conexao, $sqlDescricao);
                }
                header("location: index.php");
                break;
        
       

        case "deletar":
                if(isset($_POST["categoriaId"])) {
                $categoriaId = $_POST["categoriaId"];
                //declarar o sql de delete

                $sqlDelete = " DELETE FROM tbl_categoria WHERE id = ('$categoriaId') ";
                
                //executar o sql
                $resultado = mysqli_query($conexao, $sqlDelete);
                header('location: index.php');
                }
                break;
}