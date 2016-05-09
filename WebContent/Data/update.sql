ALTER TABLE itemdescr
DROP FOREIGN KEY itemmap_ibfk_1;

ALTER TABLE `itemdescr` MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `itemmap`
  ADD CONSTRAINT `itemmap_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `itemdescr` (`ItemId`);
