CREATE DEFINER=`root`@`%` TRIGGER `vtiger_to_authorizer_trigger` AFTER UPDATE ON `vtiger_users` FOR EACH ROW BEGIN
  DECLARE unique_id INT DEFAULT UNIX_TIMESTAMP();
  SET @email = NEW.email1;
  
  INSERT INTO authorizer.authorizer_users (`key`,id, email,signup_methods,roles,created_at)
  VALUES (unique_id,unique_id, @email,"basic_auth","user",unique_id);
END