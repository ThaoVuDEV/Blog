<?php

namespace Bomdev\Asmoop\Controllers\Admin;

use Bomdev\Asmoop\Commons\Controller;
use Bomdev\Asmoop\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';

    const PATH_UPLOAD = '/uploads/users/';

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        $data['users'] = $this->user->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }


    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = null;
            if (!empty($avatar)) {
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];
                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = null;
                }
            }
            $this->user->insert($name, $email, $password, $avatarPath);
            header('Location: /admin/users');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    public function show($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function update($id)
    {
        $user = $this->user->getByID($id);
        if (empty($user)) {
            e404();
        }
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = $user['avatar'];
            if (!empty($avatar)) {
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];
                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = $user['avatar'];
                }
            }

            $this->user->updateByID($id, $name, $email, $password, $avatarPath);
            header('Location: /admin/users');
            exit();
        }
        
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }
    
    public function delete($id)
    {
        $user = $this->user->getByID($id);
        if (empty($user)) {
            e404();
        }
        $this->user->deleteByID($id);
        if (!empty($user['avatar']) && file_exists(PATH_ROOT . $user['avatar'])) {
            unlink(PATH_ROOT . $user['avatar']);
        }
        header('Location: /admin/users');
    }
}
