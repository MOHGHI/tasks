<?php
$task = $task ?? null;
?>

<div class="form-group">
    <label for="login">Имя</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Введите свое имя"
           value="<?php isset($_SESSION['form_data']['login']) ? __h($_SESSION['form_data']['login']) : null; ?>">
</div>

<div class="form-group">
    <label for="password">Email</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Введите свой пароль"
           value="<?php isset($_SESSION['form_data']['password']) ? __h($_SESSION['form_data']['password']) : null; ?>">
</div>

