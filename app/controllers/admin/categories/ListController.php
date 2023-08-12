<?php
class ListController extends Controller
{
    private $categoriesModel;
    private $data = [];
    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('categories/CategoriesModel');
    }
    public function index()
    {
        $request = new Request();
        $this->data['view'] = 'admin/categories/index';
        $this->data['title'] = 'Quản lý danh mục bài viết';
        if ($request->isGet()) {
            $keyword = $request->getBody()['search'] ?? '';
        }
        $this->data['payload']['allCategories'] = $this->categoriesModel->getAllCategories($keyword);
        $this->data['payload']['preData'] = $request->getBody();
        $this->render('admin/layouts/layout_admin', $this->data);
    }
}
