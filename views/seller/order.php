<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black;font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black;font-size: large">Quản lý đơn hàng</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black;font-size: large">Tất cả đơn hàng</a></li>
        </ol>
    </nav>
    <div class="ms-5">
        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button"
                    role="tab" aria-controls="paid" aria-selected="true">Tất cả đơn hàng</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notpaid-tab" data-bs-toggle="tab" data-bs-target="#notpaid" type="button"
                    role="tab" aria-controls="notpaid" aria-selected="false">Chờ chuẩn bị</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button"
                    role="tab" aria-controls="delivery" aria-selected="true">Đang giao hàng</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="done-tab" data-bs-toggle="tab" data-bs-target="#done" type="button"
                    role="tab" aria-controls="done" aria-selected="true">Đã hoàn thành</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDatePaid" style="margin-right: 10px;">Start date</label>
                    <input id="startDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDatePaid" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDatePaid" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersBtn" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrders()">Fetch Orders</button>

                </div>
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div class="container">
                        <?php
                        include_once ("../../controller/seller/fetchOrder.php");
                        $orderList = fetchListOrder();
                        foreach ($orderList as $order) {
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                        <h5 class="ms-2"><?php echo $order['userName']; ?></h5>
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
                                                    <td><?php echo $order['statusOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mã đơn hàng</td>
                                                    <td><?php echo $order['idOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                                    <td style="font-weight: bold;"><?php echo $order['total']; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td><?php echo $order['note']; ?></td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                onclick="viewDetails('<?php echo $order['idOrder']; ?>')">
                                                <i class="fas fa-info-circle"></i> Xem chi tiết
                                            </button>
                                            <?php if ($order['statusOrder'] == 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="completeOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-check-circle"></i> Đã hoàn thành
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($order['statusOrder'] != 'Đã hoàn thành' && $order['statusOrder'] != 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="prepareOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-utensils"></i> Chuẩn bị hàng
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDate" style="margin-right: 10px;">Start date</label>
                    <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersNotPaid" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrdersNotPaid()">Fetch Orders</button>
                </div>
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div class="container">
                        <?php
                        include_once ("../../controller/seller/fetchOrderDone.php");
                        $orderList = fetchListOrderDone();
                        foreach ($orderList as $order) {
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                        <h5 class="ms-2"><?php echo $order['userName']; ?></h5>
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
                                                    <td><?php echo $order['statusOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mã đơn hàng</td>
                                                    <td><?php echo $order['idOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                                    <td style="font-weight: bold;"><?php echo $order['total']; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td><?php echo $order['note']; ?></td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                onclick="viewDetails('<?php echo $order['idOrder']; ?>')">
                                                <i class="fas fa-info-circle"></i> Xem chi tiết
                                            </button>
                                            <?php if ($order['statusOrder'] == 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="completeOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-check-circle"></i> Đã hoàn thành
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($order['statusOrder'] != 'Đã hoàn thành' && $order['statusOrder'] != 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="prepareOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-utensils"></i> Chuẩn bị hàng
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="notpaid" role="tabpanel" aria-labelledby="notpaid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDate" style="margin-right: 10px;">Start date</label>
                    <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersNotPaid" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrdersNotPaid()">Fetch Orders</button>
                </div>
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div class="container">
                        <?php
                        include_once ("../../controller/seller/fetchOrderPrepare.php");
                        $orderList = fetchListOrderPrepare();
                        foreach ($orderList as $order) {
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                        <h5 class="ms-2"><?php echo $order['userName']; ?></h5>
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
                                                    <td><?php echo $order['statusOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mã đơn hàng</td>
                                                    <td><?php echo $order['idOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                                    <td style="font-weight: bold;"><?php echo $order['total']; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td><?php echo $order['note']; ?></td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                onclick="viewDetails('<?php echo $order['idOrder']; ?>')">
                                                <i class="fas fa-info-circle"></i> Xem chi tiết
                                            </button>
                                            <?php if ($order['statusOrder'] == 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="completeOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-check-circle"></i> Đã hoàn thành
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($order['statusOrder'] != 'Đã hoàn thành' && $order['statusOrder'] != 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="prepareOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-utensils"></i> Chuẩn bị hàng
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDate" style="margin-right: 10px;">Start date</label>
                    <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                    <button id="fetchOrdersNotPaid" class="btn btn-primary" style="margin-left: 20px;"
                        onclick="fetchOrdersNotPaid()">Fetch Orders</button>
                </div>
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div class="container">
                        <?php
                        include_once ("../../controller/seller/fetchOrderDelivery.php");
                        $orderList = fetchListOrderDelivery();
                        foreach ($orderList as $order) {
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                                        <h5 class="ms-2"><?php echo $order['userName']; ?></h5>
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
                                                    <td><?php echo $order['statusOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mã đơn hàng</td>
                                                    <td><?php echo $order['idOrder']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                                    <td style="font-weight: bold;"><?php echo $order['total']; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td><?php echo $order['note']; ?></td>

                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                onclick="viewDetails('<?php echo $order['idOrder']; ?>')">
                                                <i class="fas fa-info-circle"></i> Xem chi tiết
                                            </button>
                                            <?php if ($order['statusOrder'] == 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="completeOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-check-circle"></i> Đã hoàn thành
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($order['statusOrder'] != 'Đã hoàn thành' && $order['statusOrder'] != 'Đang giao hàng'): ?>
                                                <button class="btn mt-2 mb-2" style="background-color: #FFC700;"
                                                    onclick="prepareOrder('<?php echo $order['idOrder']; ?>')">
                                                    <i class="fas fa-utensils"></i> Chuẩn bị hàng
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<script>
    function viewDetails(orderID) {
    // Your code to handle viewing details here
    // You can use the orderID parameter to identify the order
    // For example, you can make an AJAX request to fetch more details about the order
    console.log("Viewing details of order with ID:", orderID);
}

function completeOrder(orderID) {
    // Your code to handle completing the order here
    console.log("Completing order...", orderID);
}

function prepareOrder(orderID) {
    // Your code to handle preparing the order here
    console.log("Preparing order...", orderID);
}

</script>