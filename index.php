<?php

session_start();
// session_unset();
// session_destroy();

//si la clé 'todos' n'esxiste pas dans $_SESSION
if (!isset($_SESSION['todos'])) {
  require_once __DIR__ . "/includes/todos.php";
  $_SESSION['todos'] = $todos;
};

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require_once __DIR__ . '/includes/head.php' ?>
  <title>ToraTaTache</title>
</head>

<body>
  <div class="container">
    <header>
      <?php require_once __DIR__ . '/includes/header.php' ?>
    </header>
    <div class="content">

      <div class="todo-container">
        <h1>Mes tâches</h1>
        <ul class="todo-list">
          <?php foreach ($_SESSION['todos'] as $todo): ?>
            <li class="todo-item <? $todo['done'] ? 'low-opacity' : '' ?>">
              <span class="todo-name"><?= $todo['name'] ?></span>
              <button class="btn btn-primary btn-small">
                <?= $todo['done'] ? 'Annuler' : 'Valider' ?>
              </button>
              <a href="/includes/remove-todo.php?id=<?= $todo['id'] ?>">
                <button class="btn btn-danger btn-small">
                  Supprimer
                </button>
              </a>
            <?php endforeach; ?>
            </li>
        </ul>
      </div>
    </div>
  </div>
  <footer>
    <?php require_once __DIR__ . '/includes/footer.php' ?>
  </footer>
  </div>
</body>

</html>