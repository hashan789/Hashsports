CREATE TABLE cart(
   cartId int,
   userId int,
   itemId int,
   CONSTRAINT PK PRIMARY KEY(cartId)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user(
   userId int,
   username VARCHAR(100),
   Pass_word VARCHAR(100) NOT NULL,
   CONSTRAINT PK1 PRIMARY KEY(userId)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;  