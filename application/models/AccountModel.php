<?php

namespace application\models;

use application\core\Model;
use application\config\Config;

class AccountModel extends Model
{
    public function registerValidation($input)
    {
        foreach ($input as $value)
        {
            if (!isset($_POST[$value]) or !preg_match(Config::REGISTER_RULES[$value]['pattern'], $_POST[$value]))
            {
                $this->message = Config::REGISTER_RULES[$value]['message'];
                return false;
            }
        }

        $input_password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if ($input_password !== $confirm_password)
        {
            $this->message = 'Введённые пароли не совпадают';
            return false;
        }

        return true;
    }

    public function userLoginExist($login)
    {
        $params = [
            'login' => $login
        ];

        if ($this->db->column('SELECT user_id FROM user WHERE login = :login', $params))
        {
            $this->message = 'Логин уже используется! Выберите другой.';
            return true;
        }

        return false;
    }

    public function userEmailExist($email)
    {
        $params = [
            'email' => $email
        ];

        if ($this->db->column('SELECT user_id FROM user WHERE email = :email', $params))
        {
            $this->message = 'Аккаунт на данный E-Mail уже зарегистрирован!';
            return true;
        }

        return false;
    }

    public function register()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $user_params = [
            'user_id' => null,
            'role_id' => 1,
            'login' => $login,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'create_date' => date("Y-m-d H:i:s")
        ];

        $this->db->query('INSERT INTO user VALUES (:user_id, :role_id, :login, :password, :email, :create_date)', $user_params);

        return $this->db->lastInsertId();
    }

    public function loginValidation()
    {
        $params = [
            'login' => $_POST['login'],
            'email' => $_POST['login']
        ];
        $hash = $this->db->column('SELECT password FROM user WHERE login = :login OR email = :email;', $params);
        if (!$hash or !password_verify($_POST['password'], $hash))
        {
            $this->message = 'Неверный логин или пароль!';
            return false;
        }
        return true;
    }

    public function login()
    {
        $params = [
            'login' => $_POST['login'],
            'email' => $_POST['login']
        ];

        $current_user = $this->db->row('SELECT * FROM user u WHERE login = :login OR email = :email;', $params)[0];
        $_SESSION['account'] = $current_user;
    }

    public function logout()
    {
        unset($_SESSION['account']);
    }
}