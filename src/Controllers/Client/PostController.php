<?php

namespace Bomdev\Asmoop\Controllers\Client;

use Bomdev\Asmoop\Commons\Controller;
use Bomdev\Asmoop\Models\Post;

class PostController extends Controller

{
    private Post $post;
    public function __construct()
    {
        $this->post = new Post();
    }
    public function show($id)
    {
        $post = $this->post->getByPostId($id);
        $viewPush = $this->post->demView($id);
        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
                'viewPush' => $viewPush,
            ]
        );
    }
    public function showByIDCategory($id)
    {
        $post = $this->post->getByPostIdCategory($id);

        return $this->renderViewClient(
            'post-showidcategory',
            [
                'post' => $post,

            ]
        );
    }
}
