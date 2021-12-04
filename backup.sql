DROP TABLE consultation;

CREATE TABLE `consultation` (
  `Consultation_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_id` int(45) NOT NULL,
  `Pet_id` int(45) NOT NULL,
  `Date_of_Consultation` datetime NOT NULL,
  `Disease_Injuries` varchar(255) NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Consultation_id`),
  KEY `Employee_id_fk` (`Employee_id`) USING BTREE,
  KEY `Pet_id_fk` (`Pet_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO consultation VALUES("1","2","1","2021-12-03 17:03:00","Cataracts","Give medicine 3 times a day.");
INSERT INTO consultation VALUES("2","3","2","2021-12-04 17:03:00","Heartworm","Need exactly 8 hours of sleep.");
INSERT INTO consultation VALUES("3","1","1","2021-12-03 19:22:00","Ear_Infections","Clean ears twice a day");



DROP TABLE customer;

CREATE TABLE `customer` (
  `Cust_id` int(45) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(45) NOT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Phone_number` varchar(45) NOT NULL,
  `Cust_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee VALUES("1","GabGab","Mendoza","gabz@yahoo.com","40bd001563085fc35165329ea1ff5c5ecbdbbeef","123456789","2021-11-30 20:09:00","././upload2/aebor.jpg");
INSERT INTO employee VALUES("2","qwe","123","gabgab@gmail.com","056eafe7cf52220de2df36845b8ed170c67e23e3","12345","2021-12-01 12:46:00","././upload2/gab.png");
INSERT INTO employee VALUES("3","adrian","mendoza","adrian_mendoza0@yahoo.com.ph","5f6955d227a320c7f1f6c7da2a6d96a851a8118f","93880395","2021-12-02 15:52:00","././upload2/242700751_260716072604714_9006017842362284423_n.png");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO service VALUES("1","Dutch Court","150","././upload4/dog.jpg");



