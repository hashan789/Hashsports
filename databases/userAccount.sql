CREATE TABLE user(
    userId int NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(250) ,
    lastName VARCHAR(250) ,
    userName VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(250) NOT NULL,
    profileImage VARCHAR(250),
    verifyKey VARCHAR(250) ,
    verified TINYINT NOT NULL DEFAULT 0,
    registerDate DATETIME,
    CONSTRAINT pk PRIMARY KEY(userId)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;