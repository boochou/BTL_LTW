<?php
        // Kiểm tra nếu có tham số truyền vào từ URL, nếu không, mặc định là trang chính
$page = $_GET['page'] ?? 'homepage';
$url_pages = [
    'homepage' => './homepage.php',
    'user_info' => './user_info.php',
    'wish_list' => './wish_list.php',
    'orders' => './orders.php',
    'community' => './community.php'
];
$load_page = $url_pages[$page];

// Include nội dung của trang được yêu cầu
if (file_exists($load_page)) {
    include $load_page;
} else {
    echo '404.php'; // Trang không tồn tại
}
?>