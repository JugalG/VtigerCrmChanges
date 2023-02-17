//the following snippets are relative code snippets
//following codes are the loginForm html code and the jquery code for the same login form
//change the input type for login form for all values -> hidden
//forgot password form and jquery can be eliminated as we do not want the same.
//in the css code for login form, hide the form contents and itself entirely using display: none;
       
        <span class="app-nav"></span>
        <div class="container-fluid loginPageContainer">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="loginDiv widgetHeight">
                                <img class="img-responsive user-logo" src="layouts/v7/resources/Images/vtiger.png">
				<div>
					<span class="{if !$ERROR}hide{/if} failureMessage" id="validationMessage">{$MESSAGE}</span>
					<span class="{if !$MAIL_STATUS}hide{/if} successMessage">{$MESSAGE}</span>
				</div>

				<div id="loginFormDiv">
					<form name ="LoginF" id="LoginF"  class="form-horizontal" method="POST" action="index.php">
                                                <input type="hidden" name="module" value="Users"/>
                                                <input type="hidden" name="action" value="Login"/>
                                                <div class="group">
                                                        <input id="username" type="text" name="username" value="{$usernamelogin}" >
                                                        <span class="bar"></span>
                                                        <label>Username</label>
                                                </div>
                                                <div class="group">
                                                        <input id="password" type="text" name="password" value ="{$accesskeylogin}" >
                                                        <span class="bar"></span>
                                                        <label>Password</label>
                                                </div>
                                                <div class="group">
                                                        <button type="button" id="submitBtn" class="button buttonBlue">Sign in</button><br>
                                                        <a class="forgotPasswordLink" style="color: #15c;">forgot password?</a>
                                                </div>
                                        </form>
				</div>
				<script>
					jQuery('#LoginF').submit();
				</script>






                <script>

                        jQuery('#LoginF').submit();
                         jQuery(document).ready(function () {
                                var validationMessage = jQuery('#validationMessage');
                                var forgotPasswordDiv = jQuery('#forgotPasswordDiv');

                                var loginFormDiv = jQuery('#loginFormDiv');
                                loginFormDiv.find('#password').focus();



                                 var username = loginFormDiv.find('#username').val();
                                 var password = jQuery('#password').val();
                                 var result = true;
                                 var errorMessage = '';
                                 alert("ncie");
                                 jQuery('#LoginF').submit();

                                       if (username === '') {
                                                errorMessage = 'Please enter valid username';
                                                result = false;
                                        } else if (password === '') {
                                                errorMessage = 'Please enter valid password';
                                                result = false;
                                        }
                                        if (errorMessage) {
                                                validationMessage.removeClass('hide').text(errorMessage);
                                        }
                                        return result;
                                });




                                forgotPasswordDiv.find('button').on('click', function () {
