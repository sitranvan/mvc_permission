<?php
class EditController extends Controller
{
    private $data;
    private $postsModel;
    private $categoriesModel;
    public function __construct()
    {
        $this->postsModel = $this->loadModel('posts/PostsModel');
        $this->categoriesModel = $this->loadModel('categories/CategoriesModel');
        $this->data = [];
    }
    public function index($id)
    {
        Session::flash('id_edit', $id);
        $this->data['payload']['errors'] = Session::flash('errors');
        $this->data['payload']['pre_data'] = Session::flash('pre_data');
        $this->data['payload']['msg'] = Session::flash('msg');
        $this->data['payload']['msg_type'] = Session::flash('msg_type');
        $this->data['payload']['dataEdit'] = $this->postsModel->getPosts($id);
        $this->data['payload']['allCategories'] = $this->categoriesModel->getAllCategories();
        $this->data['title'] = 'Sửa bài viết';
        $this->data['view'] = 'admin/posts/edit';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }

    public function edit()
    {
        $idEdit = Session::flash('id_edit');
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->title();
        }
        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'title' => $validate->getDataField()['title'],
                'description' => $validate->getDataField()['description'],
                'cate_id' => $validate->getDataField()['cate'],
                'status' => $validate->getDataField()['status'],
                'update_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->postsModel->updatePosts($dataUpdate, "id='$idEdit'");
            if ($status) {
                Session::flash('msg', 'Cập nhật bài viết thành công!');
                Session::flash('msg_type', 'success');
                Response::redirect('admin/quan-ly-bai-viet');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        } else {
            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/sua-bai-viet/' . $idEdit);
    }
}
