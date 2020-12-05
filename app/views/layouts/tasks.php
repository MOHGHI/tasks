<?php
include APP . '/views/layouts/include/header.php';
?>

<body>
<main role="main" class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?= isset($content) ? $content : '' ?>

</main><!-- /.container -->
<?php
include APP . '/views/layouts/include/footer.php';
?>
</body>
</html>
