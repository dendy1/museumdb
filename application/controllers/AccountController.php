<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function register_action()
    {
        $this->view->layout = 'main';

        if (!empty($_POST))
        {
            if (!$this->model->register_validation(['login', 'email', 'password'])
                or $this->model->user_email_exist($_POST['email'])
                or $this->model->user_login_exist($_POST['login']))
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }

            if (!$this->model->register())
            {
                $this->view->simple_message('error', 'Ошибка!', 'Ошибка обращения к БД');
            }

            $this->view->redirect_message('/', 1, 'success', 'Вы зарегистрировались!');
        }

        $params = [

        ];

        $this->view->render('Регистрация', $params);
    }

    public function login_action()
    {
        $this->view->layout = 'main';

        if (!empty($_POST))
        {
            if (!$this->model->login_validation())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }

            $this->model->login();

            if ($_SESSION['account']['role_id'] == 2)
            {
                $this->view->redirect_message('/admin', 1, 'success', 'Успех!', 'Вы успешно авторизировались!');
            }

            $this->view->redirect_message('/', 1, 'success', 'Успех!', 'Вы успешно авторизировались!');
        }

        $params = [

        ];

        $this->view->render('Вход', $params);
    }

    public function logout_action()
    {
        $this->view->layout = 'main';

        $this->model->logout();
        $this->view->redirect('/account/login');
    }
}