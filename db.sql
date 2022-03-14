/*##########-Versão 1.0-##########*/
CREATE TABLE users (
    Name varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Id_Person int(255) AUTO_INCREMENT,
    PRIMARY KEY (Id)
);
CREATE TABLE Products (
    Name varchar(255) NOT NULL,
    Price int(255) NOT NULL,
    Quantity int(255) NOT NULL,
    IdProduct int(255) NOT NULL AUTO_INCREMENT,
    IdOwner int(255) NOT NULL,
    PRIMARY KEY(IdProduct),
    FOREIGN KEY(IdOwner) REFERENCES users(Id))
);