<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom text-center ">
        Edit Task
    </h3>

    <form method="post" action="/task/edit">

        <?php include APP . '/views/Task/task_form.php'?>
        <input type="hidden" name="id" value="<?=$task->id;?>">
        <button type="submit" class="btn btn-primary">редактировать задачу</button>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </form>
</div><!-- /.blog-main -->