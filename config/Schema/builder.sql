-- -----------------------------------------------------
-- Schema builder
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `is_blocked` TINYINT(1) NULL,
  `created` TIMESTAMP NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `created` TIMESTAMP NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `route` TEXT NOT NULL,
  `description` TEXT NULL,
  `created` TIMESTAMP NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` INT NOT NULL,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`),
  INDEX `roles_key1_idx` (`role_id` ASC),
  INDEX `users_key_idx` (`user_id` ASC),
  CONSTRAINT `users_key`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `roles_key1`
    FOREIGN KEY (`role_id`)
    REFERENCES `roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles_tasks` (
  `role_id` INT NOT NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`role_id`, `task_id`),
  INDEX `tasks_key1_idx` (`task_id` ASC),
  INDEX `roles_key2_idx` (`role_id` ASC),
  CONSTRAINT `roles_key2`
    FOREIGN KEY (`role_id`)
    REFERENCES `roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tasks_key1`
    FOREIGN KEY (`task_id`)
    REFERENCES `tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Populate schema with basic data
-- -----------------------------------------------------

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Administrator', 'System Administrator', '2016-03-27 17:14:27', '2016-03-27 17:24:55');


--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `is_blocked`, `created`, `modified`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin', '$2y$10$VwqZLVzKMiP09q5BVMK6LueyGanfPMTCPs1vSJkAO6bbPRIdjll7a', 0, '2016-03-27 17:13:06', '2016-03-27 18:52:12');

--
-- Dump dei dati per la tabella `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `route`, `description`, `created`, `modified`) VALUES
(1, 'All', '/', 'Access at application root', '2016-03-27 17:15:36', '2016-03-29 07:53:34');


--
-- Dump dei dati per la tabella `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1);


--
-- Dump dei dati per la tabella `roles_tasks`
--

INSERT INTO `roles_tasks` (`role_id`, `task_id`) VALUES
(1, 1);