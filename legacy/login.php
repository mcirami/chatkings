<?php

$domain = $_SERVER["HTTP_HOST"];


$webroot = getWebRoot();


$user = new \LeadMax\TrackYourStats\User\User;


//checks if the User is already logged in
if ($user->is_loggedin())
{
    if ($user->verify_login_session())
    {
        send_to('dashboard');
    }
}


$user->checkLoginAttempts();


//POST to login.php (self),
//if count is < 5, continue, else, too many attempts for today
if (isset($_POST['button']) && $user->count < 5)
{
    $user_name = $_POST['txt_uname_email'];
    $email     = $_POST['txt_uname_email'];
    $password  = $_POST['txt_password'];

    $result = $user->login($user_name, $email, $password);

    if ($result == \LeadMax\TrackYourStats\User\Login::RESULT_SUCCESS)
    {
        if (isset($_GET["redirectUri"]))
        {
            send_to(urldecode($_GET["redirectUri"]));
        }
        else
        {
            send_to('dashboard');
        }

    }
    else
    {
        $user->badLoginAttempt();

        if ($result == \LeadMax\TrackYourStats\User\Login::RESULT_INVALID_CRED)
        {
            $error = "Wrong Details ! <p>You have {$user->count} / 5 login attempts remaining. </p>";
        }
        else
        {
            if ($result == \LeadMax\TrackYourStats\User\Login::RESULT_BANNED)
            {
                $error = "This account has been banned. Login attempt has been logged and an administrator will be notified. ";
            }
        }


    }
}
else
{
    if (isset($_POST["button"]))
    {

        $error = "You have {$user->count} / 5 login attempts remaining. Please wait until tomorrow or contact an admin to reset your login attempt and/or password.";

    }
}
?>


  <!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">


    <link rel = "shortcut icon" type = "image/ico" href = "<?= \LeadMax\TrackYourStats\System\Company::loadFromSession()->getImgDir() ?>/favicon.ico"/>
    <link rel = "shortcut icon" type = "image/ico" href = "<?= \LeadMax\TrackYourStats\System\Company::loadFromSession()->getImgDir() ?>/favicon.ico"/>

    <link rel = "stylesheet" type = "text/css" href = "<?php echo $webroot; ?>css/default.css"/>
    <link rel = "stylesheet" media = "screen" type = "text/css"
          href = "<?php echo $webroot; ?>css/company.php"/>
    <link href = "<?php echo $webroot; ?>css/responsive_table.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo $webroot; ?>css/drawer.min.css" rel = "stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo $webroot; ?>css/font-awesome.min.css">
    <link rel = "stylesheet" href = "<?php echo $webroot; ?>css/magic.min.css">
    <script type = "text/javascript" src = "<?php echo $webroot; ?>js/jquery_2.1.3_jquery.min.js"></script>
    <script type = "text/javascript" src = "<?php echo $webroot; ?>js/jscolor.min.js"></script>
    <script type = "text/javascript"
            src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script type = "text/javascript" src = "<?php echo $webroot; ?>js/main.js"></script>
    <title><?php echo \LeadMax\TrackYourStats\System\Company::loadFromSession()->getShortHand(); ?></title>
  </head>
<body style = "background-color:#EAEEF1;">

<div class = "white_box_outer login_page">

  <div class = "clear"></div>
  <div class="left_column">

  </div>
  <div class = "content_box value_span8 right_column">
    <div class = "com_acc">
      <div class = "logo">
        <a href = "<?php echo $webroot ?>"><img src = "<?= \LeadMax\TrackYourStats\System\Company::loadFromSession()->getImgDir() ?>/logo.png" alt = "<?php echo\LeadMax\TrackYourStats\System\Company::loadFromSession()->getShortHand(); ?>"
                                                title = "<?php echo\LeadMax\TrackYourStats\System\Company::loadFromSession()->getShortHand(); ?>"/></a>
      </div>
      <form method = "post" class="login_form">

        <div class = "left_con01">
          <div class = "heading_holder">
            <span class = "lft value_span9">Login to your account.</span>
          </div>
          <br/>
            <?php
            if (isset($error))
            {
                ?>
              <div class = "alert alert-danger" style = " padding-bottom:5px;">
                <i class = "glyphicon glyphicon-warning-sign"></i> &nbsp;<span
                    style = "color:red;"><?php echo $error; ?> !</span>
              </div>
                <?php
            }
            ?>
          <p>

            <input type = "text" name = "txt_uname_email" placeholder = "Enter Username"
                   value = "<?php echo $user->autoFillEmail; ?>"
                   required/>
          </p>

          <p>

            <input type = "password" name = "txt_password" placeholder = "Enter Password"
                   required/>
          </p>
          <p>
            <a class = "small_txt value_span10" style = "font-size:14px;float:left;" href = "aff_help.php">Forget Your Password?</a>
          </p>
          <span class = "btn_yellow btn_wrap">
            <input type = "submit" name = "button"
                   class = "value_span3-1 value_span2 value_span1-2"
                   value = "Login"/></span>


          <br/>
        </div>
      </form>
    </div><!-- content_box -->
  </div><!-- white_box_outer -->

<?php include 'footer.php'; ?>