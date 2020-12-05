<?php
$task = $task ?? null;
?>
<div class="form-group">
    <label for="inputTitle">Название задачи </label>
    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Введите Название задачи"
           value="<?= isset($task) ? __h($task->title) : null; ?>">
</div>
<div class="form-group">
    <label for="inputBody">Содержание задачи</label>
    <textarea class="form-control" id="inputBody" name="body" placeholder="Введите Содержание задачи"
              ><?= isset($task) ? __h($task->body) : null; ?></textarea>
</div>

<div class="form-group">
    <label for="user_name">Имя</label>
    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Введите свое имя"
           value="<?= isset($task) ? __h($task->user_name) : null; ?>">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Введите свой email"
           value="<?= isset($task) ? __h($task->email) : null; ?>">
</div>

<div class="form-group">
    <input type="checkbox" class="form-check-input" name="status" id="status" <?php if(isset($task) && $task->status == 1) echo  "checked"; ?>>
    <label class="form-check-label" for="status">status</label>
</div>
