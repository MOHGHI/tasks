<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom text-center">
        Login
    </h3>

    <form method="post" action="/user/login">

        <?php include APP . '/views/User/user_form.php'?>
        <button type="submit" class="btn btn-primary">Login</button>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </form>
</div><!-- /.blog-main -->