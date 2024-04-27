<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" class="text-decoration-none" style="color: black"
            >Trang chủ</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=product"
            class="text-decoration-none"
            style="color: black"
            >Quản lý sản phẩm</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=product"
            class="text-decoration-none"
            style="color: black"
            >Sản phẩm hiện tại</a
            >
        </li>
        </ol>
    </nav>
    <div>
        <div class="d-flex flex-row align-items-center">
        <button
            type="button"
            class="btn btn-outline-warning"
            onclick="redirectToAddProduct()"
        >
            THÊM SẢN PHẨM MỚI
        </button>
        <button
            type="button"
            class="btn btn-outline-warning ms-3"
            data-bs-toggle="modal"
            data-bs-target="#addCategory"
        >
            THÊM DANH MỤC
        </button>
        </div>
        <div
        class="modal fade"
        id="addCategory"
        tabindex="-1"
        aria-labelledby="addCategoryLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addCategoryLabel">
                Thêm danh mục mới
                </h1>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <form onsubmit="confirmAddCategory(event)">
                <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="idcategory"
                    >Mã danh mục</label
                    >
                    <input
                    class="form-control"
                    id="idcategory"
                    name="idcategory"
                    type="text"
                    value="12"
                    required
                    readonly
                    style="width: 100%"
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="namecategory"
                    >Tên danh mục</label
                    >
                    <input
                    class="form-control"
                    id="namecategory"
                    name="namecategory"
                    type="text"
                    placeholder="Nhập tên danh mục"
                    required
                    style="width: 100%"
                    />
                </div>
                </div>
                <div
                class="modal-footer d-flex flex-row justify-content-center"
                >
                <button
                    type="reset"
                    class="btn btn-outline-warning me-5"
                    style="color: red"
                >
                    HỦY
                </button>
                <button type="submit" class="btn btn-outline-warning ms-5">
                    THÊM DANH MỤC
                </button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="justify-content-center mt-4">
        <div>
            <p class="fs-4 fw-bold">Best Seller</p>
            <div class="row border rounded-4">
            <div
                class="col-lg-3 d-none mt-2 mb-2 d-lg-flex justify-content-center align-items-center"
            >
                <div class="container">
                <img
                    src="https://media1.nguoiduatin.vn/media/nhap-bai-qc/2018/11/09/tocotoco2.png"
                    class="img-fluid"
                    alt="product image"
                />
                </div>
            </div>
            <div
                class="col-12 col-md-7 col-lg-4 d-flex flex-column justify-content-center mt-2 mb-2"
            >
                <div class="d-flex flex-row align-item-center">
                <a
                    class="mb-2 mt-2 text-decoration-none fw-bold"
                    style="color: black"
                    ><span>Trà sữa trân châu hoàng kim</span> -
                    <span>TS1500</span></a
                >
                <div class="dropdown d-lg-none d-flex ms-1">
                    <button
                    type="button"
                    class="dropdown-toggle border-0 bg-transparent"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        fill="#FCC700"
                        class="bi bi-three-dots"
                        viewBox="0 0 16 16"
                    >
                        <path
                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"
                        />
                    </svg>
                    </button>
                    <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="?page=productdetail"
                        >THÔNG TIN</a
                        >
                    </li>

                    <li>
                        <a class="dropdown-item" onclick="hideProduct()"
                        >ẨN</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" onclick="deleteProduct()"
                        >XÓA</a
                        >
                    </li>
                    </ul>
                </div>
                </div>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                ><span>412000</span> đồng -
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="#FFC700"
                    class="bi bi-star-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                    />
                </svg>
                <span>4.7</span>
                </a>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Ngành hàng: <span>Trà sữa, Ăn vặt</span></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Danh mục: <span>Best Seller, Trà sữa</span></a
                >
                <a
                class="mb-2 mt-2 text-decoration-none"
                style="color: #aba9a9"
                >Mô tả</a
                >
            </div>
            <div
                class="col-12 col-md-5 col-lg-3 d-flex flex-column justify-content-center mt-2 mb-2"
            >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Đã bán: <span>200</span></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Số lượng còn lại: <span>200</span></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Số đánh giá: <span>200</span></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Trạng thái: <span>Đang bán</span></a
                >
            </div>
            <div
                class="col-lg-2 d-none d-lg-flex flex-column justify-content-center mt-2 mb-2"
            >
                <button
                type="button"
                class="btn btn-outline-warning border-black mb-2 mt-2"
                onclick="redirectToProductDetail()"
                >
                THÔNG TIN
                </button>
                <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                onclick="hideProduct()"
                >
                ẨN
                </button>
                <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                style="color: red"
                onclick="deleteProduct()"
                >
                XÓA
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- content -->
    <script>
    function redirectToAddProduct() {
        window.location.href = "?page=addproduct";
    }
    function redirectToProductDetail() {
        window.location.href = "?page=productdetail";
    }
    function redirectToProductRate() {
        window.location.href = "./productrate.html";
    }
    function confirmAddCategory(event) {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn thêm danh mục mới 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    function deleteProduct() {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn xóa sản phẩm 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    function hideProduct() {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn ẩn sản phẩm 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    function showProduct() {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn đăng bán lại sản phẩm 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    </script>
</div>