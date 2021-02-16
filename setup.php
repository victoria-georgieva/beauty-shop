CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `admin` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`name`, `email`, `password`, `admin`) VALUES
('admin user', 'admin@beautyshop.bg', '21232f297a57a5a743894a0e4a801fc3', 1);

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(5,2),
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`name`, `description`, `price`, `image`) VALUES
('Alya', 'demo desc', 8, 'alya.jpg'),
('Clay', 'demo desc', 8, 'clay.jpg'),
('Eos', 'demo desc', 8, 'eos.jpg'),
('Facial Scrub', 'demo desc', 8, 'scrub.jpg'),
('Demo', 'demo desc', 8, 'alya.jpg');

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int,
  `product_id` int,
  `comment` text,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES users (`id`),
  FOREIGN KEY (`product_id`) REFERENCES products (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int,
  `product_id` int,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES users (`id`),
  FOREIGN KEY (`product_id`) REFERENCES products (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;