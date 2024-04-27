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
            href="?page=infringingproduct"
            class="text-decoration-none"
            style="color: black"
            >Sản phẩm vi phạm</a
            >
        </li>
        </ol>
    </nav>
    <div>
        <div class="justify-content-center mt-4">
        <div class="row border rounded-4">
            <div
            class="col-lg-3 d-none d-md-none d-lg-flex mt-2 mb-2 d-flex justify-content-center align-items-center"
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
            class="col-lg-6 col-md-8 d-flex flex-column justify-content-center mt-2 mb-2"
            >
            <div class="d-flex flex-row">
                <a
                class="mb-2 mt-2 text-decoration-none fw-bold"
                style="color: black"
                ><span>Trà sữa trân châu hoàng kim</span> -
                <span>TS1500</span></a
                >
                <div class="dropdown d-md-none d-flex ms-1">
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
                    <a class="dropdown-item" href="#">LIÊN HỆ XỬ LÝ</a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="?page=productdetail"
                        >SỬA THÔNG TIN</a
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
                >Tình trạng: <span>Đã ẩn</span></a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: red"
                >Lý do vi phạm:
                <span style="color: black"
                >Sản phẩm được báo cáo chứa quá nhiều trân châu có nghi ngờ
                xuất xứ không rõ ràng, cần được kiểm tra trước khi kinh
                doanh trở lại.</span
                ></a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Người báo cáo: <span>ANH</span> - (<span>000111</span>)</a
            >
            </div>
            <div
            class="col-lg-3 col-md-4 d-none d-md-flex d-lg-flex flex-column justify-content-center mt-2 mb-2"
            >
            <button
                type="button"
                class="btn btn-outline-warning border-black mb-2 mt-2"
            >
                LIÊN HỆ XỬ LÝ
            </button>
            <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                onclick="redirectToProductDetail()"
            >
                SỬA THÔNG TIN
            </button>
            <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                style="color: red"
                onclick="deleteProduct()"
            >
                XÓA SẢN PHẨM
            </button>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- content -->
    <script>
    function redirectToProductDetail() {
        window.location.href = "?page=productdetail";
    }
    function deleteProduct() {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn xóa sản phẩm 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    </script>
</div>