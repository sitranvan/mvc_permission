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
        $this->data['view'] = 'admin/posts/detail';
        $this->data['payload']['posts'] =  $this->postsModel->getPosts($id);
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }
}
