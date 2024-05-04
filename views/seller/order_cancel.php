<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black; font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Quản lý đơn hàng</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Đơn hàng bị hủy</a></li>
        </ol>
    </nav>
    <div class="ms-5 border border-solid rounded mb-5" style="width: 90%;border-width: 1px; border-radius: 5px;">
        <div class="container">
            <?php
            include_once ("../../controller/seller/fetchCancelOrder.php");
            $orderList = fetchListCancelOrder();
            if (empty($orderList)) {
                echo '<div class="alert alert-warning" role="alert">Không có đơn đã hủy</div>';
            } else {
                foreach ($orderList as $order) {
                    ?>
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="d-flex align-items-center ms-2 mt-3"><img
                                    class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                    src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                <h5 class="ms-2">Anh</h5>
                            </div>
                            <div class="mt-2" style="margin-bottom: 20px; max-height: 150px; overflow-y: auto;">
                                <table id="orderTable" class="table">
                                    <tbody>
                                        <?php
                                        include_once ("../../controller/seller/getProdctinOrder.php");
                                        $orderID = $order['idOrder'];
                                        $productList = fetchProductInOrder($orderID);
                                        foreach ($productList as $product) {
                                            ?>
                                            <tr>
                                                <td><?php echo $product['quantity']; ?></td>
                                                <td><?php echo $product['name']; ?></td>
                                                <td><?php echo $product['price']; ?></td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <!-- Content for the second column -->
                            <div class="mt-5">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Tình trạng</td>
                                            <td style="color: red; font-weight: bold;">Đã bị hủy</td>
                                        </tr>
                                        <tr>
                                            <td>Mã đơn hàng</td>
                                            <td><?php echo $order['idOrder']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                            <td style="font-weight: bold;"><?php echo $order['total']; ?></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button class="btn mt-2 mb-2" style="background-color: #FFC700;">
                                        <i class="fas fa-info-circle"></i> Xem chi tiết
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>
<script>
    // Get the table element
    var table = document.getElementById("orderTable");
    var sum = 0;

    // Loop through all the rows in the table
    for (var i = 0; i < table.rows.length; i++) {
        // Get the price from the third cell (index 2) of each row
        var priceText = table.rows[i].cells[2].textContent; // Get the text content of the cell
        // Extract the numeric part of the price (remove 'đ' and convert to number)
        var price = parseFloat(priceText.replace("đ", "").replace(",", ""));
        // Add the price to the sum
        sum += price;
    }
    // Display the sum
    // Display the sum
    var totalPriceCell = document.getElementById("totalPrice");
    totalPriceCell.textContent = sum.toLocaleString("vi-VN") + "đ";
</script>