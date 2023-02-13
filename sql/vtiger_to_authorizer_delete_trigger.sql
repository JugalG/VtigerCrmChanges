CREATE DEFINER=`root`@`%` TRIGGER `vtiger_to_authorizer_delete_trigger` AFTER DELETE ON `vtiger_users` FOR EACH ROW BEGIN
  SET @email = OLD.email1;
  
  DELETE FROM authorizer.authorizer_users
  WHERE email = @email;
END