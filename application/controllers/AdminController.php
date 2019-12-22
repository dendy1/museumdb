<?php

namespace application\controllers;

use application\core\Controller;
use application\config\Config;
use function Sodium\add;

class AdminController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Панель управления');
    }

    public function addExhibitAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateExhibit())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->addExhibit();

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/exhibit', 2, 'success', 'Успех!', 'Экспонат успешно добавлен!');
            }
        }

        $params = [
            'categories' => $this->model->getCategories(),
            'locations' => $this->model->getLocations()
        ];

        $this->view->render('Добавление экспоната', $params);
    }

    public function addExhibitionAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateExhibition())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->addExhibition();

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/exhibition', 2, 'success', 'Успех!', 'Тематический раздел успешно добавлен!');
            }
        }

        $params = [
            'exhibits' => $this->model->getExhibits()
        ];

        $this->view->render('Добавление выставки', $params);
    }

    public function addCategoryAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateCategory())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->addCategory();

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/category', 2, 'success', 'Успех!', 'Тематический раздел успешно добавлен!');
            }
        }

        $this->view->render('Добавление тематического раздела');
    }

    public function addLocationAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateLocation())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->addLocation();

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/location', 2, 'success', 'Успех!', 'Местоположение успешно добавлено!');
            }
        }

        $this->view->render('Добавление местоположения');
    }

    public function editExhibitAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateExhibit())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->editExhibit($this->route['id']);

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/exhibit', 2, 'success', 'Успех!', 'Экспонат успешно изменён!');
            }
        }

        $params = [
            'exhibit' => $this->model->getExhibitById($this->route['id'])[0],
            'categories' => $this->model->getCategories(),
            'locations' => $this->model->getLocations()
        ];

        $this->view->render('Редактирование экспоната', $params);
    }

    public function editExhibitionAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateExhibition())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->editExhibition($this->route['id']);

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/exhibition', 2, 'success', 'Успех!', 'Выставка успешно изменёна!');
            }
        }

        $params = [
            'exhibition' => $this->model->getExhibitionById($this->route['id'])[0],
            'exhibits' => $this->model->getExhibits(),
            'exhibits_of_exhibition' => $this->model->getExhibitsOfExhibition($this->route['id'])
        ];

        $this->view->render('Редактирование выставки', $params);
    }

    public function editCategoryAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateCategory())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->editCategory($this->route['id']);

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/category', 2, 'success', 'Успех!', 'Тематический раздел успешно изменён!');
            }
        }

        $params = [
            'category' => $this->model->getCategoryById($this->route['id'])[0]
        ];

        $this->view->render('Редактирование тематического раздела', $params);
    }

    public function editLocationAction()
    {
        if (!empty($_POST))
        {
            if (!$this->model->validateLocation())
            {
                $this->view->simpleMessage('error', 'Ошибка!', $this->model->message);
            }
            else
            {
                $id = $this->model->editLocation($this->route['id']);

                if (!$id)
                {
                    $this->view->simpleMessage('error', 'Ошибка!', 'Ошибка запроса к БД');
                }

                $this->view->redirectMessage('/admin/show/location', 2, 'success', 'Успех!', 'Местоположение успешно изменёно!');
            }
        }

        $params = [
            'location' => $this->model->getLocationById($this->route['id'])[0]
        ];

        $this->view->render('Редактирование местоположения', $params);
    }

    public function showExhibitsAction()
    {
        $params = [
            'exhibits' => $this->model->getExhibits()
        ];

        $this->view->render('Список экспонатов', $params);
    }

    public function showExhibitionsAction()
    {
        $exhibits = array();
        $exhibitions = $this->model->getExhibitions();

        foreach ($exhibitions as $exhibition):
            $exhibits[$exhibition['exhibition_id']] = $this->model->getExhibitsOfExhibition($exhibition['exhibition_id']);
        endforeach;

        $params = [
            'exhibitions' => $exhibitions,
            'exhibits' => $exhibits
        ];

        $this->view->render('Список выставок', $params);
    }

    public function showCategoriesAction()
    {
        $params = [
            'categories' => $this->model->getCategories()
        ];

        $this->view->render('Список тематических разделов', $params);
    }

    public function showLocationsAction()
    {
        $params = [
            'locations' => $this->model->getLocations()
        ];

        $this->view->render('Список местоположений', $params);
    }

    public function deleteExhibitAction()
    {
        $this->model->deleteExhibit($this->route['id']);
        $this->view->redirect('/admin/show/exhibit');
    }

    public function deleteExhibitionAction()
    {
        $this->model->deleteExhibition($this->route['id']);
        $this->view->redirect('/admin/show/exhibition');
    }

    public function deleteCategoryAction()
    {
        $this->model->deleteCategory($this->route['id']);
        $this->view->redirect('/admin/show/category');
    }

    public function deleteLocationAction()
    {
        $this->model->deleteLocation($this->route['id']);
        $this->view->redirect('/admin/show/location');
    }
}