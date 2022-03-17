/*##########-Versão 1.1-##########*/
CREATE TABLE users (
    Name varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Id_Person int(255) AUTO_INCREMENT,
    PRIMARY KEY (Id)
);
CREATE TABLE products (
    Name varchar(255) NOT NULL,
    Price float NOT NULL,
    Quantity int(255) NOT NULL,
    Id_Product int(255) NOT NULL AUTO_INCREMENT,
    Id_Owner int(255) NOT NULL,
    Img_Product varchar(255) NOT NULL,
    PRIMARY KEY(IdProduct),
    FOREIGN KEY(IdOwner) REFERENCES users(Id))
);
CREATE TABLE friends (
    Id_Friend int(255) AUTO_INCREMENT,
    Id_Person1 int(255),
    Id_Person2 int(255),
    PRIMARY KEY(Id_Friend),
    FOREIGN KEY(Id_Person1) REFERENCES users(Id_Person),
    FOREIGN KEY(Id_Person2) REFERENCES users(Id_Person)
)