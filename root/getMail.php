<?php
$access_token=$_GET['access_token'];
//echo var_dump($access_token);
?>

<script src="https://unpkg.com/@authorizerdev/authorizer-js@1.1.2/lib/authorizer.min.js"></script>
<script>
    const authorizerRef = new authorizerdev.Authorizer({
       // authorizerURL: 'https://authorizer-production-8fd1.up.railway.app/',
       // redirectURL: window.location.origin,
        //clientID: 'dbc67082-2100-4129-94ad-ae7b1afae815',
         authorizerURL: 'http://192.168.50.161:8080',
         redirectURL: 'http://192.168.50.189',
        clientID: '905ff253-87f0-498d-abba-87808718f6f6',
    });
    async function token2mail(access_token) {
        const user = await authorizerRef.getProfile({
            Authorization: `Bearer ${access_token}`,
        });
        if(!user.id){
                window.alert("Login error, please login again");
                window.location.replace("http://192.168.50.170/demo.html");
        }
        else{
                window.location.replace("http://192.168.50.170/getDbValues.php?id="+user.id);


        }
//        console.log(user);
//      console.log(user.id);
/*      user.then(function(result) {
                console.log(result); // "Some User token"
        });*/
        // return user.PromiseResult;
/*        if (user) {
            // console.log(user);
            // var tmp =user.email;
            // console.log("mail from func: "+tmp);
            // return tmp;
        } else {
            alert("prob");
        }
  */      // console.log("i am tmp1: "+tmp1);
}
// token2mail("eyJhbGciOiJ1NiIsInR5cCI6IkpXVCJ9.eyJhbGxvd2VkX3JvbGVzIjpbInVzZXIiXSwiYXVkIjoiOTA1ZmYyNTMtODdmMC00OThkLWFiYmEtODc4MDg3MThmNmY2IiwiZXhwIjoxNjc0ODI1MjI1LCJpYXQiOjE2NzQ4MjM0MjUsImlzcyI6Imh0dHA6Ly8xOTIuMTY4LjUwLjE2MTo4MDgwIiwi>
        token2mail('<?php echo$_GET['access_token'];?>');
// console.log('<?php echo$_GET['access_token'];?>');
//      window.location.replace('http://192.168.50.189');
//    console.log(token2mail('<?php echo$_GET['access_token'];?>'));
    // document.cookie =encodeURIComponent("mail") + '=' + encodeURIComponent(mail);
    // alert(mail);


</script>
<?php
//header('Location: http://192.168.50.189');


?>
