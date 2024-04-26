<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BTL/public/css/styles_login2.css">
    <link href='https://fonts.googleapis.com/css?family=K2D' rel='stylesheet'>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>UniEat</title>
    <link rel="apple-touch-icon" sizes="120x120" href="/BTL/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/BTL/public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/BTL/public/favicon/favicon-16x16.png">
    <link rel="manifest" href="/BTL/public/favicon/site.webmanifest">
    <link rel="mask-icon" href="/BTL/public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="login2">
        <img src="/BTL/public/images/fork2.png" alt="Logo">
        <h1 id="UniEat">UniEat</h1>
        <h2>WELCOME TO UNIEAT</h2>
        <div class="text_otp">
            <div>
                <p>Nhập mã gồm 4 chữ số được gửi cho bạn theo số 01234567890 </p>
                <a class="hover-change" href="#!">Thay đổi số điện thoại?</a>
            </div>
            <div style="display: flex; margin-top: 20px;">
                <form>
                    <input class="otp" type="number" id="1" name="id1" min="0" max="9" maxlength="1">
                </form>
                <form>
                    <input class="otp" style="margin-left: 20px;" type="number" id="2" name="id1" min="0" max="9" maxlength="1">
                </form>
                <form>
                    <input class="otp" style="margin-left: 20px;" type="number" id="3" name="id1" min="0" max="9" maxlength="1">
                </form>
                <form>
                    <input class="otp" style="margin-left: 20px;" type="number" id="4" name="id1" min="0" max="9" maxlength="1">
                </form>
            </div>
            <div style="margin-top: 20px;">
                <a href="#!" class="hover-change2">Không nhận được mã?</a>
            </div>
        </div>      
        <div style="display: flex; justify-content: space-between;" class="two_button">
            <div style="margin-top: 30px;">
                <a style="color: #FFC700;" href="#!">
                    <span class="iconify" style="font-size: 70px" data-icon="ei:arrow-left"></span>
                </a>
            </div>
            <div style="margin-top: 30px; ">
                <a style="color: #FFC700; text-align: right;" href="#!">
                    <span class="iconify" style="font-size: 70px" data-icon="ei:arrow-right"></span> 
                </a>
            </div>
        </div>
    </div>
</body>
</html>