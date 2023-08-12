<?php
class ListController extends Controller
{
    private $postsModel;
    private $categoriesModel;
    private $data = [];
    public function __construct()
    {
        $this->postsModel = $this->loadModel('posts/PostsModel');
        $this->categoriesModel = $this->loadModel('categories/CategoriesModel');
        $this->data = [];
    }
    public function index()
    {
        $request = new Request();
        $this->data['view'] = 'admin/posts/index';
        $this->data['title'] = 'Quản lý bài viết';

        $request = new Request();
        if ($request->isGet()) {
            $keyword = $request->getBody()['search'] ?? '';
            $status = $request->getBody()['status'] ?? '';
            $cate = $request->getBody()['categories'] ?? '';
            $currentPage = $request->getBody()['page'] ?? '1';
        }
        $urlParams = [
            'search' => $keyword,
            'status' => $status,
            'categories' => $cate,
        ];
        $queryString = http_build_query($urlParams);
        $this->data['payload']['allPosts'] = $this->postsModel->getAllPosts($keyword, $status, $cate, $currentPage);
        $totalPages =  $this->postsModel->getTotalPages();
        $this->data['payload']['totalPages'] =  $totalPages;
        $this->data['payload']['queryString'] = $queryString;
        $this->data['payload']['currentPage'] = $currentPage;
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 2);
        $this->data['payload']['startPage'] = $startPage;
        $this->data['payload']['endPage'] = $endPage;
        $this->data['payload']['preData'] = $request->getBody();
        $this->data['payload']['preData'] = $request->getBody();
        $this->data['payload']['allCategories'] = $this->categoriesModel->getAllCategories();
        $this->render('admin/layouts/layout_admin', $this->data);
    }
}
