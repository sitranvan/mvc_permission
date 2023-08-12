
// Xử lí url các trường hợp như khi không có dữ liệu gì và bấm phân trang nếu không xử lí thì sẽ như sau
// ?page=2&status=&categories= => xử lí => ?page=2, nếu trường hợp tham số nào không có hoặc '' thì loại bỏ
// Kiểm tra URL hiện tại
const currentUrl = new URL(window.location.href);

// Lấy giá trị của tham số "search" từ URL
const searchParam = currentUrl.searchParams.get("search");
const roleParam = currentUrl.searchParams.get("role");
const categoriesParam = currentUrl.searchParams.get("categories");
const statusParam = currentUrl.searchParams.get("status");

// Nếu giá trị của tham số "search" là null hoặc rỗng, xóa tham số này khỏi URL
if (!searchParam) {
    currentUrl.searchParams.delete("search");
}
// Nếu giá trị của tham số "role" là null hoặc rỗng, xóa tham số này khỏi URL
if (!roleParam) {
    currentUrl.searchParams.delete("role");
}
if (!categoriesParam) {
    currentUrl.searchParams.delete("categories");
}
if (!statusParam) {
    currentUrl.searchParams.delete("status");
}
// Đặt lại URL sau khi xử lí
history.replaceState(null, "", currentUrl.toString());

const checkEditor = document.querySelector("#editor_admin");
if (checkEditor) {
    CKEDITOR.replace('editor_admin', {
        filebrowserBrowseUrl: '/projects/mvc_permission/app/libraries/ckfinder/ckfinder.html',
        filebrowserUploadUrl: '/projects/mvc_permission//app/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    });
}
