<?php
session_start();
require_once 'db_connect.php';

function clear($input)
{
    global $connect;
    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn_cadastrar'])) :
    $nome = clear($connect, $_POST['nome']);
    $sobrenome = clear($connect, $_POST['sobrenome']);
    $email = clear($connect, $_POST['email']);
    $idade = clear($connect, $_POST['idade']);

    $sql = "INSERT INTO clientes(nome, sobrenome, email, idade)
        VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else :
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../index.php');
    endif;
endif;
