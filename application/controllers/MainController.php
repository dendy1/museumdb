<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function index_action()
    {
        $this->view->redirect('/account/login');
    }

    public function contact_action()
    {
        $this->view->redirect('/account/login');
    }

    public function about_action()
    {
        $this->view->redirect('/account/login');
    }
}