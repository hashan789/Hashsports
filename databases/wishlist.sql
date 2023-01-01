CREATE TABLE wishlist(
    userId int NOT NULL,
    itemId VARCHAR(100) NOT NULL,
    item VARCHAR(250) NOT NULL,
    price int NOT NULL,
    image VARCHAR(250),
    class VARCHAR(250) NOT NULL,
    CONSTRAINT pk4 PRIMARY KEY(userId,itemId)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;