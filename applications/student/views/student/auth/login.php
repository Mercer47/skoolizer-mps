<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Skoolizer</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('assets/css/student/styles.css') ?>" rel="stylesheet"/>
    <style>
        @font-face {
            font-family: Nunito_regular;
            src: url(<?php echo base_url("assets/fonts/Nunito_regular.ttf"); ?>);
        }

        @font-face {
            font-family: Nunito-Light;
            src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }

        @font-face {
            font-family: Nunito-Semibold;
            src: url(<?php echo base_url("assets/fonts/Nunito-Light.ttf"); ?>);
        }

        @font-face {
            font-family: Questrial-Regular;
            src: url(<?php echo base_url("assets/fonts/Questrial-Regular.ttf"); ?>);
        }

        @font-face {
            font-family: RedhatR;
            src: url(<?php echo base_url("assets/fonts/RedhatR.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Medium;
            src: url(<?php echo base_url("assets/fonts/Rubik-Medium.ttf"); ?>);
        }

        @font-face {
            font-family: Montserrat-Medium;
            src: url(<?php echo base_url("assets/fonts/Montserrat-Medium.ttf"); ?>);
        }

        @font-face {
            font-family: Rubik-Regular;
            src: url(<?php echo base_url("assets/fonts/Rubik-Regular.ttf"); ?>);
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #reader {
            width: 600px;
        }

        #result {
            text-align: center;
            font-size: 1.5rem;
        }
    </style>

</head>
<body class="login-page-body">
<div class="col-md-12 col-xs-12 col-sm-12 login-page-logo-container">
    <img
            src="<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>"
            class="login-page-logo"
    />
</div>
<div class="col-md-12 col-xs-12 col-sm-12 login-page-school-name-container">
    <p class="login-page-school-name"><?php echo $this->config->item('schoolName') ?></p>
</div>
<div class="col-md-12 col-xs-12 col-sm-12 login-page-button-container">
    <form autocomplete="off" method="POST" action="<?php echo site_url('auth/signin') ?>">
        <input type="text" name="email" class="form-input" placeholder="Email" autocomplete="off" />
        <br/>
        <input type="password" name="password" class="form-input" placeholder="Password">
        <br/>
        <button class="login-page-button" id="scanner-btn">SIGN IN</button>
    </form>
    <p class="login-page-brand">By Skoolizer</p>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/firebase.js') ?>"></script>

</body>
</html>