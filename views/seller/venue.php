<div class="col align-items-center justify-content-center mt-3 me-3" style="margin-bottom: 50px">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black;font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Tài chính</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Doanh thu</a></li>
        </ol>
    </nav>
    <div class="ms-5 border border-solid rounded mb-5"
        style="width: 90%;border-width: 1px; border-radius: 5px;">
        <h4 class="ms-5 mt-3">Tổng quan</h4>
        <h5 class="ms-5 mt-3" style="color: green;">Đã thanh toán</h5>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="text-center">
                        <p>Hôm nay</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">50 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tuần này</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">20 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tháng này</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">15 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tổng cộng</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">85 000đ</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr hr-blurry" />
        <h5 class="ms-5 mt-3" style="color: red;">Chưa thanh toán</h5>
        <div class="container mb-2">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="text-center">
                        <p>Hôm nay</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">50 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tuần này</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">20 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tháng này</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">15 000đ</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-center">
                        <p>Tổng cộng</p>
                        <h5 class="d-inline" style="color: #3E8BFF; font-weight: bold;">85 000đ</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid"
                    type="button" role="tab" aria-controls="paid" aria-selected="true">Đã thanh toán</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notpaid-tab" data-bs-toggle="tab" data-bs-target="#notpaid"
                    type="button" role="tab" aria-controls="notpaid" aria-selected="false">Chưa thanh
                    toán</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDate" style="margin-right: 10px;">Start date</label>
                    <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                </div>
                <div class="ms-5 border border-solid rounded"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div style="overflow-y: auto; max-height: 300px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12345</td>
                                    <td>Đang xử lý</td>
                                    <td>Thanh toán khi nhận hàng</td>
                                    <td>250.000đ</td>
                                </tr>
                                <tr>
                                    <td>54321</td>
                                    <td>Đã giao hàng</td>
                                    <td>Thanh toán bằng thẻ</td>
                                    <td>150.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="notpaid" role="tabpanel" aria-labelledby="notpaid-tab">
                <div class="d-flex mt-3 mb-3">
                    <label for="startDate" style="margin-right: 10px;">Start date</label>
                    <input id="startDate" class="form-control" type="date" style="width: 150px;" />
                    <label for="endDate" style="margin-left: 20px; margin-right: 10px;">End date</label>
                    <input id="endDate" class="form-control" type="date" style="width: 150px;" />
                </div>
                <div class="ms-5 border border-solid rounded"
                    style="width: 90%;border-width: 1px; border-radius: 5px;">
                    <div style="overflow-y: auto; max-height: 300px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12345</td>
                                    <td>Đang xử lý</td>
                                    <td>Thanh toán khi nhận hàng</td>
                                    <td>250.000đ</td>
                                </tr>
                                <tr>
                                    <td>54321</td>
                                    <td>Đã giao hàng</td>
                                    <td>Thanh toán bằng thẻ</td>
                                    <td>150.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>