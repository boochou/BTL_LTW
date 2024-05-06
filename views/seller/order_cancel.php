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
                foreach ($orderList as $index => $order) {
                    $modalId = 'detailUser_' . $index;
                    ?>
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="d-flex align-items-center ms-2 mt-3"><img
                                    class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                    src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                    <a class="ms-2 text-decoration-none fw-bold" style="color: black;"><?php echo $order['userName']; ?></a>
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light" style="color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">Xem thông tin</a>
                                        <?php if ($order['isReported'] == 0) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4" style="color:red" onclick="reportUser(<?php echo $order['idAccount']; ?>)">Chặn</a>
                                            <?php } 
                                        ?>
                                        <?php if ($order['isReported'] == 1) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4" style="color:red" onclick="unblockUser(<?php echo $order['idAccount']; ?>)">Gỡ chặn</a>
                                            <?php } 
                                        ?>
                            </div>
                            <?php
                                        include_once("../../controller/seller/getUserdetail.php");
                                        $userID = $order['idAccount'];
                                        $userdetail = fetchUserDetail($userID);
                                        
                                    ?>
                                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="infoUser">
                                                    Thông tin khách hàng
                                                    </h1>
                                                    <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                    ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="username"
                                                        >Tên khách hàng</label
                                                        >
                                                        <input
                                                        class="form-control"
                                                        id="username"
                                                        name="username"
                                                        type="text"
                                                        value="<?php echo $userdetail['userName']?>"
                                                        readonly
                                                        style="width: 100%"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email"
                                                        >Email</label
                                                        >
                                                        <input
                                                        class="form-control"
                                                        id="email"
                                                        name="email"
                                                        type="text"
                                                        value="<?php echo $userdetail['email']; ?>"
                                                        readonly
                                                        style="width: 100%"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phonenum"
                                                        >Số điện thoại</label
                                                        >
                                                        <input
                                                        class="form-control"
                                                        id="phonenum"
                                                        name="phonenum"
                                                        type="number"
                                                        value="<?php echo $userdetail['phone']; ?>"
                                                        readonly
                                                        style="width: 100%"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    function reportUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/reportUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=order";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
        function unblockUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận gỡ chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/unblockUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=order";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
</script>