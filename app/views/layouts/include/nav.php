<ul>
    <li  class="nav"><a href="/">Главная</a></li>
    <li><a class="nav" href="/task/add">Добавить задачу</a></li>
    <?php if(!isset($_SESSION['user'])):?>
        <li><a class="nav" href="/user/login">Login</a></li>
    <?php else: ?>
        <li><a class="nav" href="/user/logout">Logout</a></li>
    <?php endif; ?>
    <div class="clearfix"> </div>
</ul>