<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller {

    public $filtr = '';

    public function indexAction() {

	  if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'status-do') {
            $pagination = new Pagination($this->route, $this->model->postsCountdo());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->postsListdo($this->route),
            ];
            $this->view->render('Главная страница', $vars);

        } else if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'status-no') {
            $pagination = new Pagination($this->route, $this->model->postsCountno());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->postsListno($this->route),
            ];
            $this->view->render('Главная страница', $vars);

        } else if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'names-down') {
            $pagination = new Pagination($this->route, $this->model->postsCount());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->postsListNamedown($this->route),
            ];
            $this->view->render('Главная страница', $vars);
        } else if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'names-up') {
          $pagination = new Pagination($this->route, $this->model->postsCount());
          $vars = [
              'pagination' => $pagination->get(),
              'list' => $this->model->postsListNameup($this->route),
          ];
          $this->view->render('Главная страница', $vars);
      } else if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'email-down') {
            $pagination = new Pagination($this->route, $this->model->postsCount());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->postsListEmaildown($this->route),
            ];
            $this->view->render('Главная страница', $vars);
        } else if (isset($_COOKIE['filter']) && $_COOKIE['filter'] === 'email-up') {
          $pagination = new Pagination($this->route, $this->model->postsCount());
          $vars = [
              'pagination' => $pagination->get(),
              'list' => $this->model->postsListEmailup($this->route),
          ];
          $this->view->render('Главная страница', $vars);
      } else
        {
            $pagination = new Pagination($this->route, $this->model->postsCount());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->postsList($this->route),
            ];
            $this->view->render('Главная страница', $vars);
        }





	}

	public function choiseAction() {
        if (!empty($_POST['select'])) {
            $this->filtr = $_POST['select'];

            setcookie("filter", $this->filtr, time() + 3600);

            header('Location: /');
        }

    }



    public function postAction() {
		$adminModel = new Admin;
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}

		$vars = [
			'data' => $adminModel->postData($this->route['id'])[0],
		];
		$this->view->render('Пост', $vars);
	}

}