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
                    <button id="fetchOrdersBtn" class="btn btn-primary" style="margin-left: 20px;">Fetch Orders</button>
                </div>
                <div class="ms-5 border border-solid rounded mb-5"
                    style="width: 90%; border-width: 1px; border-radius: 5px;">
                    <div class="container" id="orderListContainer">
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagination">
                        </ul>
                    </nav>
                </div>
            </div>

            <script>
                function fetchOrders(page) {
                    $.ajax({
                        url: '../../controller/seller/fetchOrderPage.php?page=' + page,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            displayOrders(response.orders);
                            generatePagination(response.totalPages);
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Function to display orders for a specific page
                function displayOrders(orders) {
                    const orderListContainer = document.getElementById('orderListContainer');
                    orderListContainer.innerHTML = ''; // Clear previous orders

                    orders.forEach(order => {
                        // Create HTML elements to display each order
                        const orderElement = document.createElement('div');
                        orderElement.classList.add('row'); // Add the 'row' class

                        // Customize the structure and styling as per your requirement
                        orderElement.innerHTML = `
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="d-flex align-items-center ms-2 mt-3">
                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="https://i.mydramalist.com/qY2oK2_5c.jpg">
                    <h5 class="ms-2">${order.userName}</h5>
                </div>
                <div class="mt-2" style="margin-bottom: 20px; max-height: 150px; overflow-y: auto;">
                    <table id="orderTable" class="table">
                        <tbody>`;

                        // Generate rows for each product within the order
                        order.product.forEach(prod => {
                            const productRow = createProductRow(prod);
                            orderElement.querySelector('tbody').appendChild(productRow);
                        });

                        // Close the table body and table element
                        orderElement.innerHTML += `
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
                                <td>${order.statusOrder}</td>
                            </tr>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>${order.idOrder}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Giá trị đơn hàng</td>
                                <td style="font-weight: bold;">${order.total}</td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>${order.note}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="viewDetails('${order.idOrder}')">
                            <i class="fas fa-info-circle"></i> Xem chi tiết
                        </button>
                        ${order.statusOrder == 'Đang giao hàng' ? `
                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="completeOrder('${order.idOrder}')">
                                <i class="fas fa-check-circle"></i> Đã hoàn thành
                            </button>` : ''}
                        ${order.statusOrder != 'Đã hoàn thành' && order.statusOrder != 'Đang giao hàng' ? `
                            <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="prepareOrder('${order.idOrder}')">
                                <i class="fas fa-utensils"></i> Chuẩn bị hàng
                            </button>` : ''}
                    </div>
                </div>
            </div>`;

                        // Append the order element to the container
                        orderListContainer.appendChild(orderElement);
                    });

                    // Log the orders after they've been fully rendered
                    console.log("orders: ", orders);
                }

                // Function to create a row for a product
                function createProductRow(product) {
                    const row = document.createElement('tr');
                    row.innerHTML = `
        <td>${product.quantity}</td>
        <td>${product.proName}</td>
        <td>${product.proPrice}</td>`;
                    return row;
                }


                // Function to generate pagination links
                function generatePagination(totalPages) {
                    const paginationContainer = document.getElementById('pagination');
                    paginationContainer.innerHTML = ''; // Clear previous pagination links

                    for (let i = 1; i <= totalPages; i++) {
                        const pageLink = document.createElement('li');
                        pageLink.className = 'page-item';
                        pageLink.innerHTML = `<a class="page-link" href="#" onclick="fetchOrders(${i})">${i}</a>`;
                        paginationContainer.appendChild(pageLink);
                    }
                }

                // Fetch orders when the page loads
                $(document).ready(function () {
                    fetchOrders(1);
                });
            </script>

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
                                        <a class="ms-2 text-decoration-none fw-bold"
                                            style="color: black;"><?php echo $order['userName']; ?></a>
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light"
                                            style="color: black;" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo $modalId1; ?>">Xem thông tin</a>
                                        <?php if ($order['isReported'] == 0) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red"
                                                onclick="reportUser(<?php echo $order['idAccount']; ?>)">Chặn</a>
                                        <?php }
                                        ?>
                                        <?php if ($order['isReported'] == 1) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red" onclick="unblockUser(<?php echo $order['idAccount']; ?>)">Gỡ
                                                chặn</a>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php
                                    include_once ("../../controller/seller/getUserdetail.php");
                                    $userID = $order['idAccount'];
                                    $userdetail = fetchUserDetail($userID);

                                    ?>
                                    <div class="modal fade" id="<?php echo $modalId1; ?>" tabindex="-1"
                                        aria-labelledby="infoUser" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="infoUser">
                                                        Thông tin khách hàng
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="username">Tên khách hàng</label>
                                                        <input class="form-control" id="username" name="username"
                                                            type="text" value="<?php echo $userdetail['userName'] ?>"
                                                            readonly style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input class="form-control" id="email" name="email" type="text"
                                                            value="<?php echo $userdetail['email']; ?>" readonly
                                                            style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phonenum">Số điện thoại</label>
                                                        <input class="form-control" id="phonenum" name="phonenum"
                                                            type="number" value="<?php echo $userdetail['phone']; ?>"
                                                            readonly style="width: 100%" />
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
                                        <a class="ms-2 text-decoration-none fw-bold"
                                            style="color: black;"><?php echo $order['userName']; ?></a>
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light"
                                            style="color: black;" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo $modalId2; ?>">Xem thông tin</a>
                                        <?php if ($order['isReported'] == 0) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red"
                                                onclick="reportUser(<?php echo $order['idAccount']; ?>)">Chặn</a>
                                        <?php }
                                        ?>
                                        <?php if ($order['isReported'] == 1) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red" onclick="unblockUser(<?php echo $order['idAccount']; ?>)">Gỡ
                                                chặn</a>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php
                                    include_once ("../../controller/seller/getUserdetail.php");
                                    $userID = $order['idAccount'];
                                    $userdetail = fetchUserDetail($userID);

                                    ?>
                                    <div class="modal fade" id="<?php echo $modalId2; ?>" tabindex="-1"
                                        aria-labelledby="infoUser" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="infoUser">
                                                        Thông tin khách hàng
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="username">Tên khách hàng</label>
                                                        <input class="form-control" id="username" name="username"
                                                            type="text" value="<?php echo $userdetail['userName'] ?>"
                                                            readonly style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input class="form-control" id="email" name="email" type="text"
                                                            value="<?php echo $userdetail['email']; ?>" readonly
                                                            style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phonenum">Số điện thoại</label>
                                                        <input class="form-control" id="phonenum" name="phonenum"
                                                            type="number" value="<?php echo $userdetail['phone']; ?>"
                                                            readonly style="width: 100%" />
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
                                        <a class="ms-4 text-decoration-none text-decoration-underline fw-light"
                                            style="color: black;" data-bs-toggle="modal"
                                            data-bs-target="#<?php echo $modalId3; ?>">Xem thông tin</a>
                                        <?php if ($order['isReported'] == 0) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red"
                                                onclick="reportUser(<?php echo $order['idAccount']; ?>)">Chặn</a>
                                        <?php }
                                        ?>
                                        <?php if ($order['isReported'] == 1) { ?>
                                            <a class="text-decoration-none text-decoration-underline fw-light ms-4"
                                                style="color:red" onclick="unblockUser(<?php echo $order['idAccount']; ?>)">Gỡ
                                                chặn</a>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php
                                    include_once ("../../controller/seller/getUserdetail.php");
                                    $userID = $order['idAccount'];
                                    $userdetail = fetchUserDetail($userID);

                                    ?>
                                    <div class="modal fade" id="<?php echo $modalId3; ?>" tabindex="-1"
                                        aria-labelledby="infoUser" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="infoUser">
                                                        Thông tin khách hàng
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="username">Tên khách hàng</label>
                                                        <input class="form-control" id="username" name="username"
                                                            type="text" value="<?php echo $userdetail['userName'] ?>"
                                                            readonly style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input class="form-control" id="email" name="email" type="text"
                                                            value="<?php echo $userdetail['email']; ?>" readonly
                                                            style="width: 100%" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phonenum">Số điện thoại</label>
                                                        <input class="form-control" id="phonenum" name="phonenum"
                                                            type="number" value="<?php echo $userdetail['phone']; ?>"
                                                            readonly style="width: 100%" />
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
        xhttp.onreadystatechange = function () {
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
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Order status changed to completed.");
                window.location.reload();
                // You can handle the response here if needed
            }
        };
        xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=deliveryOrder&orderID=" + orderID, true);
        xhttp.send();
    }


</script>