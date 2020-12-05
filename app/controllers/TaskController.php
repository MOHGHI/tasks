<?php


namespace app\controllers;


use app\models\AppModel;
use app\models\Task;
use onlinetasks\App;
use RedBeanPHP\R;

class TaskController extends AppController
{
    public function addAction() {
        if(!empty($_POST)){
            $task = new Task();
            $data = $_POST;
            $task->load($data);
            $task->attributes['status'] = $task->attributes['status'] ? '1' : '0';

            if(!$task->validate($data)){
                $task->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $task->save('tasks')){
                $alias = AppModel::createAlias('tasks', 'alias', $data['title'], $id);
                $task = R::load('tasks', $id);
                $task->alias = $alias;
                R::store($task);
                $_SESSION['success'] = 'Task added';
            }
            redirect();
        }

        $this->setMeta('New Task');
    }

    public function viewAction(){
        if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
            $alias = $this->route['alias'];
            $task = \R::findOne('tasks', "id = ?", [$alias]);
            if(!$task){
                throw new \Exception('Страница не найдена', 401);
            }

            $this->setMeta($task->title);
            $this->set(compact('task'));
        } else {
            throw new \Exception('Вы не авторизованы для редактирования.', 401);
        }

    }

    public function editAction(){
        if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
            if(!empty($_POST)){
                $id = $this->getRequestID(false);
                $task = new Task();
                $data = $_POST;
                $task->load($data);
                $body  = \R::findOne('tasks', "id = ?", [$id])->body;
                if(isset($data['body']) && $data['body'] !== __h($body))
                    $task->attributes['changed'] = 1;
                $task->attributes['status'] = $task->attributes['status'] ? '1' : '0';
                if(!$task->validate($data)){
                    $task->getErrors();
                    redirect();
                }
                if($task->update('tasks', $id)){
                    $alias = AppModel::createAlias('tasks', 'alias', $data['title'], $id);
                    $task = \R::load('tasks', $id);
                    $task->alias = $alias;
                    \R::store($task);
                    $_SESSION['success'] = 'Изменения сохранены';
                    redirect();
                }
            }

            $id = $this->getRequestID();
            $task = \R::load('tasks', $id);

            $this->setMeta("Редактирование задачи {$task->title}");
            $this->set(compact('task'));
        } else {
            throw new \Exception('Вы не авторизованы для редактирования.', 401);
        }
    }


}