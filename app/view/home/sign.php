<!DOCTYPE html>
<html>
<head>
    <title>login</title>
  <?php
  self::head();
  ?>
    <link rel="stylesheet" href="<?php echo CSS ?>homeSign.css">
</head>
<body>

<?php
self::header();
?>

<main>
    <div class="varnaContainer">
        <form action="<?php echo ROOT; ?>home/login/" method="post" class="form-signin">
            <div class="signInForm">
                <h3 class="pageHeader">login</h3>
                <div class="modalLike">
                    <div class="modalLike-row form-group ">
                        <label for="userName" class="sr-only">user name</label>
                        <input
                                type="text"
                                name="userName"
                                id="userName"
                                placeholder="user name"
                                title="must contain at least 3 letters all in lower case letters"
                                required maxlength="32"
                                class="form-control"
                        >
                    </div>
                    <div class="modalLike-row form-group">
                        <label for="password" class="sr-only">password</label>
                        <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="password"
                                title="6-32 characters containing 1 letter and 1 number"
                                required
                                class="form-control"
                        >
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Le12RMTAAAAAKciW3NmTQRFdMSfTf2aaFHhG_wu"
                         data-theme="dark"></div>
                    <div class="modalLike-row form-group">
                        <button type="submit" class="btn btn-primary">login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
self::footer();
?>
</body>
</html>