<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function postValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$descriptionLen = iconv_strlen($post['description']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 2 or $nameLen > 30) {
			$this->error = 'Ваше имя должно быть от 2 до 10 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 20) {
			$this->error = 'Некорректный Email';
			return false;
		} elseif ($textLen < 5 or $textLen > 5000) {
			$this->error = 'Текст должнен содержать от 10 до 5000 символов';
			return false;
		}

		return true;
	}

    public function postAdd($post) {
        $idx = rand(0,10000);
        $params = [
            'id' => $idx,
            'name' => $post['name'],
            'description' => $post['description'],
            'text' => $post['text'],
            'isdo' => '',
            'changed' => ''
        ];
        $this->db->query('INSERT INTO posts VALUES (:id, :name, :description, :text, :isdo, :changed)', $params);
        return $this->db->lastInsertId();
    }

    public function postEdit($post, $id) {

        $prop = [
            'id' => $id,
        ];
        $texts = $this->db->column('SELECT text FROM posts WHERE id = :id', $prop);

        if ($texts === $post['text']) {

            $params = [
                'id' => $id,
                'name' => $post['name'],
                'description' => $post['description'],
                'text' => $post['text'],
            ];
            $this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE id = :id', $params);
        } else {

            $params = [
                'id' => $id,
                'name' => $post['name'],
                'description' => $post['description'],
                'text' => $post['text'],
                'changed' => 'true'
            ];
            $this->db->query('UPDATE posts SET name = :name, description = :description, text = :text, changed = :changed WHERE id = :id', $params);

        }
    }



	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	public function postDelete($id) {
	    $isdo = 'do';
		$params = [
			'id' => $id,
            'isdo' => $isdo
		];
		$this->db->query('UPDATE posts SET isdo = :isdo WHERE id = :id', $params);

	}

	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

}