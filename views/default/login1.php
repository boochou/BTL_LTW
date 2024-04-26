<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/BTL/public/css/styles_login1.css">
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
    <div class="login">
        <img src="/BTL/public/images/fork2.png" alt="Logo">
        <h1 id="UniEat">UniEat</h1>
        <h2>WHAT IS YOUR PHONE NUMBER OR EMAIL?</h2>
        <form>
            <input type="text" id="phonemail" name="phonemail" placeholder="Enter your phone number or email"><br>
            <input type="password" id="pass" name = "pass" placeholder="Enter your password"><br>
        </form>
        <form>
            <input type="submit" id="continue" name="continue" value="CONTINUE">
        </form>
        <div class="or_div">
            <hr class="h_line">
            <p class="or_text">OR</p>
        </div>
        <form>
            <div class="google_w_icon">
                <input type="button" id="google" name="google" value="CONTINUE WITH GOOGLE">
                <span class="iconify" style="font-size: 25px" data-icon="flat-color-icons:google"></span>
            </div>
            <div class="google_w_icon">
                <input type="button" id="facebook" name="facebook" value="CONTINUE WITH FACEBOOK"><br>
                <span class="iconify" style="font-size: 25px" data-icon="logos:facebook"></span>
            </div>
            <div class="google_w_icon">
                <input type="button" id="apple" name="apple" value="CONTINUE WITH APPLE"><br>
                <span class="iconify" style="font-size: 25px" data-icon="devicon:apple"></span>
            </div>
        </form>
    </div>
</body>
</html>