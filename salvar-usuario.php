<?php

    require_once 'config.php';

    switch($_REQUEST["acao"]){
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data = $_POST["data"];

            $sql = "INSERT INTO usuarios (nome, email, senha, data) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data}')";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Cadastro não realizado');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data = $_POST["data"];

            $sql = "UPDATE usuarios SET 
                        nome='{$nome}',
                        email='{$email}',
                        senha='{$senha}',
                        data='{$data}'
                    WHERE
                        id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Edição não realizada');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            } else {
                print "<script>alert('Exclusão não realizada');</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;
    }
?>