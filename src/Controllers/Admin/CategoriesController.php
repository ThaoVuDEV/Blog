<?php

namespace Bomdev\Asmoop\Controllers\Admin;

use Bomdev\Asmoop\Commons\Controller;
use Bomdev\Asmoop\Models\Category;


class CategoriesController extends Controller
{
    private Category $category;
    private string $folder = 'categories.';
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index()
    {
        $data['categories'] = $this->category->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $this->category->insert($name);
            header('Location: /admin/categories');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    public function update($id)
    {
        $category = $this->category->getById($id);
        if (empty($category)) {
            echo e404();
        }
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $this->category->updateByID($id, $name);
            header('Location: /admin/categories');
            exit();
        }
        $data['category'] = $this->category->getByID($id);
        return $this->renderViewAdmin($this->folder . __FUNCTION__,['category' => $category]);
    }
    public function delete($id){
        $cate = $this->category->getByID($id);
        if (!empty($user)) {
            e404();
        }
        $this->category->deleteByID($id);
        header('Location: /admin/categories');
    }
}
