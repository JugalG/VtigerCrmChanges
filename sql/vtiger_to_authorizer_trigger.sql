CREATE DEFINER=`root`@`%` TRIGGER `vtiger_to_authorizer_trigger` AFTER UPDATE ON `vtiger_users` FOR EACH ROW BEGIN
 SET @email = NEW.email1;
 SET @unique_id = CONCAT(UNIX_TIMESTAMP(), '-' ,UUID());
 SET @createdAt = UNIX_TIMESTAMP();
 SET @givenName = CONCAT(NEW.first_name, ' ' ,NEW.last_name);
 SET @phoneMobile = NEW.phone_mobile;
 
	 IF NEW.is_admin = 'on' THEN
		SET @role1 = 'admin';
	  ELSE
		SET @role1 = 'user';
	 END IF;
 
IF NOT EXISTS (SELECT 1 FROM authorizer.authorizer_users WHERE email = @email) THEN
	INSERT INTO authorizer.authorizer_users (`key`,id, email,signup_methods,roles,created_at,given_name,family_name,nickname,phone_number)
	VALUES (@unique_id,@unique_id, @email,"basic_auth",@role1,@createdAt,@givenName,@givenName,@givenName,@phoneMobile);
ELSE 
	UPDATE authorizer.authorizer_users
    SET email=NEW.email1,roles=@role1,given_name=@givenName,family_name =@givenName,nickname=@givenName,phone_number=@phoneMobile
    WHERE email = @email;  

END IF;

END