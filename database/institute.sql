/* SQLEditor (MySQL (2))*/

CREATE TABLE `spheres`
(
`id` INTEGER,
`sphere` TEXT,
`country` TEXT,
PRIMARY KEY (`id`)
);

CREATE TABLE `address`
(
`id` INT AUTO_INCREMENT UNIQUE,
`address_1` TEXT,
`city` TEXT,
`state` TEXT,
`zip_code` TEXT,
`country` TEXT,
PRIMARY KEY (`id`)
);

CREATE TABLE `giants`
(
`id` INTEGER AUTO_INCREMENT,
`giant` TEXT,
`country` TEXT,
PRIMARY KEY (`id`)
);

CREATE TABLE `category_type`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`value` VARCHAR(255) UNIQUE,
PRIMARY KEY (`id`)
);

CREATE TABLE `company`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`name` TEXT,
`address_id` INT,
PRIMARY KEY (`id`)
);

CREATE TABLE `status_type`
(
`id` INTEGER AUTO_INCREMENT,
`value` VARCHAR(255) UNIQUE,
PRIMARY KEY (`id`)
);

CREATE TABLE `industry`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`value` VARCHAR(514),
PRIMARY KEY (`id`)
);

CREATE TABLE `company_industry_assn`
(
`company_id` INTEGER NOT NULL,
`industry_id` INTEGER NOT NULL
);

CREATE TABLE `role`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`name` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `login`
(
`username` TEXT,
`password` TEXT,
`id` INTEGER AUTO_INCREMENT UNIQUE,
`role_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `user`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`login_id` INTEGER,
`first_name` TEXT,
`last_name` TEXT,
`email` TEXT,
`gender` BOOLEAN,
`country` VARCHAR(255),
`department` VARCHAR(255),
`title` VARCHAR(255),
`tenure` INTEGER,
`career_length` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `resource`
(
`id` INTEGER NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `scorecard`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`company_id` INTEGER,
`name` TEXT,
`resource_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `strategy`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`strategy` TEXT,
`priority` INTEGER,
`count` INTEGER,
`scorecard_id` INTEGER,
`category_type_id` INTEGER,
`modified_by` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `strategy_giant_assn`
(
`strategy_id` INTEGER NOT NULL,
`giant_id` INTEGER NOT NULL
);

CREATE TABLE `strategy_sphere_assn`
(
`strategy_id` INTEGER NOT NULL,
`sphere_id` INTEGER NOT NULL
);

CREATE TABLE `kpis`
(
`id` INTEGER AUTO_INCREMENT,
`strategy_id` INTEGER,
`scorecard_id` INTEGER,
`rating` INTEGER,
`kpi` TEXT,
`count` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `action_items`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`action` TEXT,
`strategy_id` INTEGER,
`scorecard_id` INTEGER,
`who` INTEGER,
`when` DATE,
`status_type` INTEGER,
`comments` TEXT,
`category_id` INTEGER,
`count` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `scorecard_user_assn`
(
`user_id` INTEGER NOT NULL,
`scorecard_id` INTEGER NOT NULL
);

CREATE TABLE `resource_user_assn`
(
`resource_id` INTEGER NOT NULL,
`user_id` INTEGER NOT NULL
);

CREATE TABLE `company_user_assn`
(
`company_id` INTEGER NOT NULL,
`user_id` INTEGER NOT NULL
);

CREATE TABLE `ten_p_questions`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`count` INTEGER UNIQUE,
`text` VARCHAR(514),
`category_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `kingdom_business_questions`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`count` INTEGER,
`text` VARCHAR(514),
`category_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `resource_status`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`value` VARCHAR(255),
PRIMARY KEY (`id`)
);

CREATE TABLE `ten_p_assessment`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`resource_status_id` INTEGER,
`company_id` INTEGER,
`resource_id` INTEGER,
`user_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `ten_p_results`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`question_id` INTEGER,
`assessment_id` INTEGER,
`performance` INTEGER,
`importance` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `kingdom_business_assessment`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`company_id` INTEGER,
`resource_id` INTEGER,
`user_id` INTEGER,
`resource_status_id` INTEGER,
PRIMARY KEY (`id`)
);

CREATE TABLE `kingdom_business_results`
(
`id` INTEGER AUTO_INCREMENT UNIQUE,
`question_id` INTEGER,
`assessment_id` INTEGER,
`performance` INTEGER,
`importance` INTEGER,
PRIMARY KEY (`id`)
);

ALTER TABLE `company` ADD FOREIGN KEY address_id_idxfk (`address_id`) REFERENCES `address` (`id`);

ALTER TABLE `company_industry_assn` ADD FOREIGN KEY company_id_idxfk (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `company_industry_assn` ADD FOREIGN KEY industry_id_idxfk (`industry_id`) REFERENCES `industry` (`id`);

ALTER TABLE `login` ADD FOREIGN KEY role_id_idxfk (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `user` ADD FOREIGN KEY login_id_idxfk (`login_id`) REFERENCES `login` (`id`);

ALTER TABLE `scorecard` ADD FOREIGN KEY company_id_idxfk_1 (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `scorecard` ADD FOREIGN KEY resource_id_idxfk (`resource_id`) REFERENCES `resource` (`id`);

CREATE INDEX `priority_idx` ON `strategy`(`priority`);
ALTER TABLE `strategy` ADD FOREIGN KEY scorecard_id_idxfk (`scorecard_id`) REFERENCES `scorecard` (`id`);

CREATE INDEX `category_type_id_idx` ON `strategy`(`category_type_id`);
ALTER TABLE `strategy` ADD FOREIGN KEY category_type_id_idxfk (`category_type_id`) REFERENCES `category_type` (`id`);

ALTER TABLE `strategy` ADD FOREIGN KEY modified_by_idxfk (`modified_by`) REFERENCES `user` (`id`);

ALTER TABLE `strategy_giant_assn` ADD FOREIGN KEY strategy_id_idxfk (`strategy_id`) REFERENCES `strategy` (`id`);

ALTER TABLE `strategy_giant_assn` ADD FOREIGN KEY giant_id_idxfk (`giant_id`) REFERENCES `giants` (`id`);

ALTER TABLE `strategy_sphere_assn` ADD FOREIGN KEY strategy_id_idxfk_1 (`strategy_id`) REFERENCES `strategy` (`id`);

ALTER TABLE `strategy_sphere_assn` ADD FOREIGN KEY sphere_id_idxfk (`sphere_id`) REFERENCES `spheres` (`id`);

ALTER TABLE `kpis` ADD FOREIGN KEY strategy_id_idxfk_2 (`strategy_id`) REFERENCES `strategy` (`id`);

ALTER TABLE `kpis` ADD FOREIGN KEY scorecard_id_idxfk_1 (`scorecard_id`) REFERENCES `scorecard` (`id`);

CREATE INDEX `strategy_id_idx` ON `action_items`(`strategy_id`);
ALTER TABLE `action_items` ADD FOREIGN KEY strategy_id_idxfk_3 (`strategy_id`) REFERENCES `strategy` (`id`);

CREATE INDEX `scorecard_id_idx` ON `action_items`(`scorecard_id`);
ALTER TABLE `action_items` ADD FOREIGN KEY scorecard_id_idxfk_2 (`scorecard_id`) REFERENCES `scorecard` (`id`);

ALTER TABLE `action_items` ADD FOREIGN KEY who_idxfk (`who`) REFERENCES `user` (`id`);

ALTER TABLE `action_items` ADD FOREIGN KEY status_type_idxfk (`status_type`) REFERENCES `status_type` (`id`);

CREATE INDEX `category_id_idx` ON `action_items`(`category_id`);
ALTER TABLE `action_items` ADD FOREIGN KEY category_id_idxfk (`category_id`) REFERENCES `category_type` (`id`);

ALTER TABLE `scorecard_user_assn` ADD FOREIGN KEY user_id_idxfk (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `scorecard_user_assn` ADD FOREIGN KEY scorecard_id_idxfk_3 (`scorecard_id`) REFERENCES `scorecard` (`id`);

ALTER TABLE `resource_user_assn` ADD FOREIGN KEY resource_id_idxfk_1 (`resource_id`) REFERENCES `resource` (`id`);

ALTER TABLE `resource_user_assn` ADD FOREIGN KEY user_id_idxfk_1 (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `company_user_assn` ADD FOREIGN KEY company_id_idxfk_2 (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `company_user_assn` ADD FOREIGN KEY user_id_idxfk_2 (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `ten_p_questions` ADD FOREIGN KEY category_id_idxfk_1 (`category_id`) REFERENCES `category_type` (`id`);

ALTER TABLE `kingdom_business_questions` ADD FOREIGN KEY category_id_idxfk_2 (`category_id`) REFERENCES `category_type` (`id`);

ALTER TABLE `ten_p_assessment` ADD FOREIGN KEY resource_status_id_idxfk (`resource_status_id`) REFERENCES `resource_status` (`id`);

ALTER TABLE `ten_p_assessment` ADD FOREIGN KEY company_id_idxfk_3 (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `ten_p_assessment` ADD FOREIGN KEY resource_id_idxfk_2 (`resource_id`) REFERENCES `resource` (`id`);

ALTER TABLE `ten_p_assessment` ADD FOREIGN KEY user_id_idxfk_3 (`user_id`) REFERENCES `user` (`id`);

CREATE INDEX `question_id_idx` ON `ten_p_results`(`question_id`);
ALTER TABLE `ten_p_results` ADD FOREIGN KEY question_id_idxfk (`question_id`) REFERENCES `ten_p_questions` (`id`);

CREATE INDEX `assessment_id_idx` ON `ten_p_results`(`assessment_id`);
ALTER TABLE `ten_p_results` ADD FOREIGN KEY assessment_id_idxfk (`assessment_id`) REFERENCES `ten_p_assessment` (`id`);

ALTER TABLE `kingdom_business_assessment` ADD FOREIGN KEY company_id_idxfk_4 (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `kingdom_business_assessment` ADD FOREIGN KEY resource_id_idxfk_3 (`resource_id`) REFERENCES `resource` (`id`);

ALTER TABLE `kingdom_business_assessment` ADD FOREIGN KEY user_id_idxfk_4 (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `kingdom_business_assessment` ADD FOREIGN KEY resource_status_id_idxfk_1 (`resource_status_id`) REFERENCES `resource_status` (`id`);

ALTER TABLE `kingdom_business_results` ADD FOREIGN KEY question_id_idxfk_1 (`question_id`) REFERENCES `kingdom_business_questions` (`id`);

ALTER TABLE `kingdom_business_results` ADD FOREIGN KEY assessment_id_idxfk_1 (`assessment_id`) REFERENCES `kingdom_business_assessment` (`id`);
