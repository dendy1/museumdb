<?php

namespace application\controllers;

use application\core\Controller;
use application\models\MainModel;

class MainController extends Controller
{
    public function indexAction()
    {
        $params = [
            'close_exhibition' => $this->model->getCloseExhibitions()[0],
            'ongoing_exhibitions' => $this->model->getOngoingExhibitions(7),
            'exhibits' => $this->model->getExhibits(15)
        ];

        $this->view->render("Главная страница", $params);
    }

    public function contactAction()
    {
        $this->view->render("Связь с музеем");
    }

    public function aboutAction()
    {
        $this->view->render("О музее");
    }

    public function exhibitAction()
    {
        $exhibit = $this->model->getExhibitById($this->route['id'])[0];
        $exhibitions = $this->model->getExhibitionsOfExhibit($this->route['id']);
        $params = [
            'exhibit' => $exhibit,
            'exhibitions' => $exhibitions
        ];
        $this->view->render($exhibit["name"], $params);
    }

    public function exhibitionAction()
    {
        $exhibition = $this->model->getExhibitionById($this->route['id'])[0];
        $exhibits = $this->model->getExhibitsOfExhibition($this->route['id']);
        $params = [
            'exhibition' => $exhibition,
            'exhibits' => $exhibits
        ];
        $this->view->render($exhibition["name"], $params);
    }

    public function categoryAction()
    {
        $category = $this->model->getCategoryById($this->route['id'])[0];
        $exhibits = $this->model->getExhibitsOfCategory($this->route['id']);
        $params = [
            'category' => $category,
            'exhibits' => $exhibits
        ];
        $this->view->render($category["category"], $params);
    }
}