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
            href="?page=productdetail"
            class="text-decoration-none"
            style="color: black"
            >Chi tiết sản phẩm</a
            >
        </li>
        </ol>
    </nav>
    <form class="ms-5 me-5" onsubmit="logFormData(event)">
        <div class="mb-3">
        <label class="form-label" for="idsp">Mã sản phẩm</label>
        <input
            class="form-control"
            id="idsp"
            name="idsp"
            type="text"
            value="TS1005"
            readonly
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="tensp">Tên sản phẩm</label>
        <input
            class="form-control"
            id="tensp"
            name="tensp"
            type="text"
            value="Trà sữa trân châu đường đen"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="industry">Ngành hàng</label>
        <select
            class="form-select"
            id="industry"
            name="industry"
            aria-label="Default select example"
        >
            <option value="Thức uống">Thức uống</option>
            <option value="Cơm-Bún-Cháo">Cơm-Bún-Cháo</option>
            <option value="Bánh mì">Bánh mì</option>
        </select>
        </div>
        <div class="mb-3">
        <label class="form-label" for="category">Danh mục</label>
        <select
            class="form-select"
            id="category"
            name="category"
            aria-label="Default select example"
        >
            <option value="Best Seller">Best Seller</option>
            <option value="Trà sữa">Trà sữa</option>
            <option value="Sữa tươi">Sữa tươi</option>
        </select>
        </div>
        <div class="mb-3">
        <label class="form-label" for="price">Giá sản phẩm</label>
        <input
            class="form-control"
            id="price"
            name="price"
            type="number"
            value="412000"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="soluong">Số lượng còn lại</label>
        <input
            class="form-control"
            id="soluong"
            name="soluong"
            value="50"
            type="number"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="status">Tình trạng sản phẩm</label>
        <select
            class="form-select"
            id="status"
            name="status"
            aria-label="Default select example"
        >
            <option value="1">Đang bán</option>
            <option value="0">Ẩn</option>
        </select>
        </div>
        <div class="mb-3">
        <label class="form-label" for="ship">Phương thức vận chuyển</label>
        <input
            class="form-control"
            id="ship"
            name="ship"
            value="Cửa hàng tự vận chuyển"
            type="text"
            required
            readonly
            style="width: 100%"
            aria-describedby="shiphelp"
        />
        <div id="shiphelp" class="form-text">
            Hiện tại chỉ hỗ trợ phương thức này
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label" for="description">Mô tả</label>
        <textarea
            class="form-control"
            id="description"
            name="description"
            placeholder="Nhập mô tả cho sản phẩm"
            required
            style="width: 100%"
            rows="5"
        ></textarea>
        </div>
        <div class="mb-5">
        <label class="form-label" for="image"
            >Hình ảnh minh họa sản phẩm</label
        >
        <input
            class="form-control"
            type="file"
            id="image"
            required
            onchange="previewImage(event)"
        />
        <div id="image-preview" class="mt-2"></div>
        </div>
        <div class="mb-5 d-flex flex-row justify-content-center">
        <button
            type="reset"
            class="btn btn-outline-warning me-5"
            style="color: red"
        >
            HỦY
        </button>
        <button type="submit" class="btn btn-outline-warning ms-5">
            LƯU THAY ĐỔI
        </button>
        </div>
    </form>
    </div>
    <!-- content -->
    <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById("image-preview");

        if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.classList.add("img-fluid");
            preview.innerHTML = "";
            preview.appendChild(img);
        };

        reader.readAsDataURL(input.files[0]);
        } else {
        preview.innerHTML = "";
        }
    }
    function logFormData(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        var confirmation = confirm("Lưu thay đổi?");
        if (confirmation) {
        for (let pair of formData.entries()) {
            console.log(pair[0] + ": " + pair[1]);
        }
        console.log("Form data will be sent to the server...");
        }
    }
    </script>
</div>