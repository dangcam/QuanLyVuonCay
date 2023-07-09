<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=lang('AppLang.page_title')?></title>
    <base href="<?=base_url()?>"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <style>
        #response_danger{display: none}
    </style>
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4"><?=lang('UserLang.sign_in_your_account')?></h4>
                                <div class="alert alert-danger alert-alt" role="alert" id="response_danger">
                                    <strong>Error!</strong> Message Sending failed.
                                </div>
                                <form method="post" id="login">
                                    <div class="form-group">
                                        <label><strong><?=lang('UserLang.user_id')?></strong></label>
                                        <input type="text" name="user_id" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label><strong><?=lang('UserLang.password')?></strong></label>
                                        <input type="password" name="password" class="form-control" value="" required>
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" name="remember">
                                                <label class="form-check-label" for="basic_checkbox_1"><?=lang('UserLang.remember_me')?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="#"><?=lang('UserLang.forgot_password')?></a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block"><?=lang('UserLang.sign_in')?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="js/quixnav-init.js"></script>
<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $("#login").on('submit',function (event) {
            event.preventDefault();
            $("#response_danger").hide('fast');
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>login_ajax",
                method:"POST",
                data:formData,
                dataType:"json",
                success:function (data) {
                    if(data[0]==0){
                        window.location.href = '<?php echo base_url() ?>dashboard';
                        //alert(formData);
                    }else {
                        $("#response_danger").show('fast');
                        $("#response_danger").effect("shake");
                        $("#response_danger").html(data[1]);
                    }
                },
                error:function (data) {
                    $("#response_danger").show('fast');
                    $("#response_danger").effect("shake");
                    $("#response_danger").html(data);
                }
            });

        });
    });
</script>


</body>

</html>