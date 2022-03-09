<?php
    require_once 'app/init.php';

    $itemsQuery = $db->prepare("
        SELECT id, nome, concluido
        FROM items
        WHERE user = :user
    ");

    $itemsQuery ->execute([
        'user'=> $_SESSION['user_id']
    ]);

    $items = $itemsQuery -> rowCount() ? $itemsQuery : [];


?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>To-Do-List</title>

        <link rel="stylesheet" href="css/main.css">

        <!-- Fontes -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
    </head>

    <body>
        <div class="list">

            <h1 class="header">To do List</h1>

                <?php if(!empty($items)): ?>
                <ul class="items">
                    
                            <?php foreach ($items as $item): ?>
                            <li>
                                <span class="item <?php echo $item['concluido'] ? 'done': ''?>"><?php echo $item['nome']; ?></span>

                                <?php if(!$item ['concluido']): ?>
                                    <a href="mark.php?as=concluido&item=<?php echo $item['id']; ?>" class="done-button">Concluído</a>

                                <?php else: ?>
                                    <a href="mark.php?as=concluido&item=<?php echo $item['id']; ?>" class="done-button">Deletar Tarefa</a>
                                <?php endif; ?>
                                  
                            </li>
                            <?php endforeach ?>
                    
                </ul>
                <?php else: ?>
                    <p>Você não tem itens adicionados</p>
               <?php endif; ?> 
               

                <form class="item-add" action="add.php" method="post">
                    <input type="text" name="nome" placeholder="Adicione um novo item aqui" class="input" autocomplete="off" required>
                    <input type="submit" value="add" class="submit">
                </form>
        </div>
    </body>
</html>