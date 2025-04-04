CREATE TABLE `water_contract` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `manzana` int NOT NULL,
  `lote` int NOT NULL,
  `latlon` point NOT NULL,
  `details` text,
  `client_id` int NOT NULL
);

CREATE TABLE `client` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `lastname` char(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` char(255) NOT NULL,
  `comments` text
);

CREATE TABLE `payments` (
  `transaction_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `paydate` timestamp DEFAULT (now()),
  `ammount` int NOT NULL,
  `month` ENUM ('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dic') NOT NULL,
  `year` ENUM ('2024', '2025', '2026', '2027') NOT NULL,
  `contract_id` int NOT NULL
);

CREATE UNIQUE INDEX `payments_index_0` ON `payments` (`month`, `year`, `contract_id`);

ALTER TABLE `water_contract` ADD FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

ALTER TABLE `payments` ADD FOREIGN KEY (`contract_id`) REFERENCES `water_contract` (`id`);
