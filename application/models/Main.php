<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function contactValidate($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}

	public function postsCount() {
		return $this->db->column('SELECT COUNT(*) FROM posts');
	}

    public function postsCountdo() {
        return $this->db->column("SELECT COUNT(*) FROM `posts` WHERE isdo = 'do' ");
    }

    public function postsCountno() {
        return $this->db->column("SELECT COUNT(*) FROM `posts` WHERE isdo = '' ");
    }

	public function postsList($route) {
	    $max = 3;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];

		return $this->db->row('SELECT * FROM posts ORDER BY id DESC LIMIT :start, :max', $params);

	}

    public function postsListdo($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts WHERE isdo = 'do' ORDER BY `name` DESC LIMIT :start, :max", $params);

    }
    public function postsListno($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts WHERE isdo = '' ORDER BY `name` DESC LIMIT :start, :max", $params);

    }

    public function postsListNamedown($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts ORDER BY `name` ASC LIMIT :start, :max", $params);

    }

    public function postsListNameup($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts ORDER BY `name` DESC LIMIT :start, :max", $params);

    }

    public function postsListEmaildown($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts ORDER BY `description` ASC LIMIT :start, :max", $params);

    }
    public function postsListEmailup($route) {
        $max = 3;
        $params = [
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts ORDER BY `description` DESC LIMIT :start, :max", $params);

    }


}