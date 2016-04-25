CREATE TABLE `purchasereq`.`Mapping` ( `ReqId` VARCHAR(8) NOT NULL , `ReqNo` VARCHAR(8) NOT NULL UNIQUE , PRIMARY KEY (`ReqId`(8))) ENGINE = InnoDB;

CREATE TABLE `purchasereq`.`Vendor` ( `VendorCode` VARCHAR(8) NOT NULL , `VendorName` VARCHAR(30) NOT NULL , `VendorAddress` TEXT NOT NULL , PRIMARY KEY (`VendorCode`(8))) ENGINE = InnoDB;

CREATE TABLE `purchasereq`.`JobCode` ( `JobCode` VARCHAR(8) NOT NULL , `Descr` VARCHAR(30) NOT NULL , `Budget` DECIMAL NOT NULL , PRIMARY KEY (`JobCode`(8))) ENGINE = InnoDB;