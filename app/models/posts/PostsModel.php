<?php
class PostsModel extends Model
{
    private $totalPages;
    public function __construct()
    {
        parent::__construct();
        $this->totalPages = 0;
    }
    public function getAllPosts($keyword = '', $status = '', $cate = '', $currentPage = '')
    {
        $condition = 'JOIN users ON posts.user_id=users.id';
        if (isset($keyword) && !empty($keyword)) {
            $condition .= " WHERE title LIKE '%$keyword%'";
        }
        if (isset($status) && $status == 'all') {
            $condition .= "";
        } elseif (isset($status) && $status == '0') {
            $condition .= " AND `status` = 0";
        } elseif (isset($status) && !empty($status)) {
            $condition .= " AND `status` = $status";
        }

        if (isset($cate) && $cate == 'all') {
            $condition .= "";
        } elseif (isset($cate) && !empty($cate)) {
            $condition .= " AND `cate_id` = $cate";
        }
        $countArr = $this->countAllCondition('posts', condition: $condition);
        $countNumber = $countArr[0]['COUNT(*)'];
        $this->totalPages = ceil($countNumber / 6);

        $perPage = 6;
        $offset = ($currentPage - 1) * $perPage;
        $condition .= " LIMIT $perPage OFFSET $offset";

        return $this->fetchAllCondition('posts', "posts.*,users.fullname", $condition);
    }
    public function getAllPostsAccept($sort = '', $cate = '', $keyword = '', $currentPage = '')
    {
        $baseCondition = 'JOIN users ON posts.user_id=users.id WHERE status=1';
        $orderByCondition = '';
        $categoryCondition = '';
        $keywordCondition = '';

        if (isset($sort) && !empty($sort)) {
            $sortFinal = strtoupper($sort);
            $orderByCondition = " ORDER BY posts.create_at $sortFinal";
        }

        if (isset($cate) && $cate == 'all') {
            // Không thêm điều kiện về danh mục nếu $cate là 'all'
        } elseif (isset($cate) && !empty($cate)) {
            $categoryCondition = " AND `cate_id` = $cate";
        }

        if (isset($keyword) && !empty($keyword)) {
            $keywordCondition = " AND title LIKE '%$keyword%'";
        }

        $condition = $baseCondition . $categoryCondition . $keywordCondition . $orderByCondition;

        $countArr = $this->countAllCondition('posts', condition: $condition);
        $countNumber = $countArr[0]['COUNT(*)'];
        $this->totalPages = ceil($countNumber / 6);

        $perPage = 6;
        $offset = ($currentPage - 1) * $perPage;
        $condition .= " LIMIT $perPage OFFSET $offset";
        return $this->fetchAllCondition('posts', "posts.*,users.fullname", $condition);
    }
    public function getTotalPages()
    {
        return $this->totalPages;
    }
    public function getPosts($id = '')
    {
        $condition = "JOIN users ON posts.user_id=users.id JOIN categories ON posts.cate_id=categories.id  WHERE posts.id='$id'";
        return $this->fetchJoin('posts', 'posts.*, users.fullname, categories.name', $condition);
    }
    public function deletePosts($condition = '')
    {
        return $this->deleteRecord('posts', $condition);
    }
    public function updatePosts($data = [], $condition = '')
    {
        return $this->updateRecord('posts', $data, $condition);
    }
}
