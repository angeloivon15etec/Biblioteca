<?php
    include_once 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $consulta = "SELECT * FROM usuario WHERE email = :email AND senha = :senha ";
    
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();

    $registros = $stmt -> rowCount();

    if ($registros == 1){
    //echo 'OK VALIDADO';
    header('location: restrita.php');
    }else{
        //echo 'NÃO VALIDO';
        header('location: index.php');
    }


?>