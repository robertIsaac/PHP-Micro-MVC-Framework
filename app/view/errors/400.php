<!DOCTYPE html>
<html>
<head>
    <title>OneShot - ERROR 400</title>
  <?php
  self::head();
  ?>

</head>

<body>

<?php
self::header();
?>
<main style="direction: ltr;text-align: center;">
    <h1>ERROR 400 - Bad Request</h1>
    <div>
      <?php echo $data['message']; ?>
    </div>
</main>
<?php
self::footer();
?>
</body>
</html>