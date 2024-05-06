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
      <span
        class="iconify"
        data-icon="fluent-emoji-high-contrast:telephone"
        style="color: red"
      ></span>
      <div style="display: inline; padding-left: 3px">Hotline: 0123456789</div>
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
        <?php
        if (count($product_in_cart) > 0) {
          echo '<div class="circle-number">';
          echo count($product_in_cart);
          echo '</div>';
        }
        ?>
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
          <h3><strong>Giỏ hàng UniEat</strong></h3>
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
          <span
            class="iconify"
            data-icon="fluent-emoji-high-contrast:telephone"
            style="color: red"
          ></span>
          <div style="display: inline; padding-left: 3px">Hotline: 0123456789</div>
        </div>
        <h5><strong>Tóm tắt đơn hàng</strong></h5>
        <?php
          if (count($product_in_cart) > 0) {
            echo '<form id="cart-form">';
            $size = count($product_in_cart);
            for ($i = 0; $i < $size; $i ++) {
              $product = Header::getProductById($product_in_cart[$i]["idProduct"]);
              echo '<input type="hidden" name="product_ids[]" value="' . $product_in_cart[$i]["id"] . '">';
              echo '<div';
              echo '  class="container container-border-modal"';
              echo '  style="padding-top: 20px; padding-bottom: 20px"';
              echo '>';
              echo '  <div class="row" style="display: flex; align-items: center">';
              echo '    <div class="col number-food">';
              echo '      <button';
              echo '        type="button"';
              echo '        class="minus-button"';
              echo '        style="border: none; background: white; padding: 0"';
              echo '        onclick="decrease_number(' . $i . ')"';
              echo '      >';
              echo '        <span';
              echo '          class="iconify"';
              echo '          data-icon="mdi:minus-box-outline"';
              echo '          style="color: #ffc700; height: 30px; width: 30px"';
              echo '        ></span>';
              echo '      </button>';
              echo '      <div style="text-align: center; width: 30px">';
              echo '        <strong';
              echo '          class="number-order"';
              echo '          style="margin-left: 10px; margin-right: 10px"';
              echo '          >' . $product_in_cart[$i]["quantity"] . '</strong';
              echo '        >';
              echo '        <input type="hidden" class="numberofitem" name="quantity[]" value="' . $product_in_cart[$i]["quantity"] . '">';
              echo '      </div>';
              echo '      <button';
              echo '        type="button"';
              echo '        class="plus-button"';
              echo '        style="border: none; background: white; padding: 0"';
              echo '        onclick="increase_number(' . $i . ')"';
              echo '      >';
              echo '        <span';
              echo '          class="iconify"';
              echo '          data-icon="mdi:plus-box-outline"';
              echo '          style="color: #ffc700; height: 30px; width: 30px"';
              echo '        ></span>';
              echo '      </button>';
              echo '    </div>';
              echo '    <div class="col form-food">';
              echo '      <img src="' . $product["image"] . '" alt="" style="height: 75px; width: 75px" />';
              echo '      <div style="margin-left: 20px">';
              echo '        <div>';
              echo '          <strong>' . $product["name"] . '</strong>';
              echo '        </div>';
              echo '        <div class="note-style">' . $product_in_cart[$i]["note"] . '</div>';
              echo '      </div>';
              echo '    </div>';
              echo '    <div class="col price-food">' .$product["price"] . 'đ/món</div>';
              echo '  </div>';
              echo '</div>';
            }
            echo '    <h5><strong>Thông tin hóa đơn</strong></h5>';
            echo '</div>';
            echo '<div class="container container-border-modal" style="padding-top: 20px; padding-bottom: 20px">';
            echo '    <div class="linkStyleColor">Phương thức thanh toán</div>';
            echo '    <select class="form-select" style="border-radius: 20px" name="payment">';
            echo '        <!-- <option selected>Open this select menu</option> -->';
            echo '        <option value="1">Tiền mặt</option>';
            echo '        <option value="2">Chuyển khoản</option>';
            echo '    </select>';
            echo '    <div class="linkStyleColor">Vị trí</div>';
            echo '    <select class="form-select" style="border-radius: 20px" name="address">';
            echo '        <!-- <option selected>Open this select menu</option> -->';
            echo '        <option value="1">KTX Khu A</option>';
            echo '        <option value="2">KTX Khu B</option>';
            echo '    </select>';
            echo '</div>';
            echo '<div class="container container-border-modal" style="padding-top: 20px; padding-bottom: 10px; margin-bottom: 20px">';
            echo '    <div class="row" style="margin-bottom: 10px">';
            echo '        <div class="col">';
            echo '            <h5>TỔNG CỘNG</h5>';
            echo '        </div>';
            echo '        <div class="col" style="text-align: right">';
            echo '            <h5 id="sum-price">115.400 <u style="padding-left: 3px">đ</u></h5>';
            echo '            <input type="hidden" name="total" value="" id="sum-price-hidden">';
            echo '        </div>';
            echo '    </div>';
            echo '    <button type="submit" class="btn" style="background: #ffc700; width: 100%; border-radius: 20px" data-bs-dismiss="modal">';
            echo '        Đặt đơn';
            echo '    </button>';
            echo '</div>';
            echo '</form>';
          } else {
            echo '<div style="text-align: center; margin-top: 10px">';
            echo '  <h5><strong>Chưa có đơn hàng</strong></h5>';
            echo '</div>';
          }
        ?>
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
              data-icon="ci:main-component"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/mainpage"
                style="text-decoration: none; color: black; font-size: small"
                >Trang chủ</a
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
                href="/BTL/user/orders"
                style="text-decoration: none; color: black; font-size: small"
                >Đơn hàng</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="fluent:people-community-16-filled"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/community"
                style="text-decoration: none; color: black; font-size: small"
                >Cộng đồng</a
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
            <?php
            if (count($product_in_cart) > 0) {
              echo '<div class="circle-number">';
              echo count($product_in_cart);
              echo '</div>';
            }
            ?>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
