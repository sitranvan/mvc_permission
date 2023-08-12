<?php
class DeleteController extends Controller
{
    private $postsModel;
    public function __construct()
    {
        $this->postsModel = $this->loadModel('posts/PostsModel');
    }
    public function index($id)
    {
        $status = $this->postsModel->deletePosts("id='$id'");
        if ($status) {
            Session::flash('msg', 'Xóa bài viết thành công');
            Session::flash('msg_type', 'success');
        } else {
            Session::flash('msg', 'Xóa thất bại, vui lòng thử lại sau');
            Session::flash('msg_type', 'danger');
        }
        Response::redirect('admin/quan-ly-bai-viet');
    }
}
