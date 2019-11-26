<?php

namespace application\controllers;

use application\core\Controller;
use application\config\Config;
use function Sodium\add;

class AdminController extends Controller
{
    public function index_action()
    {
        $this->view->render('Панель управления');
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
        if (!empty($_POST))
        {
            if (!$this->model->validate_exhibition())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->add_exhibition();

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/exhibition', 2, 'success', 'Успех!', 'Тематический раздел успешно добавлен!');
            }
        }

        $params = [
            'exhibits' => $this->model->get_exhibits()
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

        $this->view->render('Добавление тематического раздела');
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

        $this->view->render('Добавление местоположения');
    }

    public function edit_exhibit_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_exhibit())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->edit_exhibit($this->route['id']);

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/exhibit', 2, 'success', 'Успех!', 'Экспонат успешно изменён!');
            }
        }

        $params = [
            'exhibit' => $this->model->get_exhibit_by_id($this->route['id'])[0],
            'categories' => $this->model->get_categories(),
            'locations' => $this->model->get_locations()
        ];

        $this->view->render('Редактирование экспоната', $params);
    }

    public function edit_exhibition_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_exhibition())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->edit_exhibition($this->route['id']);

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/exhibition', 2, 'success', 'Успех!', 'Выставка успешно изменёна!');
            }
        }

        $params = [
            'exhibition' => $this->model->get_exhibition_by_id($this->route['id'])[0],
            'exhibits' => $this->model->get_exhibits(),
            'exhibits_of_exhibition' => $this->model->get_exhibits_of_exhibition($this->route['id'])
        ];

        $this->view->render('Редактирование выставки', $params);
    }

    public function edit_category_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_category())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->edit_category($this->route['id']);

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/category', 2, 'success', 'Успех!', 'Тематический раздел успешно изменён!');
            }
        }

        $params = [
            'category' => $this->model->get_category_by_id($this->route['id'])[0]
        ];

        $this->view->render('Редактирование тематического раздела', $params);
    }

    public function edit_location_action()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validate_location())
            {
                $this->view->simple_message('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->edit_location($this->route['id']);

                if (!$id)
                {
                    $this->view->simple_message('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirect_message('/admin/show/location', 2, 'success', 'Успех!', 'Местоположение успешно изменёно!');
            }
        }

        $params = [
            'location' => $this->model->get_location_by_id($this->route['id'])[0]
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
        $exhibits = array();
        $exhibitions = $this->model->get_exhibitions();

        foreach ($exhibitions as $exhibition):
            //array_push($exhibits, $this->model->get_exhibits_of_exhibition($exhibition['exhibition_id']));
            $exhibits[$exhibition['exhibition_id']] = $this->model->get_exhibits_of_exhibition($exhibition['exhibition_id']);
        endforeach;

        $params = [
            'exhibitions' => $exhibitions,
            'exhibits' => $exhibits
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

    public function delete_exhibit_action()
    {
        $this->model->delete_exhibit($this->route['id']);
        $this->view->redirect('/admin/show/exhibit');
    }

    public function delete_exhibition_action()
    {
        $this->model->delete_exhibition($this->route['id']);
        $this->view->redirect('/admin/show/exhibition');
    }

    public function delete_category_action()
    {
        $this->model->delete_category($this->route['id']);
        $this->view->redirect('/admin/show/category');
    }

    public function delete_location_action()
    {
        $this->model->delete_location($this->route['id']);
        $this->view->redirect('/admin/show/location');
    }
}