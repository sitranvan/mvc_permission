<?php
class EditController extends Controller
{
    private $data;
    private $categoriesModel;
    public function __construct()
    {
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
        $this->data['payload']['dataEdit'] = $this->categoriesModel->getCategories("id='$id'");
        $this->data['title'] = 'Sửa danh mục bài viết';
        $this->data['view'] = 'admin/categories/edit';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }

    public function edit()
    {
        $idEdit = Session::flash('id_edit');
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->categories(true, $idEdit);
        }
        if (empty($validate->getErrors())) {
            $dataUpdate = [
                'name' => $validate->getDataField()['name'],
                'update_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->categoriesModel->updateCategories($dataUpdate, "id='$idEdit'");

            if ($status) {
                Session::flash('msg', 'Cập nhật danh mục bài viết thành công!');
                Session::flash('msg_type', 'success');
                Response::redirect('admin/quan-ly-danh-muc-bai-viet');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        } else {

            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/sua-danh-muc-bai-viet/' . $idEdit);
    }
}
