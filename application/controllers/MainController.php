<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function index_action()
    {
        $this->view->render("Главная страница музея");
    }

    public function contact_action()
    {
        $this->view->render("Контакты музея");
    }

    public function about_action()
    {
        $this->view->render("Информация о музее");
    }
}