<?php

require_once 'app/init.php';

if(isset ($_GET ['as'], $_GET['item'])) {
    $as = $_GET['as'];
    $item = $_GET['item'];

    switch($as){
        case 'concluido':
            $doneQuery = $db->prepare("
                UPDATE items
                SET concluido = 1
                WHERE id = :item
                AND user = :user
            ");

            $doneQuery->execute([
                'item' => $item,
                'user' => $_SESSION['user_id']
            ]

            );
        break;

        case 'naoconcluido':
            $doneQuery = $db->prepare("
                UPDATE items
                SET concluido = 0
                WHERE id = :item
                AND user = :user
            ");

            $doneQuery->execute([
                'item' => $item,
                'user' => $_SESSION['user_id']
            ]

            );

            break;
    }
}

header('location: index.php');