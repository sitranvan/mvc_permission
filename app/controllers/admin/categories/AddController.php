<?php
class AddController extends Controller
{
    private $data;
    private $categoriesModel;
    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('categories/CategoriesModel');
        $this->data = [];
    }
    public function index()
    {
        $this->data['payload']['errors'] = Session::flash('errors');
        $this->data['payload']['pre_data'] = Session::flash('pre_data');
        $this->data['payload']['msg'] = Session::flash('msg');
        $this->data['payload']['msg_type'] = Session::flash('msg_type');
        $this->data['title'] = 'Thêm danh mục bài viết';
        $this->data['view'] = 'admin/categories/add';
        $this->render('admin/layouts/layout_admin_no_sidebar', $this->data);
    }

    public function add()
    {
        $request = new Request();
        $validate = new Validate();
        if ($request->isPost()) {
            // Validate
            $validate->categories(unique: true);
        }
        if (empty($validate->getErrors())) {
            $dataInsert = [
                'name' => $validate->getDataField()['name'],
                'create_at' => date('Y-m-d H:i:s')
            ];
            $status = $this->categoriesModel->insertCategories($dataInsert);
            if ($status) {
                Session::flash('msg', 'Thêm danh mục bài viết thành công!');
                Session::flash('msg_type', 'success');
                Response::redirect('admin/quan-ly-vai-tro');
            } else {
                Session::flash('msg', 'Hệ thống đang gặp lỗi!');
                Session::flash('msg_type', 'danger');
            }
        } else {
            Session::flash('errors', $validate->getErrors());
            Session::flash('pre_data', $validate->getDataField());
        }
        Response::redirect('admin/quan-ly-danh-muc-bai-viet');
    }
}
