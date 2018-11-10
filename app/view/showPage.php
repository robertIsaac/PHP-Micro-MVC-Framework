<!DOCTYPE html>
<html>
<head>
    <title>home page</title>
  <?php
  self::head();
  ?>
</head>
<body>
<?php
self::header();
?>
<main>
    <div class="container-fluid text-center">
      <?php
      echo $data['data'];
      ?>
    </div>

</main>
<?php
self::footer();
?>
</body>
</html>