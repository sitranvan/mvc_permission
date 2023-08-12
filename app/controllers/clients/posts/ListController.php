<?php
class ListController extends Controller
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
    public function index()
    {
        $request = new Request();
        $this->data['view'] = 'clients/posts/index';
        $this->data['title'] = 'Danh sách bài viết';

        if ($request->isGet()) {
            $sort = $request->getBody()['sort'] ?? 'desc';
            $cate = $request->getBody()['categories'] ?? '';
            $keyword = $request->getBody()['search'] ?? '';
            $currentPage = $request->getBody()['page'] ?? '1';
        }
        $urlParams = [
            'sort' => $sort,
            'categories' => $cate,
            'search' => $keyword
        ];
        $queryString = http_build_query($urlParams);
        $this->data['payload']['allPosts'] = $this->postsModel->getAllPostsAccept($sort, $cate, $keyword, $currentPage);
        $this->data['payload']['preData'] = $request->getBody();
        $this->data['payload']['allCategories'] = $this->categoriesModel->getAllCategories();
        $totalPages =  $this->postsModel->getTotalPages();
        $this->data['payload']['totalPages'] =  $totalPages;
        $this->data['payload']['queryString'] = $queryString;
        $this->data['payload']['currentPage'] = $currentPage;
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 2);
        $this->data['payload']['startPage'] = $startPage;
        $this->data['payload']['endPage'] = $endPage;
        $this->render('clients/layouts/layout_client', $this->data);
    }
}
