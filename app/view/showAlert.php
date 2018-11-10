<!DOCTYPE html>
<html>
<head>
    <title>home page</title>
  <?php
  self::head();
  ?>
    <script>
        $(function () {
            var interval = setInterval(function () {
                var time = $('#time').text() * 1 - 1;
                $('#time').text(time);
                if (time <= 0) {
                    $('#link')[0].click();
                    clearInterval(interval);
                }
            }, 1000);
        });
    </script>
</head>
<body>
<?php
self::header();
?>
<main>
    <div class="container-fluid text-center">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <?php
              echo $data;
              ?>
            </div>
            <div class="panel-body">
                <p>
                    you will be redirected in <span id="time"><?php echo $time; ?></span> seconds
                </p>
                <p>
                    click <a id="link" href="<?php echo $url; ?>">here</a> if you want to go now
                </p>
            </div>
        </div>
    </div>
</main>
<?php
self::footer();
?>
</body>
</html>