<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <?php
  self::head();
  ?>
</head>
<body>

<?php
self::header();
?>
<main>
  <ol>
    <?php
    foreach ($users as $user) {
      echo "
        <li>
            <a href='" . ROOT . "user/single/{$user->id}/'>{$user->name}</a>
        </li>
      ";
  }
    ?>
  </ol>
</main>
<?php self::footer() ?>

</body>
</html>