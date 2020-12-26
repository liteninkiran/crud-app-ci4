
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
    SET AUTOCOMMIT = 0;
    START TRANSACTION;
    SET time_zone = "+00:00";

    DROP DATABASE IF EXISTS `jml`;

    CREATE DATABASE IF NOT EXISTS `jml` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

    USE `jml`;

    -- Drop MTM tables
    DROP TABLE IF EXISTS `joiner_hdw_mtm`;
    DROP TABLE IF EXISTS `joiner_app_mtm`;
    DROP TABLE IF EXISTS `leaver_hdw_mtm`;
    DROP TABLE IF EXISTS `mover_hdw_mtm`;
    DROP TABLE IF EXISTS `mover_app_mtm`;
    DROP TABLE IF EXISTS `email`;

    -- Drop JML tables
    DROP TABLE IF EXISTS `joiner`;
    DROP TABLE IF EXISTS `mover`;
    DROP TABLE IF EXISTS `leaver`;

    -- Drop reference tables
    DROP TABLE IF EXISTS `hardware`;
    DROP TABLE IF EXISTS `department`;
    DROP TABLE IF EXISTS `application`;

    /*------------------------------------------
    --  APPLICATION - Create Table            --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `application`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`application` varchar(255) NOT NULL
        ,`application_owner_name` varchar(255) NOT NULL
        ,`application_owner_email` varchar(255) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_application` (`application`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1;

    /*------------------------------------------
    --  DEPARTMENT - Create Table             --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `department`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`department` varchar(255) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_department` (`department`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  HARDWARE - Create Table               --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `hardware`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`hardware` varchar(255) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_hardware` (`hardware`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  MOVER - Create Table                  --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `mover`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`req_full_name` varchar(255) NOT NULL
        ,`req_email` varchar(255) NOT NULL
        ,`move_date` date NOT NULL
        ,`employee_staff_num` varchar(10) NOT NULL
        ,`employee_full_name` varchar(255) NOT NULL
        ,`employee_job_title` varchar(255) NOT NULL
        ,`department_new_id` int(11) NOT NULL
        ,`department_prev_id` int(11) NOT NULL
        ,`new_manager_full_name` varchar(255) NOT NULL
        ,`prev_manager_full_name` varchar(255) NOT NULL
        ,`employment_type` varchar(20) NOT NULL
        ,`contract_end_date` date DEFAULT NULL
        ,`remote_access` tinyint(1) NOT NULL
        ,`usb_usage` tinyint(1) NOT NULL
        ,`usb_usage_reason` text DEFAULT NULL
        ,`additional_requirements` text DEFAULT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  MOVER APPLICATION MTM - Create Table  --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `mover_app_mtm`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`mover_id` int(11) NOT NULL
        ,`application_id` int(11) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_mover_app` (`mover_id`,`application_id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  MOVER HARDWARE MTM - Create Table     --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `mover_hdw_mtm`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`mover_id` int(11) NOT NULL
        ,`hardware_id` int(11) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_mover_hdw` (`mover_id`,`hardware_id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  LEAVER - Create Table                 --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `leaver`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`req_full_name` varchar(255) NOT NULL
        ,`req_email` varchar(255) NOT NULL
        ,`leave_date` date NOT NULL
        ,`employee_staff_num` varchar(10) NOT NULL
        ,`employee_full_name` varchar(255) NOT NULL
        ,`employee_job_title` varchar(255) NOT NULL
        ,`department_id` int(11) NOT NULL
        ,`manager_full_name` varchar(255) NOT NULL
        ,`additional_requirements` text DEFAULT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  LEAVER HARDWARE MTM - Create Table    --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `leaver_hdw_mtm`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`leaver_id` int(11) NOT NULL
        ,`hardware_id` int(11) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_leaver_hdw` (`leaver_id`,`hardware_id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  JOINER - Create Table                 --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `joiner`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`req_full_name` varchar(255) NOT NULL
        ,`req_email` varchar(255) NOT NULL
        ,`join_date` date NOT NULL
        ,`employee_staff_num` varchar(10) NOT NULL
        ,`employee_full_name` varchar(255) NOT NULL
        ,`employee_job_title` varchar(255) NOT NULL
        ,`department_id` int(11) NOT NULL
        ,`manager_full_name` varchar(255) NOT NULL
        ,`employment_type` varchar(20) NOT NULL
        ,`contract_end_date` date DEFAULT NULL
        ,`remote_access` tinyint(1) NOT NULL
        ,`usb_usage` tinyint(1) NOT NULL
        ,`usb_usage_reason` text DEFAULT NULL
        ,`additional_requirements` text DEFAULT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  JOINER APPLICATION MTM - Create Table --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `joiner_app_mtm`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`joiner_id` int(11) NOT NULL
        ,`application_id` int(11) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_joiner_app` (`joiner_id`,`application_id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  JOINER HARDWARE MTM - Create Table    --
    ------------------------------------------*/

    CREATE TABLE IF NOT EXISTS `joiner_hdw_mtm`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`joiner_id` int(11) NOT NULL
        ,`hardware_id` int(11) NOT NULL
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ,UNIQUE KEY `uc_joiner_hdw` (`joiner_id`,`hardware_id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  EMAIL - Create Table                  --
    ------------------------------------------*/

    DROP TABLE IF EXISTS `email`;

    CREATE TABLE IF NOT EXISTS `email`
        (
         `id` int(11) NOT NULL AUTO_INCREMENT
        ,`joiner_id` int(11) DEFAULT NULL
        ,`mover_id` int(11) DEFAULT NULL
        ,`leaver_id` int(11) DEFAULT NULL
        ,`email_to` text NOT NULL
        ,`email_from` varchar(255) NOT NULL
        ,`email_cc` text DEFAULT NULL
        ,`email_bcc` text DEFAULT NULL
        ,`email_body` text NOT NULL
        ,`email_subject` varchar(255) NOT NULL
        ,`sucess_ind` tinyint(1) NOT NULL DEFAULT 1
        ,`create_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`update_date` datetime NOT NULL DEFAULT current_timestamp()
        ,`create_user` varchar(255) NOT NULL
        ,`update_user` varchar(255) NOT NULL
        ,PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    /*------------------------------------------
    --  Foreign Key Constraints               --
    ------------------------------------------*/

    ALTER TABLE `mover`          ADD CONSTRAINT `fk_mover_department_new`       FOREIGN KEY (`department_new_id`)   REFERENCES `department`     (`id`);
    ALTER TABLE `mover`          ADD CONSTRAINT `fk_mover_department_prev`      FOREIGN KEY (`department_prev_id`)  REFERENCES `department`     (`id`);

    ALTER TABLE `leaver`         ADD CONSTRAINT `fk_leaver_department`          FOREIGN KEY (`department_id`)       REFERENCES `department`     (`id`);
    ALTER TABLE `joiner`         ADD CONSTRAINT `fk_joiner_department`          FOREIGN KEY (`department_id`)       REFERENCES `department`     (`id`);

    ALTER TABLE `mover_app_mtm`  ADD CONSTRAINT `fk_mover_app_mtm_mover`        FOREIGN KEY (`mover_id`)            REFERENCES `mover`          (`id`) ON DELETE CASCADE;
    ALTER TABLE `mover_app_mtm`  ADD CONSTRAINT `fk_mover_app_mtm_application`  FOREIGN KEY (`application_id`)      REFERENCES `application`    (`id`);

    ALTER TABLE `mover_hdw_mtm`  ADD CONSTRAINT `fk_mover_hdw_mtm_mover`        FOREIGN KEY (`mover_id`)            REFERENCES `mover`          (`id`) ON DELETE CASCADE;
    ALTER TABLE `mover_hdw_mtm`  ADD CONSTRAINT `fk_mover_hdw_mtm_hardware`     FOREIGN KEY (`hardware_id`)         REFERENCES `hardware`       (`id`);

    ALTER TABLE `leaver_hdw_mtm` ADD CONSTRAINT `fk_leaver_hdw_mtm_leaver`      FOREIGN KEY (`leaver_id`)           REFERENCES `leaver`         (`id`) ON DELETE CASCADE;
    ALTER TABLE `leaver_hdw_mtm` ADD CONSTRAINT `fk_leaver_hdw_mtm_hardware`    FOREIGN KEY (`hardware_id`)         REFERENCES `hardware`       (`id`);

    ALTER TABLE `joiner_app_mtm` ADD CONSTRAINT `fk_joiner_app_mtm_joiner`      FOREIGN KEY (`joiner_id`)           REFERENCES `joiner`         (`id`) ON DELETE CASCADE;
    ALTER TABLE `joiner_app_mtm` ADD CONSTRAINT `fk_joiner_app_mtm_application` FOREIGN KEY (`application_id`)      REFERENCES `application`    (`id`);

    ALTER TABLE `joiner_hdw_mtm` ADD CONSTRAINT `fk_joiner_hdw_mtm_joiner`      FOREIGN KEY (`joiner_id`)           REFERENCES `joiner`         (`id`) ON DELETE CASCADE;
    ALTER TABLE `joiner_hdw_mtm` ADD CONSTRAINT `fk_joiner_hdw_mtm_hardware`    FOREIGN KEY (`hardware_id`)         REFERENCES `hardware`       (`id`);

    ALTER TABLE `email`          ADD CONSTRAINT `fk_email_joiner`               FOREIGN KEY (`joiner_id`)           REFERENCES `joiner`         (`id`) ON DELETE CASCADE;
    ALTER TABLE `email`          ADD CONSTRAINT `fk_email_mover`                FOREIGN KEY (`mover_id`)            REFERENCES `mover`          (`id`) ON DELETE CASCADE;
    ALTER TABLE `email`          ADD CONSTRAINT `fk_email_leaver`               FOREIGN KEY (`leaver_id`)           REFERENCES `leaver`         (`id`) ON DELETE CASCADE;

    COMMIT;

