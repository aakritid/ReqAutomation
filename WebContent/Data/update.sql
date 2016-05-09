ALTER TABLE itemdescr
DROP FOREIGN KEY itemmap_ibfk_1;

ALTER TABLE `itemdescr` MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `itemmap`
  ADD CONSTRAINT `itemmap_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `itemdescr` (`ItemId`);
  
  ALTER TABLE `requistion` ADD `RefQuote` VARCHAR(20) NOT NULL AFTER `ReqNo`, ADD `TotalCost` DECIMAL NOT NULL AFTER `RefQuote`;
  
  ALTER TABLE `itemmap` CHANGE `ItemList` `ReqId` INT(11) NOT NULL;
  
  drop table `reqitemmap`;
  drop TABLE `mapping`;
  
  CREATE TABLE `purchasereq`.`Approval` ( `ReqId` INT NOT NULL , `AppDen` BOOLEAN NOT NULL , `Reason` TEXT NOT NULL ) ENGINE = InnoDB;
  ALTER TABLE approval add FOREIGN KEY (ReqId) REFERENCES purdets(id);
