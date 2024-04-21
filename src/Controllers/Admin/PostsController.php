<?php

namespace Bomdev\Asmoop\Controllers\Admin;

use Bomdev\Asmoop\Commons\Controller;
use Bomdev\Asmoop\Models\Category;
use Bomdev\Asmoop\Models\Post;


class PostsController extends Controller
{
    private Category $cate;
    private Post $post;
    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new Post();
        $this->cate = new Category();
    }
    public function index()
    {
        $data['posts'] = $this->post->getAllPosts();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function show($id)
    {
        $data['post'] = $this->post->getByPostId($id);
        if (empty($data['post'])) {
            echo e404();
            die;
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function create()
    {

        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $excerpt = $_POST['excerpt'];


            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if (!empty($image)) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }


            $this->post->insertPost($category_id, $title, $excerpt, $content, $imagePath);
            header('Location: /admin/posts');
            exit();
        }
        $data['categories'] = $this->cate->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function update($id)
    {
        $categories = $this->cate->getAll();
        $post = $this->post->getByPostId($id);
        $move = false;
        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $excerpt = $_POST['excerpt'];

            $image = $_FILES['image'] ?? null;
            $imagePath = $post['p_image'];
            
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $post['p_image'];
                } else {
                    $move = true;
                }
            }
           
          
            $this->post->updatePost($category_id, $title, $excerpt, $content, $imagePath, $id);
            if (
                $move
                && $post['p_image']
                && file_exists(PATH_ROOT . $post['p_image'])
            ) {
                unlink(PATH_ROOT . $post['p_image']);
            }
            header('Location: /admin/posts');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['post' => $post, 'categories' => $categories]);
    }
    public function delete($id)
    {
        $post = $this->post->getByPostId($id);
        if (empty($post)) {
            e404();
        }
        $this->post->deletePost($id);
        if (!empty($post['image']) && file_exists(PATH_ROOT . $post['post'])) {
            unlink(PATH_ROOT . $post['image']);
        }
        header('Location: /admin/posts');
    }
}
