<div class="row">
  <div class="col" style="max-width: 20%; display: flex; align-items: center">
    <button style="background: white; border: 0px" onclick="sidebar_open()">
      <img
        src="/BTL/public/images/Vector.png"
        style="padding-left: 7px; height: 20px"
        alt=""
      />
    </button>
    <h3 class="uni-header" style="margin-top: 0px"><strong>UniEat</strong></h3>
  </div>
  <div class="col" style="display: flex; align-items: center">
    <div class="address-note">
      <div class="linkStyleColor" style="display: inline">Giao đến</div>
      <span
        class="iconify"
        data-icon="ri:map-pin-2-fill"
        style="color: red"
      ></span>
      KTX Khu A
    </div>
    <div class="search-food">
      <input
        type="text"
        id="food-place"
        name="food-place"
        placeholder="Tìm kiếm quán ăn/món ăn"
        style="
          min-width: 250px;
          border-radius: 20px;
          padding-left: 10px;
          padding-right: 10px;
        "
      />
    </div>
    <div class="search-icon">
      <span
        class="iconify"
        data-icon="material-symbols:search"
        style="color: #ffc700; width: 30px; height: 30px"
      ></span>
    </div>
  </div>
  <div class="col icon-header icon-nav">
    <span
      class="iconify"
      data-icon="f7:bell-fill"
      style="color: #ffc700; width: 30px; height: 30px"
    ></span>
    <div class="market-icon">
      <button
        style="background: white; border: 0px"
        data-bs-toggle="modal"
        data-bs-target="#market"
      >
        <span
          class="iconify"
          data-icon="map:grocery-or-supermarket"
          style="color: #ffc700; width: 30px; height: 30px"
        ></span>
        <div class="circle-number">1</div>
      </button>
    </div>
  </div>
</div>
<div class="modal" id="market">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding-left: 30px; padding-right: 30px">
      <!-- Modal body -->
      <div class="modal-body">
        <div style="text-align: center; margin-top: 10px">
          <h4><strong>TRÀ SỮA TOCOTOCO</strong></h4>
          <div class="linkStyleColor">
            Thời gian giao: 15 phút (Cách bạn 0,8 km)
          </div>
        </div>
        <hr />
        <div
          class="address-note"
          style="
            height: 40px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
          "
        >
          <div class="linkStyleColor" style="display: inline">Giao đến</div>
          <span
            class="iconify"
            data-icon="ri:map-pin-2-fill"
            style="color: red; margin-left: 10px; margin-right: 10px"
          ></span>
          KTX Khu A
        </div>
        <h5><strong>Tóm tắt đơn hàng</strong></h5>
        <div
          class="container container-border-modal"
          style="padding-top: 20px; padding-bottom: 20px"
        >
          <div class="row" style="display: flex; align-items: center">
            <div class="col number-food">
              <button
                class="minus-button"
                style="border: none; background: white; padding: 0"
                onclick="decrease_number(0)"
              >
                <span
                  class="iconify"
                  data-icon="mdi:minus-box-outline"
                  style="color: #ffc700; height: 30px; width: 30px"
                ></span>
              </button>
              <div style="text-align: center; width: 30px">
                <strong
                  class="number-order"
                  style="margin-left: 10px; margin-right: 10px"
                  >1</strong
                >
              </div>
              <button
                class="plus-button"
                style="border: none; background: white; padding: 0"
                onclick="increase_number(0)"
              >
                <span
                  class="iconify"
                  data-icon="mdi:plus-box-outline"
                  style="color: #ffc700; height: 30px; width: 30px"
                ></span>
              </button>
            </div>
            <div class="col form-food">
              <img src="/BTL/public/images/Rectangle 21.png" alt="" />
              <div style="margin-left: 20px">
                <div>
                  <strong>Trà sữa ba anh em</strong>
                </div>
                <div class="note-style">Bỏ ít đá dùm em</div>
              </div>
            </div>
            <div class="col price-food">36.800</div>
          </div>
        </div>
        <div
          class="container container-border-modal"
          style="padding-top: 20px; padding-bottom: 20px"
        >
          <div class="row" style="display: flex; align-items: center">
            <div class="col number-food">
              <span
                class="iconify"
                data-icon="mdi:minus-box-outline"
                style="color: #ffc700; height: 30px; width: 30px"
              ></span>
              <strong style="margin-left: 10px; margin-right: 10px">1</strong>
              <span
                class="iconify"
                data-icon="mdi:plus-box-outline"
                style="color: #ffc700; height: 30px; width: 30px"
              ></span>
            </div>
            <div class="col form-food">
              <img src="/BTL/public/images/Rectangle 21.png" alt="" />
              <div style="margin-left: 20px">
                <div>
                  <strong>Trà sữa ba anh em</strong>
                </div>
                <div class="note-style">Bỏ ít đá dùm em</div>
              </div>
            </div>
            <div class="col price-food">36.800</div>
          </div>
        </div>
        <div
          class="container container-border-modal"
          style="padding-top: 20px; padding-bottom: 20px"
        >
          <div class="row" style="display: flex; align-items: center">
            <div class="col number-food">
              <span
                class="iconify"
                data-icon="mdi:minus-box-outline"
                style="color: #ffc700; height: 30px; width: 30px"
              ></span>
              <strong style="margin-left: 10px; margin-right: 10px">1</strong>
              <span
                class="iconify"
                data-icon="mdi:plus-box-outline"
                style="color: #ffc700; height: 30px; width: 30px"
              ></span>
            </div>
            <div class="col form-food">
              <img src="/BTL/public/images/Rectangle 21.png" alt="" />
              <div style="margin-left: 20px">
                <div>
                  <strong>Trà sữa ba anh em</strong>
                </div>
                <div class="note-style">Bỏ ít đá dùm em</div>
              </div>
            </div>
            <div class="col price-food">36.800</div>
          </div>
        </div>
        <div class="row">
          <div class="col">Tổng tạm tính</div>
          <div class="col" style="text-align: right">
            110.400 <u style="padding-left: 3px">đ</u>
          </div>
        </div>
        <div class="row">
          <div class="col">Phí áp dụng</div>
          <div class="col" style="text-align: right">
            5.000 <u style="padding-left: 3px">đ</u>
          </div>
        </div>
        <div style="margin-top: 20px">
          <h5><strong>Thông tin hóa đơn</strong></h5>
        </div>
        <div
          class="container container-border-modal"
          style="padding-top: 20px; padding-bottom: 20px"
        >
          <div class="linkStyleColor">Phương thức thanh toán</div>
          <select class="form-select" style="border-radius: 20px">
            <!-- <option selected>Open this select menu</option> -->
            <option value="1">Tiền mặt</option>
            <option value="2">Chuyển khoản</option>
          </select>
          <div class="linkStyleColor">Khuyến mãi</div>
          <select class="form-select" style="border-radius: 20px">
            <!-- <option selected>Open this select menu</option> -->
            <option value="1">Áp dụng ưu đãi để được giảm giá</option>
            <option value="2">Không có</option>
          </select>
        </div>
        <div
          class="container container-border-modal"
          style="padding-top: 20px; padding-bottom: 10px; margin-bottom: 20px"
        >
          <div class="row" style="margin-bottom: 10px">
            <div class="col">
              <h5>TỔNG CỘNG</h5>
            </div>
            <div class="col" style="text-align: right">
              <h5>115.400 <u style="padding-left: 3px">đ</u></h5>
            </div>
          </div>
          <button
            type="button"
            class="btn"
            style="background: #ffc700; width: 100%; border-radius: 20px"
            data-bs-dismiss="modal"
          >
            Đặt đơn
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blur" id="blur-sidebar" onclick="sidebar_close()"></div>
<div class="sidebar" id="mySidebar">
  <div
    class="modal-body"
    style="
      padding-left: 35px;
      padding-right: 35px;
      margin-top: 20px;
      height: 100vh;
    "
  >
    <div style="display: flex">
      <div style="display: flex; align-items: center">
        <img
          src="/BTL/public/images/Avatar-Profile-PNG-Photos 1.png"
          alt=""
          style="height: 55px; width: 55px"
        />
      </div>
      <div style="margin-left: 40px; display: flex; align-items: center">
        <div>
          <div>
            <h5><strong>Anh</strong></h5>
          </div>
          <div>
            <a href="?page=user_info" class="linkStyleColor" style="font-size: small"
              >Quản lý tài khoản</a
            >
          </div>
        </div>
      </div>
    </div>
    <hr />
    <div class="container container-border-modal">
      <div style="display: flex; justify-content: center">
        <div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="material-symbols:star"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="?page=wish_list"
                style="text-decoration: none; color: black; font-size: small"
                >Yêu thích</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="mingcute:bill-fill"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="?page=orders"
                style="text-decoration: none; color: black; font-size: small"
                >Đơn hàng</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="tdesign:discount-filled"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="#"
                style="text-decoration: none; color: black; font-size: small"
                >Khuyến mãi</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="gg:support"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="#"
                style="text-decoration: none; color: black; font-size: small"
                >Hỗ trợ</a
              >
            </div>
          </div>
          <div
            style="
              text-align: center;
              margin-top: 10px;
              font-size: small;
              margin-bottom: 10px;
            "
          >
            <a href="#" style="color: #ff0000">
              <strong>Sign Out</strong>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div style="text-align: center; margin-top: 20px; font-size: small">
      <a href="?page=homepage" class="linkStyleColor">
        <strong>Trang chủ</strong>
      </a>
    </div>
    <div style="text-align: center; font-size: small">
      <a href="?page=community" class="linkStyleColor">
        <strong>Cộng đồng</strong>
      </a>
    </div>
    <div class="icon-sidebar" style="justify-content: center; margin-top: 20px">
      <div style="display: flex">
        <span
          class="iconify"
          data-icon="f7:bell-fill"
          style="color: #ffc700; width: 30px; height: 30px"
        ></span>
        <div style="position: relative; margin-left: 20px">
          <button
            style="background: white; border: 0px"
            data-bs-toggle="modal"
            data-bs-target="#market"
          >
            <span
              class="iconify"
              data-icon="map:grocery-or-supermarket"
              style="color: #ffc700; width: 30px; height: 30px"
            ></span>
            <div class="circle-number">1</div>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
