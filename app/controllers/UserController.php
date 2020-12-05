<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($this->login($user)){
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect('/');
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
        }
        $this->setMeta('Вход');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

    public function login($isAdmin = false){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if($isAdmin){
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            }else{
                $user = \R::findOne('user', "login = ?", [$login]);
            }
            if($user){
                if(($password == $user->password)){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }
}