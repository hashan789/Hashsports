create table products(
    item_id INT NOT NULL,
    item varchar(500),
    image VARCHAR(250) NOT NULL,
    price DECIMAL(6,2),
    class VARCHAR(250) NOT NULL,
    constraint pk primary key (item_id)
)ENGINE = innoDB DEFAULT CHARSET = utf8mb4;

create table featureproducts(
    item_id INT NOT NULL,
    item varchar(500),
    image VARCHAR(250) NOT NULL,
    price DECIMAL(6,2),
    class VARCHAR(250) NOT NULL,
    constraint pk primary key (item_id)
)ENGINE = innoDB DEFAULT CHARSET = utf8mb4;

create table latestproducts(
    item_id INT NOT NULL,
    item varchar(500),
    image VARCHAR(250) NOT NULL,
    price DECIMAL(6,2),
    class VARCHAR(250) NOT NULL,
    constraint pk primary key (item_id)
)ENGINE = innoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO featureproducts VALUES 
(14,'Football Ball F100 Size 5','sportsimages/sportsItems/Football Ball F100 Size 5.jpg',9.90,'Football'),
(2,'Basic running sports Bra-Black','sportsimages/sportsItems/Basic running sports Bra-Black.jpg',1.49,'Others'),
(23,'Table Tennis Table TTT100','sportsimages/sportsItems/table-tennis-table-ttt-100.jpg',59.99,'Table Tennis'),
(18,'PB 1000 Punch bag-Black','sportsimages/sportsItems/pb-1000-punch-bag-black.jpg',18.99,'Others'),
(3,'Carrom board 120','sportsimages/sportsItems/Carrom board 120.jpg',10.99,'Carrom'),
(8,'Cricket leather ball','sportsimages/sportsItems/Cricket leather ball.jpg',1.29,'Cricket'),
(9,'Cricket Polo LTR 500 IVORY','sportsimages/sportsItems/Cricket Polo LTR 500 IVORY.jpg',1.99,'Cricket'),
(7,'Cricket chest Guard CH 100','sportsimages/sportsItems/Cricket chest Guard CH 100.jpg',4.49,'Cricket');

INSERT INTO latestproducts VALUES 
(5,'Cricket Arm guard ARM 100','sportsimages/sportsItems/Cricket Arm guard ARM 100.jpg',1.49,'Cricket'),
(12,'F300 Football - size 5','sportsimages/sportsItems/F300 Football - size 5.jpg',2.49,'Football'),
(13,'F500 Adult Football Socks-Navy','sportsimages/sportsItems/F500 Adult Football Socks-Navy.jpg',0.99,'Football'),
(24,'VB 100 blue/yellow volleyball','sportsimages/sportsItems/VB 100 blueyellow volleyball.jpg',1.99,'Volleyball'),
(6,'Cricket Bat-t 900 LT blue','sportsimages/sportsItems/Cricket Bat-t 900 LT blue.jpg',4.49,'Cricket'),
(10,'Cricket trouser LTR 500 IVORY','sportsimages/sportsItems/Cricket trouser LTR 500 IVORY.jpg',1.99,'Cricket'),
(1,'Archery Target Face 40*40','sportsimages/sportsItems/Archery Target Face 4040.jpg',0.19,'Archery'),
(22,'softarchery archery set 100','sportsimages/sportsItems/softarchery archery set 100.jpg',9.99,'Archery');

INSERT INTO products VALUES 
(14,'Football Ball F100 Size 5','sportsimages/sportsItems/Football Ball F100 Size 5.jpg',0.99,'Football'),
(4,'Collapsible Bench press incline bench','sportsimages/sportsItems/Collapsible Bench press incline bench.jpg',29.99,'Others'),
(25,'Yoga Foam block Large-Grey/Blue','sportsimages/sportsItems/Yoga Foam block Large-GreyBlue.jpg',1.49,'Others'),
(20,'PW 100 Mens fitness Walking shoes-Grey','sportsimages/sportsItems/PW 100 Mens fitness Walking shoes-Grey.jpg',2.99,'Others'),
(2,'Basic running sports Bra-Black','sportsimages/sportsItems/Basic running sports Bra-Black.jpg',1.49,'Others'),
(23,'Table Tennis Table TTT100','sportsimages/sportsItems/table-tennis-table-ttt-100.jpg',59.99,'Table Tennis'),
(18,'PB 1000 Punch bag-Black','sportsimages/sportsItems/pb-1000-punch-bag-black.jpg',18.99,'Others'),
(3,'Carrom board 120','sportsimages/sportsItems/Carrom board 120.jpg',10.99,'Carrom'),
(21,'R100 Adult size 7 durable basketball Perfect for begginers-orange','sportsimages/sportsItems/R100 Adult size 7 durable basketball Perfect for begginers-orange.jpg',0.99,'Basketball'),
(19,'Protect 100 beginner High-rise basketball shoes-black','sportsimages/sportsItems/Protect 100 beginner High-rise basketball shoes-black.jpg',5.99,'basketball'),
(17,'Mini B Deluxe Kids/Adult basketball wall-mounted backboard set','sportsimages/sportsItems/Mini B Deluxe KidsAdult basketball wall-mounted backboard set.jpg',4.99,'Basketball'),
(8,'Cricket leather ball','sportsimages/sportsItems/Cricket leather ball.jpg',1.29,'Cricket'),
(15,'Men"s Anti Abrasion Cricket shoes CS 300-blue','sportsimages/sportsItems/Mens Anti Abrasion Cricket shoes CS 300-blue.jpg',5.99,'Cricket'),
(9,'Cricket Polo LTR 500 IVORY','sportsimages/sportsItems/Cricket Polo LTR 500 IVORY.jpg',1.99,'Cricket'),
(7,'Cricket chest Guard CH 100','sportsimages/sportsItems/Cricket chest Guard CH 100.jpg',4.49,'Cricket'),
(5,'Cricket Arm guard ARM 100','sportsimages/sportsItems/Cricket Arm guard ARM 100.jpg',1.49,'Cricket'),
(12,'F300 Football - size 5','sportsimages/sportsItems/F300 Football - size 5.jpg',2.49,'Football'),
(16,'Men"s football Boots Agility 140 FG-Blue','sportsimages/sportsItems/Mens football Boots Agility 140 FG-Blue.jpg',4.99,'Football'),
(11,'Double action Football pump-black/yellow','sportsimages/sportsItems/Double action Football pump-blackyellow.jpg',0.59,'Football'),
(13,'F500 Adult Football Socks-Navy','sportsimages/sportsItems/F500 Adult Football Socks-Navy.jpg',0.99,'Football'),
(24,'VB 100 blue/yellow volleyball','sportsimages/sportsItems/VB 100 blueyellow volleyball.jpg',1.99,'Volleyball'),
(6,'Cricket Bat-t 900 LT blue','sportsimages/sportsItems/Cricket Bat-t 900 LT blue.jpg',4.49,'Cricket'),
(10,'Cricket trouser LTR 500 IVORY','sportsimages/sportsItems/Cricket trouser LTR 500 IVORY.jpg',1.99,'Cricket'),
(1,'Archery Target Face 40*40','sportsimages/sportsItems/Archery Target Face 4040.jpg',0.19,'Archery'),
(22,'softarchery archery set 100','sportsimages/sportsItems/softarchery archery set 100.jpg',9.99,'Archery');