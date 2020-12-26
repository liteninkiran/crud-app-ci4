
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
    SET AUTOCOMMIT = 0;
    START TRANSACTION;
    SET time_zone = "+00:00";

    USE `jml`;

    INSERT INTO `application` (`id`, `application`, `application_owner_name`, `application_owner_email`, `create_date`, `update_date`, `create_user`, `update_user`) VALUES
    (1, 'Microsoft Office', 'Jeff', 'msoffice@ias.com', '2020-12-26 16:03:03', '2020-12-26 16:03:03', 'liten', 'liten'),
    (2, 'Microsoft SQL Server Management Studio', 'Dave', 'mis@ias.com', '2020-12-26 16:03:25', '2020-12-26 16:03:25', 'liten', 'liten'),
    (3, 'Power BI', 'Diane', 'mis@ias.com', '2020-12-26 16:03:39', '2020-12-26 16:03:39', 'liten', 'liten');

    INSERT INTO `department` (`id`, `department`, `create_date`, `update_date`, `create_user`, `update_user`) VALUES
    (1, 'IT', '2020-12-26 16:02:24', '2020-12-26 16:02:24', 'liten', 'liten'),
    (2, 'Customer Service', '2020-12-26 16:02:31', '2020-12-26 16:02:31', 'liten', 'liten'),
    (3, 'Finance', '2020-12-26 16:02:36', '2020-12-26 16:02:36', 'liten', 'liten'),
    (4, 'HR', '2020-12-26 16:02:41', '2020-12-26 16:02:41', 'liten', 'liten');

    INSERT INTO `hardware` (`id`, `hardware`, `create_date`, `update_date`, `create_user`, `update_user`) VALUES
    (1, 'Mouse', '2020-12-26 16:01:51', '2020-12-26 16:01:51', 'liten', 'liten'),
    (2, 'Keyboard', '2020-12-26 16:01:58', '2020-12-26 16:01:58', 'liten', 'liten'),
    (3, 'Laptop', '2020-12-26 16:02:04', '2020-12-26 16:02:04', 'liten', 'liten'),
    (4, 'USB Device', '2020-12-26 16:02:17', '2020-12-26 16:02:17', 'liten', 'liten'),
    (5, 'Mobile Phone', '2020-12-26 16:04:40', '2020-12-26 16:04:40', 'liten', 'liten');

    COMMIT;
