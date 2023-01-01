CREATE TABLE cart1(
    cartId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    item_Id VARCHAR(250) NOT NULL,
    item VARCHAR(250) NOT NULL,
    price int NOT NULL,
    units int NOT NULL,
    image VARCHAR(250) NOT NULL,
    PRIMARY KEY (cartId)
  /*  CONSTRAINT fk FOREIGN KEY(userId) REFERENCES user(userId),
    CONSTRAINT fk1 FOREIGN KEY(item_Id) REFERENCES featureproducts(item_Id)*/
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE cart2(
    cartId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    item_Id VARCHAR(250) NOT NULL,
    item VARCHAR(250) NOT NULL,
    price int NOT NULL,
    units int NOT NULL,
    image VARCHAR(250) NOT NULL,
    PRIMARY KEY (cartId)
  /*  CONSTRAINT fk2 FOREIGN KEY(userId) REFERENCES user(userId),
    CONSTRAINT fk3 FOREIGN KEY(item_Id) REFERENCES latestproducts(item_Id)*/
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE cart3(
    cartId int NOT NULL AUTO_INCREMENT,
    userId int NOT NULL,
    item_Id VARCHAR(250) NOT NULL,
    item VARCHAR(250) NOT NULL,
    price int NOT NULL,
    units int NOT NULL,
    image VARCHAR(250) NOT NULL,
    PRIMARY KEY (cartId)
  /*  CONSTRAINT fk4 FOREIGN KEY(userId) REFERENCES user(userId),
    CONSTRAINT fk5 FOREIGN KEY(item_Id) REFERENCES products(item_Id)*/
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;