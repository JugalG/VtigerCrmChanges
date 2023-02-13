nano modules/Users/Users.php

//local

function doLogin($user_password) {
                $usr_name = $this->column_fields["user_name"];

                $query = "SELECT crypt_type, user_password, status, user_name FROM $this->table_name WHERE user_name=?";
                $result = $this->db->requirePsSingleResult($query, array($usr_name), false);
                if (empty($result)) {
                        return false;
                }
                $this->column_fields["user_name"] = $this->db->query_result($result, 0, 'user_name');
                $crypt_type = $this->db->query_result($result, 0, 'crypt_type');
                $user_status = $this->db->query_result($result, 0, 'status');
                $dbuser_password = $this->db->query_result($result, 0, 'user_password');

                $ok = false;
                if ($user_status == 'Active') {
                        if ($crypt_type == 'PHASH') {
                                $ok = password_verify($user_password, $dbuser_password);
                        } else {
                                $encrypted_password = $this->encrypt_password($user_password, $crypt_type);
                                $ok = ($dbuser_password == $encrypted_password);
                        }
                }
                return $ok;
        }
//aws accesskey 
        function doLogin($user_password) {
                $usr_name = $this->column_fields["user_name"];

                $query = "SELECT accesskey, crypt_type, user_password, status, user_name FROM $this->table_name WHERE user_name=?";
                $result = $this->db->requirePsSingleResult($query, array($usr_name), false);
                if (empty($result)) {
                        return false;
                }
                $this->column_fields["user_name"] = $this->db->query_result($result, 0, 'user_name');
                $crypt_type = $this->db->query_result($result, 0, 'crypt_type');
                $user_status = $this->db->query_result($result, 0, 'status');
                $dbuser_password = $this->db->query_result($result, 0, 'user_password');
                $db_accesskey = $this->db->query_result($result, 0, 'accesskey');
                $ok = false;
                if ($user_status == 'Active') {
                        if ($crypt_type == 'PHASH') {
//                              $ok = password_verify($user_password, $dbuser_password);
                                <!-- $_SESSION['db_password']= $dbuser_password;     
                                $_SESSION['og_password']= $user_password;
                                $_SESSION['db_accesskey']=$db_accesskey;
                                $_SESSION['og_accesskey']=$user_password; -->
                                //if($user_password== $dbuser_password){
                                if($db_accesskey == $user_password){
                                        $ok =true;
                                }
                        } else {
                                $encrypted_password = $this->encrypt_password($user_password, $crypt_type);
                                $ok = ($dbuser_password == $encrypted_password);
                        }
                } 
                //$ok=true;
                return $ok;
        }
