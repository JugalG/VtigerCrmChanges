//triggers created durinig initial testing

//insert trigger
DELIMITER $$
CREATE TRIGGER vtiger_to_authorizer_trigger
AFTER UPDATE ON vtiger.vtiger_users
FOR EACH ROW
BEGIN
  DECLARE unique_id INT DEFAULT UNIX_TIMESTAMP();
  SET @email = NEW.email1;
  
  INSERT INTO authorizer.authorizer_users (id, email)
  VALUES (unique_id, @email);
END 
$$ DELIMITER ;


//delete trigger
DELIMITER $$
use vtiger;
CREATE TRIGGER vtiger_to_authorizer_delete_trigger
AFTER DELETE ON vtiger.vtiger_users
FOR EACH ROW
BEGIN
  SET @email = OLD.email1;
  
  DELETE FROM authorizer.authorizer_users
  WHERE email = @email;
END $$

DELIMITER ;