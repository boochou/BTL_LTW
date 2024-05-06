<?php
require_once 'model/user/Homepage.php';
require_once 'model/user/Mainpage.php';
require_once 'model/user/Orders.php';
require_once 'model/user/Orderdetail.php';
require_once 'model/user/Community.php';
require_once 'model/user/Header.php';

class UserController {
    public $orderIdForPage;

    function __construct($orderIdForPage) {
        $this->orderIdForPage = $orderIdForPage;
    }

    public function homepage() {
        $products = Homepage::getAllProducts();
        $categories = Homepage::getAllCategories();
        $product_in_cart = Header::getProductInCart();

        ob_start();
        require_once 'views/user/homepage.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function mainpage() {
        $products = Mainpage::getAllProducts();
        $categories = Mainpage::getAllCategories();
        $product_in_cart = Header::getProductInCart();

        $pro_in_cat = [];
        for ($i = 1; $i <= count($categories); $i ++) {
            $pro_in_cat[$i] = [];
        }
        for ($i = 0; $i < count($products); $i ++) {
            $pro_in_cat[$products[$i]["idCategory"]][] = $products[$i];
        }
        $products_id = [];
        for ($i = 0; $i < count($products); $i ++) {
            $products_id[$products[$i]["id"]] = $products[$i];
        }
        ob_start();
        require_once 'views/user/mainpage.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function orders() {
        $product_in_cart = Header::getProductInCart();
        $orders = Orders::getAllOrders();
        
        ob_start();
        require_once 'views/user/orders.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function orderdetail() {
        $product_in_cart = Header::getProductInCart();
        $orderIdForPage = $this->orderIdForPage;
        $orderUse = Orderdetail::getOrdersById($orderIdForPage);
        $product_in_order = Orderdetail::getAllProductsByOrderId($orderIdForPage);
        $products = [];
        for ($i = 0; $i < count($product_in_order); $i ++) {
            $products[] = Orderdetail::getProductById($product_in_order[$i]["idProduct"]);
        }

        ob_start();
        require_once 'views/user/orderdetail.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function community() {
        $product_in_cart = Header::getProductInCart();
        $blogs = Community::getAllBlogs();
        $accounts = Community::getAllAccounts();
        $comments = Community::getAllComments();
        $commentsId = [];
        for ($i = 0; $i < count($blogs); $i ++) {
            $commentsId[$blogs[$i]["id"]] = [];
        }
        for ($i = 0; $i < count($comments); $i ++) {
            $commentsId[$comments[$i]["idBlog"]][] = $comments[$i];
        }

        ob_start();
        require_once 'views/user/community.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
}
?>
