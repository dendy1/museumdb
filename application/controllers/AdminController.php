<?php

namespace application\controllers;

use application\core\Controller;
use application\config\Config;

class AdminController extends Controller
{
    public function index_action()
    {
        $params = [

        ];

        $this->view->render('Панель управления', $params);
    }

    public function add_exhibit_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_exhibit())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->add_exhibit();

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/exhibit', 2, 'success', 'Успех!', 'Экспонат успешно добавлен!');
            }
        }

        $params = [
            'categories' => $this->model->get_categories(),
            'locations' => $this->model->get_locations()
        ];

        $this->view->render('Добавление экспоната', $params);
    }

    public function add_exhibition_action()
    {
        $params = [

        ];

        $this->view->render('Добавление выставки', $params);
    }

    public function add_category_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_category())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->add_category();

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/category', 2, 'success', 'Успех!', 'Тематический раздел успешно добавлен!');
            }
        }

        $params = [

        ];

        $this->view->render('Добавление тематического раздела', $params);
    }

    public function add_location_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_location())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->add_location();

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/location', 2, 'success', 'Успех!', 'Местоположение успешно добавлено!');
            }
        }

        $params = [

        ];

        $this->view->render('Добавление местоположения', $params);
    }

    public function edit_exhibit_action()
    {
        $params = [

        ];

        $this->view->render('Редактирование экспоната', $params);
    }

    public function edit_exhibition_action()
    {
        $params = [

        ];

        $this->view->render('Редактирование выставки', $params);
    }

    public function edit_category_action()
    {
        $params = [

        ];

        $this->view->render('Редактирование тематического раздела', $params);
    }

    public function edit_location_action()
    {
        $params = [

        ];

        $this->view->render('Редактирование местоположения', $params);
    }

    public function show_exhibits_action()
    {
        $params = [
            'exhibits' => $this->model->get_exhibits()
        ];

        $this->view->render('Список экспонатов', $params);
    }

    public function show_exhibitions_action()
    {
        $params = [
            'exhibitions' => $this->model->get_exhibitions()
        ];

        $this->view->render('Список выставок', $params);
    }

    public function show_categories_action()
    {
        $params = [
            'categories' => $this->model->get_categories()
        ];

        $this->view->render('Список тематических разделов', $params);
    }

    public function show_locations_action()
    {
        $params = [
            'locations' => $this->model->get_locations()
        ];

        $this->view->render('Список местоположений', $params);
    }
}