<?php 

return [
	[
		'CREATE TABLE `messages` ( `id` INT(11) NOT NULL AUTO_INCREMENT UNSIGNED PRIMARY KEY, 
		`messages` VARCHAR(255) NOT NULL,
		`author_id` DOUBLE(10) NOT NULL, 
		`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);',

		'CREATE TABLE `users` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(10) NOT NULL , `password` VARCHAR(55) NOT NULL , PRIMARY KEY (`id`));',

	]
];