<?php
require_once 'app/init.php';

if(isset($_POST['nome'])) {
    $nome = trim ($_POST['nome']);

    if(!empty($nome)) {
        $addedQuery = $db->prepare("
            INSERT INTO items (nome,user,concluido,criado)
            VALUES (:nome, :user, 0, NOW())
        ");

    $addedQuery->execute([
        'nome'=>$nome,
        'user'=>$_SESSION['user_id']
    ]);
    }
}

header('Location: index.php');

