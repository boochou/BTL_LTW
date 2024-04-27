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
            href="?page=account"
            class="text-decoration-none"
            style="color: black"
            >Marketing</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=account"
            class="text-decoration-none"
            style="color: black"
            >Quản lý tài khoản</a
            >
        </li>
        </ol>
    </nav>
    <div class="d-flex flex-row align-items-center justify-content-center">
        <a
        class="fw-bold fs-4 text-decoration-none align-items-center justify-content-center"
        style="color: black"
        >THÔNG TIN QUÁN</a
        >
    </div>
    <div class="d-flex flex-row align-items-center ms-5">
        <img
        src="/BTL/public/images/logo.png"
        alt="logo unieat"
        width="100"
        height="100"
        />
        <a class="ms-5 text-decoration-none" style="color: black"
        >MTK: <span>1234</span></a
        >
    </div>
    <form class="ms-5 me-5 mt-3" onsubmit="logFormData(event)">
        <div class="mb-3">
        <label class="form-label" for="account">Tên đăng nhập</label>
        <input
            class="form-control"
            id="account"
            name="account"
            type="text"
            value="UniEat"
            placeholder="Nhập tên tài khoản"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="passw">Mật khẩu</label>
        <input
            class="form-control"
            id="passw"
            name="passw"
            type="password"
            value="123"
            placeholder="Nhập mật khẩu"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="nameshop">Tên quán</label>
        <input
            class="form-control"
            id="nameshop"
            name="nameshop"
            type="text"
            value="UniEat"
            placeholder="Nhập tên quán"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="emailcontact">Email liên hệ</label>
        <input
            class="form-control"
            id="emailcontact"
            name="emailcontact"
            type="email"
            placeholder="Nhập mail liên hệ"
            value="xinhdep@gmail.com"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="phonecontact"
            >Số điện thoại liên hệ</label
        >
        <input
            class="form-control"
            id="phonecontact"
            name="phonecontact"
            type="number"
            placeholder="Nhập số điện thoại liên hệ"
            value="113"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="fblink">Liên kết facebook</label>
        <input
            class="form-control"
            id="fblink"
            name="fblink"
            type="text"
            placeholder="Nhập liên kết facebook của quán"
            value="fb.unieat.com"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="instalink">Liên kết instagram</label>
        <input
            class="form-control"
            id="instalink"
            name="instalink"
            type="text"
            placeholder="Nhập liên kết instagram của quán"
            value="ins.unieat.com"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="tiktoklink">Liên kết tiktok</label>
        <input
            class="form-control"
            id="tiktoklink"
            name="tiktoklink"
            type="text"
            placeholder="Nhập liên kết tiktok của quán"
            value="tiktok.unieat.com"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="status">Tình trạng quán</label>
        <select
            class="form-select"
            id="status"
            name="status"
            aria-label="Default select example"
        >
            <option value="1">Mở cửa</option>
            <option value="0">Đóng cửa</option>
        </select>
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
    <script>
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
    <!-- content -->
</div>