<?php
class DetailController extends Controller
{
    private $data;
    private $postsModel;
    public function __construct()
    {
        $this->data = [];
        $this->postsModel = $this->loadModel('posts/PostsModel');
    }
    public function index($id)
    {
        $this->data['title'] = 'Chi tiết bài viết';
        $this->data['view'] = 'clients/posts/detail';
        $this->data['payload']['posts'] =  $this->postsModel->getPosts($id);
        $this->render('clients/layouts/layout_client', $this->data);
    }
}
