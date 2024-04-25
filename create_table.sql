CREATE DATABASE IF NOT EXISTS btl_ltw;
USE btl_ltw;
CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255),
    timeNoti DATETIME,
    title VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    pass VARCHAR(255),
    phone VARCHAR(10),
    userName VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS sellers (
    idAccount INT PRIMARY KEY,
    FOREIGN KEY (idAccount) REFERENCES accounts(id),
    money DECIMAL(10,2),
    nameStore VARCHAR(255),
    address VARCHAR(255),
    tiktok VARCHAR(255),
    instagram VARCHAR(255),
    facebook VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS users (
    idAccount INT PRIMARY KEY,
    FOREIGN KEY (idAccount) REFERENCES accounts(id),
    isReported BOOLEAN NOT NULL DEFAULT FALSE
);
CREATE TABLE IF NOT EXISTS notify (
    idAccount INT,
    idNotifications INT,
	PRIMARY KEY (idAccount,idNotifications),
    isRead BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (idAccount) REFERENCES accounts(id),
    FOREIGN KEY (idNotifications) REFERENCES notifications(id)
);
CREATE TABLE IF NOT EXISTS Blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content LONGTEXT,
    idSeller INT,
    FOREIGN KEY (idSeller) REFERENCES sellers(idAccount)
);

CREATE TABLE IF NOT EXISTS BlogImages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blogId INT,
    imagelink TEXT,
    FOREIGN KEY (blogId) REFERENCES Blog(id)
);
CREATE TABLE IF NOT EXISTS cart (
    userId INT PRIMARY KEY,
    total INT,
    FOREIGN KEY (userId) REFERENCES users(idAccount) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    payment TEXT,
    statusOrder TEXT,
    note TEXT,
    dateCreated DATETIME,
    total DECIMAL(10, 2),
    isRepay BOOLEAN,
    address TEXT,
    isCanceled BOOLEAN,
    FOREIGN KEY (idUser) REFERENCES users(idAccount)
);
CREATE TABLE IF NOT EXISTS ratings (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    isHidden BOOLEAN NOT NULL default FALSE,
    idOrder INT,
    idUser INT,
    respone MEDIUMTEXT,
    content MEDIUMTEXT,
    stars INT,
    FOREIGN KEY (idOrder) REFERENCES orders(id),
    FOREIGN KEY (idUser) REFERENCES users(idAccount)
);
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idAccount INT,
    idBlog INT,
    content LONGTEXT,
    parentCommentId INT,
    FOREIGN KEY (idAccount) REFERENCES accounts(id),
    FOREIGN KEY (idBlog) REFERENCES Blog(id),
    FOREIGN KEY (parentCommentId) REFERENCES comments(id)
);
CREATE TABLE IF NOT EXISTS category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    typeName VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT,
    description TEXT,
    isDeleted BOOLEAN DEFAULT FALSE,
    isHidden BOOLEAN DEFAULT FALSE,
    isReported BOOLEAN DEFAULT FALSE,
    price DECIMAL(10, 2),
    idCategory INT,
    deliveryType TEXT,
    FOREIGN KEY (idCategory) REFERENCES category(id)
);

CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productId INT,
    imageLink VARCHAR(255),
    FOREIGN KEY (productId) REFERENCES product(id)
);
CREATE TABLE IF NOT EXISTS product_in_order (
    idProduct INT,
    idOrder INT,
    price DECIMAL(10, 2),
    quantity INT,
    note TEXT,
    PRIMARY KEY (idProduct, idOrder),
    FOREIGN KEY (idProduct) REFERENCES product(id),
    FOREIGN KEY (idOrder) REFERENCES orders(id)
);
CREATE TABLE IF NOT EXISTS product_in_cart (
    idUser INT,
    idProduct INT,
    quantity INT,
    PRIMARY KEY (idUser, idProduct),
    FOREIGN KEY (idUser) REFERENCES cart(userId),
    FOREIGN KEY (idProduct) REFERENCES product(id)
);
CREATE TABLE IF NOT EXISTS coupon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usedAmount INT DEFAULT 0,
    name VARCHAR(255) NOT NULL,
    startDate DATE,
    endDate DATE,
    quantity INT NOT NULL,
    isDeleted BOOLEAN DEFAULT FALSE,
    isHidden BOOLEAN DEFAULT FALSE,
    cash DECIMAL(10, 2),
    valueCoupon DECIMAL(10, 2),
    maximum DECIMAL(10, 2),
    condValue DECIMAL(10, 2),
    condPayment TEXT
);
CREATE TABLE IF NOT EXISTS coupon_in_use (
    idOrder INT,
    idUser INT,
    idCoupon INT,
    PRIMARY KEY (idOrder),
    FOREIGN KEY (idOrder) REFERENCES orders(id),
    FOREIGN KEY (idUser) REFERENCES accounts(id),
    FOREIGN KEY (idCoupon) REFERENCES coupon(id)
);







