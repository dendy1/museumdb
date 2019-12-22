<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function registerAction()
    {
        if (isset($_SESSION['account']) and $_SESSION['account']['role_id'] == 2)
        {
            $this->view->redirect('/admin');
        }

        $this->view->layout = 'default';

        if (!empty($_POST))
        {
            if (!$this->model->register_validation(['login', 'email', 'password'])
                or $this->model->user_email_exist($_POST['email'])
                or $this->model->user_login_exist($_POST['login']))
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }

            if (!$this->model->register())
            {
                $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка обращения к БД');
            }

            $this->view->redirectMessage('/', 1, 'success', 'Вы зарегистрировались!');
        }

        $this->view->render('Регистрация');
    }

    public function loginAction()
    {
        if (isset($_SESSION['account']) and $_SESSION['account']['role_id'] == 2)
        {
            $this->view->redirect('/admin');
        }

        $this->view->layout = 'default';

        if (!empty($_POST))
        {
            if (!$this->model->loginValidation())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }

            $this->model->login();

            if ($_SESSION['account']['role_id'] == 2)
            {
                $this->view->redirectMessage('/admin', 1, 'success', 'Успех!', 'Вы успешно авторизировались!');
            }

            $this->view->redirectMessage('/', 1, 'success', 'Успех!', 'Вы успешно авторизировались!');
        }

        $this->view->render('Вход');
    }

    public function logoutAction()
    {
        $this->view->layout = 'default';

        $this->model->logout();
        $this->view->redirect('/account/login');
    }
}