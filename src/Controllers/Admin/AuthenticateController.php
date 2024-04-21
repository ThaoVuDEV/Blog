<?php

namespace Bomdev\Asmoop\Controllers\Admin;

use Bomdev\Asmoop\Commons\Controller;
use Bomdev\Asmoop\Models\User;

class AuthenticateController extends Controller
{
    
    public function login()
    {
        if (!empty($_POST)) {
            $_SESSION['error'] = [];

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error']['email'] = 'Email không được để trống và đúng định dạng';
            }

            if (empty($password)) {
                $_SESSION['error']['password'] = 'Password không được để trống';
            }
           
            $user = (new User)-> getByEmailAndPassword( $email,$password);
            if (empty($user)) {
                $_SESSION['user']['not-found'] = "Không tìm thấy người dùng";
            } else {
                $_SESSION['user'] = $user;
                header('Location: /admin/');
                exit();
            }
        }
        return $this->renderViewAdmin(__FUNCTION__);
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}
