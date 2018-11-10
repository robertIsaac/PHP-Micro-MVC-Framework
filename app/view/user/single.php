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
    <?php
      echo "<div>user name: {$user->name}</div>";
      echo "<div>user id: {$user->id}</div>";
    ?>
</main>
<?php self::footer() ?>

</body>
</html>