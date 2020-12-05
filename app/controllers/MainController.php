<?php


namespace app\controllers;




use onlinetasks\App;
use onlinetasks\libs\Pagination;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction() {
        $sortInput = $_GET['sortInput'] ?? null;
        $sortOrder = $_GET['sortOrder'] ?? null;

        $all_tasks = R::findAll('tasks');
        $this->setMeta('Главная страница', 'Описание...', 'Ключевики...');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = count($all_tasks);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $orderInput = isset($sortInput) ? "ORDER BY $sortInput" : '';
        $orderBy = isset($sortInput) ? "$sortOrder" : '';

        $tasks = \R::find('tasks', "$orderInput $orderBy LIMIT $start, $perpage");
        $this->set(compact('tasks', 'pagination', 'total'));


    }

}