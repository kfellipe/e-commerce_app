/*##########-Versão 1.3-##########*/
CREATE TABLE users (
    Name varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Id_Person int(255) NOT NULL AUTO_INCREMENT,
    Credits float NOT NULL DEFAULT 0,
    Logged boolean NOT NULL,
    Back_Colors varchar(255) NOT NULL DEFAULT "#15dfee/#008dc5",
    Pred_Color varchar(255) NOT NULL DEFAULT "",
    PRIMARY KEY (Id_Person)
);
CREATE TABLE products (
    Name varchar(255) NOT NULL,
    Price float NOT NULL,
    Quantity int(255) NOT NULL,
    Id_Product int(255) NOT NULL AUTO_INCREMENT,
    Id_Owner int(255) NOT NULL,
    Img_Product varchar(255) NOT NULL,
    PRIMARY KEY(Id_Product),
    FOREIGN KEY(Id_Owner) REFERENCES users(Id_Person)
);
CREATE TABLE friends (
    Id_Friend int(255) NOT NULL AUTO_INCREMENT,
    Id_Sender int(255) NOT NULL,
    Id_Receiver int(255) NOT NULL,
    Friend boolean NOT NULL,
    PRIMARY KEY(Id_Friend),
    FOREIGN KEY(Id_Sender) REFERENCES users(Id_Person),
    FOREIGN KEY(Id_Receiver) REFERENCES users(Id_Person)
);
CREATE TABLE sales (
    Id_Sale int NOT NULL AUTO_INCREMENT,
    Id_Buyer int NOT NULL,
    Id_Seller int NOT NULL, 
    Price int NOT NULL,
    Quantity int NOT NULL,
    Name_Product varchar(255) NOT NULL,
    PRIMARY KEY(Id_Sale),
    FOREIGN KEY(Id_Buyer) REFERENCES users(Id_Person),
    FOREIGN KEY(Id_Seller) REFERENCES users(Id_Person)
);