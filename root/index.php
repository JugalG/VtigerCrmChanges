include_once 'config.php';
include_once 'include/Webservices/Relation.php';

include_once 'vtlib/Vtiger/Module.php';
include_once 'includes/main/WebUI.php';

$webUI = new Vtiger_WebUI();
$webUI->process(new Vtiger_Request($_REQUEST, $_REQUEST));
echo var_dump($_SESSION['rdrtUSERNAME']);
echo var_dump($_SESSION['rdrtACCESSKEY']);
echo var_dump($username_session);
//echo var_dump($webVarKey);




