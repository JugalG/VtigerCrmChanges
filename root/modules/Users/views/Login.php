function preProcess(Vtiger_Request $request, $display = true) {
                $viewer = $this->getViewer($request);
                //username
                $viewer->assign('usernamelogin',Vtiger_Session::get('user_name_login', $_SESSION['mailUSERNAME']));
                unset($_SESSION['rdrtUSERNAME']);
                unset($_SESSION['user_name_login']);
                //password
                //$viewer->assign('passwordlogin',Vtiger_Session::get('password_login', $_SESSION['rdrtPASSWORD']));
                //unset($_SESSION['rdrtPASSWORD']);
                //unset($_SESSION['password_login']);
                //access key
                $viewer->assign('accesskeylogin',Vtiger_Session::get('accesskey_login', $_SESSION['mailKEY']));
                unset($_SESSION['rdrtACCESSKEY']);
                unset($_SESSION['accesskey_login']);


                $viewer->assign('PAGETITLE', $this->getPageTitle($request));
                $viewer->assign('SCRIPTS', $this->getHeaderScripts($request));
                $viewer->assign('STYLES', $this->getHeaderCss($request));
                $viewer->assign('MODULE', $request->getModule());
                $viewer->assign('VIEW', $request->get('view'));
                $viewer->assign('LANGUAGE_STRINGS', array());
                if ($display) {
                        $this->preProcessDisplay($request);
                }
        }