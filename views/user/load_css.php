<?php
// Xác định trang được yêu cầu từ tham số truyền vào
$page = $_GET['page'] ?? 'homepage';

$css_files = [
    'homepage' => '/BTL/public/css/styles_homepage.css',
    'user_info' => '/BTL/public/css/styles_userInfor.css',
    'wish_list' => '/BTL/public/css/styles_wishList.css',
    'orders' => '/BTL/public/css/styles_orders.css',
    'community' => '/BTL/public/css/styles_community.css'
];

$page_css = $css_files[$page];
?>

<link rel="stylesheet" href="<?php echo $page_css; ?>">