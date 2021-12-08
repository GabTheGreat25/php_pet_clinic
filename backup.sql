DROP TABLE consultation;

CREATE TABLE `consultation` (
  `Consultation_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` int(45) NOT NULL,
  `Pet_id` int(45) NOT NULL,
  `Date_of_Consultation` datetime NOT NULL,
  `Disease_Injuries` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Consultation_id`),
  KEY `Employee_id_fk` (`Employee_id`) USING BTREE,
  KEY `Pet_id_fk` (`Pet_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO consultation VALUES("1","1","1","2021-12-06 17:47:00","Cataracts","400","Give medicine 3 times a day.");
INSERT INTO consultation VALUES("2","2","2","2021-12-29 18:00:29","Ear_Infections","600","Clean ears twice a day");
INSERT INTO consultation VALUES("3","5","1","2021-12-07 11:20:00","Heartworm","2500","Need exactly 8 hours of sleep.");
INSERT INTO consultation VALUES("4","5","2","2021-12-07 14:06:00","Fleas_and_ticks","900","Clean ");



DROP TABLE customer;

CREATE TABLE `customer` (
  `Cust_id` int(45) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Phone_number` varchar(45) NOT NULL,
  `Cust_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer VALUES("1","Gab","Mendoza","123456789","././upload/gab.png");
INSERT INTO customer VALUES("2","qwe","123","987654321","././upload/teres.jpg");
INSERT INTO customer VALUES("4","Gab","Gab","987654321","././upload/250102136_250820656914457_5370241933774633462_n.png");



DROP TABLE employee;

CREATE TABLE `employee` (
  `Employee_id` int(45) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_number` varchar(45) NOT NULL,
  `Registration_date` datetime DEFAULT NULL,
  `Emp_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee VALUES("1","GabGab","Mendoza","gabz@yahoo.com","40bd001563085fc35165329ea1ff5c5ecbdbbeef","123456789","2021-11-30 20:09:00","././upload2/aebor.jpg");
INSERT INTO employee VALUES("2","qwe","123","gabgab@gmail.com","056eafe7cf52220de2df36845b8ed170c67e23e3","12345","2021-12-01 12:46:00","././upload2/gab.png");
INSERT INTO employee VALUES("3","adrian","mendoza","adrian_mendoza0@yahoo.com.ph","5f6955d227a320c7f1f6c7da2a6d96a851a8118f","93880395","2021-12-02 15:52:00","././upload2/242700751_260716072604714_9006017842362284423_n.png");
INSERT INTO employee VALUES("5","Aldiya","Sabulao","Aldiya@gmail.com","51eac6b471a284d3341d8c0c63d0f1a286262a18","1234567","2021-12-07 11:09:00","././upload2/dog_bath.jpg");



DROP TABLE orderline;

CREATE TABLE `orderline` (
  `Employee_id` int(11) NOT NULL,
  `Service_id` int(11) NOT NULL,
  `Schedule` datetime DEFAULT NULL,
  PRIMARY KEY (`Service_id`,`Employee_id`) USING BTREE,
  KEY `Employee_id_fk` (`Employee_id`,`Service_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO orderline VALUES("3","1","2021-12-05 20:37:17");
INSERT INTO orderline VALUES("3","9","2021-12-05 20:37:17");
INSERT INTO orderline VALUES("3","10","2021-12-05 20:37:17");



DROP TABLE pet;

CREATE TABLE `pet` (
  `Pet_id` int(45) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Age` int(45) NOT NULL,
  `Sex` varchar(45) NOT NULL,
  `Breed` varchar(45) NOT NULL,
  `Pet_pic` varchar(100) NOT NULL,
  `Cust_id` int(45) NOT NULL,
  PRIMARY KEY (`Pet_id`),
  KEY `Cust_id_fk` (`Cust_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO pet VALUES("1","Basha","7","Female","Daschund","././upload3/dog.jpg","1");
INSERT INTO pet VALUES("2","Coby","2","Male","Scheweenie","././upload3/247572617_877300003175914_7726265633430797562_n.jpg","4");
INSERT INTO pet VALUES("4","adriel","7","Male","Daschund","././upload3/adriel.png","4");



DROP TABLE service;

CREATE TABLE `service` (
  `Service_id` int(45) NOT NULL AUTO_INCREMENT,
  `Service_name` varchar(45) NOT NULL,
  `Cost` double NOT NULL,
  `Haircut_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`Service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO service VALUES("1","Dutch Court","150","././upload4/dog.jpg");
INSERT INTO service VALUES("5","Cut teddy bear","500","././upload4/dog2.jpg");
INSERT INTO service VALUES("6","Blow Dry","100","././upload4/blow_dry.jpg");
INSERT INTO service VALUES("7","Nail Clipping","50","././upload4/nail_clip.jpg");
INSERT INTO service VALUES("8","Ear Cleaning","175","././upload4/ear_clean.jpg");
INSERT INTO service VALUES("9","Eyes Cleaning","75","././upload4/Eyes_Cleaning.jpg");
INSERT INTO service VALUES("10","Paw Massage","25","././upload4/Paw_Massage.jpg");
INSERT INTO service VALUES("11","Combing/Brushing","400","././upload4/Combing_Brushing.jpg");
INSERT INTO service VALUES("12","Bath With Shampoo & Conditioner","225","././upload4/dog_bath.jpg");



DROP TABLE transaction;

CREATE TABLE `transaction` (
  `Transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` int(11) NOT NULL,
  `Schedule` datetime DEFAULT NULL,
  PRIMARY KEY (`Transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO transaction VALUES("1","3","2021-12-05 20:54:38");
INSERT INTO transaction VALUES("2","3","2021-12-05 20:54:43");
INSERT INTO transaction VALUES("3","1","2021-12-06 13:47:18");
INSERT INTO transaction VALUES("4","1","2021-12-06 13:47:18");
INSERT INTO transaction VALUES("5","5","2021-12-07 11:23:16");
INSERT INTO transaction VALUES("6","5","2021-12-07 11:23:16");
INSERT INTO transaction VALUES("7","5","2021-12-07 11:23:16");
INSERT INTO transaction VALUES("8","5","2021-12-07 11:23:16");



DROP TABLE transaction_line;

CREATE TABLE `transaction_line` (
  `Transaction_id` int(11) NOT NULL,
  `Service_id` int(11) NOT NULL,
  PRIMARY KEY (`Transaction_id`,`Service_id`),
  KEY `basta_fk` (`Transaction_id`,`Service_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO transaction_line VALUES("1","1");
INSERT INTO transaction_line VALUES("2","1");
INSERT INTO transaction_line VALUES("3","1");
INSERT INTO transaction_line VALUES("4","6");
INSERT INTO transaction_line VALUES("5","1");
INSERT INTO transaction_line VALUES("6","6");
INSERT INTO transaction_line VALUES("7","12");
INSERT INTO transaction_line VALUES("8","11");



DROP TABLE try;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `try` AS select `cu`.`First_name` AS `First_name`,`cu`.`Last_name` AS `Last_name`,`c`.`Consultation_id` AS `Consultation_id`,`c`.`Price` AS `Price` from ((`consultation` `c` join `pet` `p` on(`c`.`Pet_id` = `p`.`Pet_id`)) join `customer` `cu` on(`p`.`Cust_id` = `cu`.`Cust_id`));

INSERT INTO try VALUES("Gab","Mendoza","1","400");
INSERT INTO try VALUES("Gab","Gab","2","600");
INSERT INTO try VALUES("Gab","Mendoza","3","2500");
INSERT INTO try VALUES("Gab","Gab","4","900");



