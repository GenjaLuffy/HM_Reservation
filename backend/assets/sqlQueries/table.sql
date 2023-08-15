CREATE TABLE `dbms_userinfo` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `dbms_userinfo` (`firstname`, `lastname`, `phoneno`, `email`, `password`, `role`)
VALUES
  ('pawon', 'Shrestha', '9808420035', 'tests@mail.com', '123', 'admin'),
  ('Genja', 'Luffy', '9812345158', 'test@mail.com', 'test', '');










CREATE TABLE `booked_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `booked_rooms` (`room_type`, `description`, `status`, `quantity`)
VALUES
  ('Single', 'A room assigned to one person...', 1, 10),
  ('Double', 'A room assigned to two people...', 1, 5),
  ('Queen', 'A room with a queen-sized bed...', 1, 8),
  ('King', 'A room with a king-sized bed...', 1, 6),
  ('Twin', 'A room with two twin beds...', 1, 3),
  ('Quad', 'A room assigned to four people...', 1, 2);




CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

