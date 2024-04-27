# BTL_LTW

Đây là repository chính thức cho Bài tập lớn môn Lập trình Web.

**_(Cập nhật đầu tiên 26/04/2024: Setup các trang dành cho user)_**
**_(Cập nhật 27/04/2024: Cập nhật đầy đủ front-end dành cho seller, thêm database)_**

## Getting Start

### Installing

1. Clone the repository

- Vào thư mục `C:\xampp\htdocs\`, tạo folder tên `BTL`.
- Sau đó `cd BTL` và thực hiện lệnh sau:
  ```sh
  git init
  git remote add origin https://github.com/boochou/BTL_LTW.git
  git pull origin main
  ```

2. Chỉnh sửa

- Thực hiện đổi sang nhánh của mình và chỉnh sửa:
  - Ví dụ Châu sửa, thì nhập lệnh sau:
  ```sh
  git branch Chau
  git checkout Chau
  ```

3. Push lại code lên repository

- Thực hiện các lệnh sau để push:
  - Ví dụ Châu push, thì:
  ```sh
  git add .
  git commit -m "<content>"
  git push orgin Chau
  ```

## Khởi chạy web

1. Mở XAMPP (run as administrator), start Apache và MySQL.

2. Vào trình duyệt web, nhập đường link `http://localhost/BTL/views/user/?page=homepage` để chạy front-end cho user và `http://localhost/BTL/views/seller/?page=mainpage` cho seller.

## Một số thông tin về web

### Công nghệ được sử dụng

- Front-end:
  - HTML + CSS
  - Bootstrap 5
  - Javascript
  - jQuery
- Back-end:
  - Server code: PHP
  - Database: MySQL

### Các trang Web hiện có

- Front-end:
  - User:
    - Trang chủ
    - Trang cộng đồng
    - Trang yêu thích
    - Trang các đơn đặt hàng
    - Trang thông tin người dùng
    - 2 trang đăng nhập
  - Seller:
    - Trang tài khoản
    - Trang thêm sản phẩm
    - Trang thêm voucher
    - Trang cộng đồng
    - Trang sản phẩm vi phạm
    - Trang chính
    - Trang thông báo
    - Trang hủy đặt hàng
    - Trang hoàn tiền
    - Trang đơn tất cả đơn hàng
    - Trang sản phẩm hiện tại
    - Trang chi tiết sản phẩm
    - Trang đánh giá
    - Trang doanh thu
    - Trang voucher
    - Trang chi tiết voucher

### Các lưu ý

Mọi người kéo về và đẩy lên như hướng dẫn để tránh mất code.

Lời cuối, chúc mọi người một ngày tốt lành!
