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
                        foreach ($orderList as $index => $order) {
                            $modalId = 'detailUser_' . $index;
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex flex-row align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
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
                        
                        foreach ($orderList as $index => $order) {
                            $modalId1 = 'detailUser1_' . $index;
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                                            <a class="ms-2 text-decoration-none fw-bold" style="color: black;"><?php echo $order['userName']; ?></a>
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light" style="color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId1; ?>">Xem thông tin</a>
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
                                    <div class="modal fade" id="<?php echo $modalId1; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
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
                        foreach ($orderList as $index => $order) {
                            $modalId2 = 'detailUser2_' . $index;
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                                            <a class="ms-2 text-decoration-none fw-bold" style="color: black;"><?php echo $order['userName']; ?></a>
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light" style="color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId2; ?>">Xem thông tin</a>
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
                                    <div class="modal fade" id="<?php echo $modalId2; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
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
                        foreach ($orderList as $index => $order) {
                            $modalId3 = 'detailUser3_' . $index;
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="d-flex align-items-center ms-2 mt-3"><img
                                            class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                            src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                                            <a class="ms-4 text-decoration-none text-decoration-underline fw-light" style="color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId3; ?>">Xem thông tin</a>
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
                                    <div class="modal fade" id="<?php echo $modalId3; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
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

function prepareOrder(orderID) {
    // Your code to handle preparing the order here
    console.log("Preparing order...", orderID);
    
    // Make an AJAX request to call the PHP function
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Order status changed to preparing.");
            window.location.reload();
            // You can handle the response here if needed
        }
    };
    xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=prepareOrder&orderID=" + orderID, true);
    xhttp.send();
}

function completeOrder(orderID) {
    // Your code to handle completing the order here
    console.log("Completing order...", orderID);
    
    // Make an AJAX request to call the PHP function
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Order status changed to completed.");
            window.location.reload();
            // You can handle the response here if needed
        }
    };
    xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=deliveryOrder&orderID=" + orderID, true);
    xhttp.send();
}
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