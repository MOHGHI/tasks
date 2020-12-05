<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom text-center ">
        Create Task
    </h3>

    <form method="post" action="/task/add">

        <?php include APP . '/views/Task/task_form.php'?>
        <button type="submit" class="btn btn-primary">Создать задачу</button>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </form>
</div><!-- /.blog-main -->