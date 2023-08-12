<?php
class DeleteController extends Controller
{
    private $categoriesModel;
    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('categories/CategoriesModel');
    }
    public function index($id)
    {
        $status = $this->categoriesModel->deleteCategories("id='$id'");
        if ($status) {
            Session::flash('msg', 'Xóa danh mục thành công');
            Session::flash('msg_type', 'success');
        } else {
            Session::flash('msg', 'Xóa thất bại, vui lòng thử lại sau');
            Session::flash('msg_type', 'danger');
        }
        Response::redirect('admin/quan-ly-danh-muc-bai-viet');
    }
}
