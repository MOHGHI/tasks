<div class="col-md-8 blog-main">
    <div class="content">
        <div class="container">
            <div class="content-grids">
                <div class="col-md-8 content-main">
                    <div class="content-grid">
                        <form method="get" action="/">
                            <div class="form-row">
                                <div class="container">
                                    <div class="row">
                                        <div class="form-group col-md-4 float-left">
                                            <label class="badge badge-primary" for="sortInput"><span class="badge badge-secondary">Сортировка</span></label>
                                            <select id="sortInput" name="sortInput" class="form-control">
                                                <option value="user_name">По имен</option>
                                                <option value="email">По email</option>
                                                <option value="status">По статусу</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 float-right">
                                            <label class="badge badge-primary" for="sortInput">Порядок</label>
                                            <select id="sortInput"  name="sortOrder" class="form-control">
                                                <option value="ASC">По возростанию</option>
                                                <option value="DESC">По убыванию</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ">Сортировать</button>
                            </div>
                        </form>

                        <?php foreach ($tasks as $task):?>
                            <div class="content-grid-info">
                                <div class="post-info">
                                    <h4><a href="/task/edit/<?=$task->id?>"><?=__h($task->title)?></a> <span class="badge badge-secondary">user email:</span> <?=$task->email?> || <span class="badge badge-secondary">user name: </span><?=__h($task->user_name)?> </h4>
                                    <?php if($task->status == 1): ?>
                                        <span class="badge badge-success">Выполнено</span>
                                    <?php else:?>
                                        <span class="badge badge-danger">Не Выполнено</span>
                                    <?php endif; ?>

                                    <?php if($task->changed == 1): ?>
                                        <span class="badge badge-warning">отредактировано администратором</span>
                                    <?php endif; ?>

                                    <p><?=__h($task->body)?></p>
                                    <a href="/task/edit/<?=$task->id?>"><span></span>Редактировать</a>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <nav class="blog-pagination">
                <div class="text-center">
                    <p>(<?=count($tasks)?> задач(ей) из <?=$total;?>)</p>
                    <?php if($pagination->countPages > 1): ?>
                        <?=$pagination;?>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>


        </div><!-- /.blog-main -->