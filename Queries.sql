--create user_table table
CREATE TABLE `user_list` (
  `user` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`user`)
);

--adding user
INSERT INTO `angeliaforos`.`user_list` (`user`) VALUES ('manoj');

--creating messages_table table
CREATE TABLE `messages_table` (
	`serial` INT(5) NOT NULL AUTO_INCREMENT,
	`sender` VARCHAR(30) NOT NULL,
	`reciever` VARCHAR(30) NOT NULL,
	`senttime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`sentmessage` TEXT NOT NULL,
	PRIMARY KEY (`serial`),
	INDEX `FK_messages_table_user_list` (`sender`),
	INDEX `FK_messages_table_user_list_2` (`reciever`),
	CONSTRAINT `FK_messages_table_user_list` FOREIGN KEY (`sender`) REFERENCES `user_list` (`user`) ON UPDATE CASCADE,
	CONSTRAINT `FK_messages_table_user_list_2` FOREIGN KEY (`reciever`) REFERENCES `user_list` (`user`) ON UPDATE CASCADE
);

--inserting into messages table
INSERT INTO `Angeliaforos`.`messages_table` (`sender`,`reciever`,`sentmessage`)
    VALUES(current_user, selected_contact, "text message");


--retrieve messages from table
SELECT `sender`,`sentmessage` FROM  `Angeliaforos`.`messages_table` 
    WHERE(`sender` = current_user AND `reciever` = selected_contact) 
    OR (`sender` = selected_contact AND `reciever` = current_user) 
        ORDER BY `senttime` LIMIT 50;
