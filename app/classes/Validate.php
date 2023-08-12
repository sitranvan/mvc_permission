<?php
class Validate
{
    private $errors;
    private $db;
    private $request;
    public function __construct()
    {
        $this->db = new DataBase();
        $this->errors = [];
        $this->request = new Request();
    }
    public function fullname()
    {
        if (empty(trim($this->request->getBody()['fullname']))) {
            $this->errors['fullname'] = 'Họ tên không bỏ trống';
        } else {
            if (strlen(trim($this->request->getBody()['fullname'])) < 4) {
                $this->errors['fullname'] = 'Họ tên phải >= 4 ký tự';
            }
        }
    }
    public function username($unique = false, $userId = '')
    {
        if (empty(trim($this->request->getBody()['username']))) {
            $this->errors['username'] = 'Tên đăng nhập không bỏ trống';
        } else {
            if (strlen(trim($this->request->getBody()['username'])) < 4) {
                $this->errors['username'] = 'Tên đăng nhập phải >= 4 ký tự';
            } else {
                if ($unique == true) {
                    $username = $this->request->getBody()['username'];
                    if (!empty($userId)) {
                        $sql = "SELECT id FROM users WHERE username='$username' AND id<>'$userId'";
                    } else {
                        $sql = "SELECT id FROM users WHERE username='$username'";
                    }
                    $checkExists = $this->db->exists($sql);
                    if ($checkExists > 0) {
                        $this->errors['username'] = 'Tên đăng nhập đã tồn tại trong hệ thống';
                    }
                }
            }
        }
    }
    public function email($unique = false, $userId = '')
    {
        if (empty(trim($this->request->getBody()['email']))) {
            $this->errors['email'] = 'Email không bỏ trống';
        } else {
            if (!filter_var($this->request->getBody()['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Email không hợp lệ';
            } else {
                if ($unique == true) {
                    $email = $this->request->getBody()['email'];

                    if (!empty($userId)) {
                        $sql = "SELECT id FROM users WHERE email='$email' AND id<>'$userId'";
                    } else {
                        $sql = "SELECT id FROM users WHERE email='$email'";
                    }
                    $checkExists = $this->db->exists($sql);
                    if ($checkExists > 0) {
                        $this->errors['email'] = 'Email đã tồn tại trong hệ thống';
                    }
                }
            }
        }
    }

    public function password($duplicate = false)
    {
        if (empty(trim($this->request->getBody()['password']))) {
            $this->errors['password'] = 'Mật khẩu không bỏ trống';
        } else {
            if (strlen(trim($this->request->getBody()['password'])) < 6) {
                $this->errors['password'] = 'Mật khẩu phải >= 6 ký tự';
            } else {
                if ($duplicate == true) {
                    $userLogin = new UserLogin();
                    $passwordHash = $userLogin->get()['password'];
                    if (password_verify((trim($this->request->getBody()['password'])), $passwordHash)) {
                        $this->errors['password'] = 'Mật khẩu mới phải khác mật khẩu cũ';
                    }
                }
            }
        }
    }

    public function confirmPassword()
    {
        if (empty(trim($this->request->getBody()['confirm_password']))) {
            $this->errors['confirm_password'] = 'Xác nhận mật không bỏ trống';
        } else {
            if (trim($this->request->getBody()['password']) != trim($this->request->getBody()['confirm_password'])) {
                $this->errors['confirm_password'] = 'Mật khẩu không khớp';
            }
        }
    }
    public function role($unique = false, $roleId = '')
    {
        if (empty(trim($this->request->getBody()['name']))) {
            $this->errors['role'] = 'Vai trò không bỏ trống';
        } else {
            if ($unique == true) {
                $roleName = $this->request->getBody()['name'];

                if (!empty($roleId)) {
                    $sql = "SELECT id FROM roles WHERE `name`='$roleName' AND id<>'$roleId'";
                } else {
                    $sql = "SELECT id FROM roles WHERE `name`='$roleName'";
                }
                $checkExists = $this->db->exists($sql);
                if ($checkExists > 0) {
                    $this->errors['role'] = 'Vai trò đã tồn tại trong hệ thống';
                }
            }
        }
    }
    public function categories($unique = false, $cateId = '')
    {
        if (empty(trim($this->request->getBody()['name']))) {
            $this->errors['name_cate'] = 'Danh mục bài viết không bỏ trống';
        } else {
            if ($unique == true) {
                $cateName = $this->request->getBody()['name'];

                if (!empty($cateId)) {
                    $sql = "SELECT id FROM categories WHERE `name`='$cateName' AND id<>'$cateId'";
                } else {
                    $sql = "SELECT id FROM categories WHERE `name`='$cateName'";
                }
                $checkExists = $this->db->exists($sql);
                if ($checkExists > 0) {
                    $this->errors['name_cate'] = 'Danh mục bài viết đã tồn tại trong hệ thống';
                }
            }
        }
    }
    public function title()
    {
        if (empty(trim($this->request->getBody()['title']))) {
            $this->errors['title'] = 'Tiêu đề không bỏ trống';
        } else {
            if (strlen(trim($this->request->getBody()['title'])) < 6) {
                $this->errors['title'] = 'Tiêu đề phải >= 6 ký tự';
            }
        }
    }
    public function getDataField()
    {
        return $this->request->getBody();
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
