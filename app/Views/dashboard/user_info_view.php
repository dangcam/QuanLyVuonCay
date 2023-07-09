<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_user_info')?></h4>
                </div>
            </div>
        </div>
        <!---->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="alert alert-success alert-alt"role="alert" id="response_success">
                        <strong>Success!</strong> Message has been sent.
                    </div>
                    <div class="alert alert-danger alert-alt" role="alert" id="response_danger">
                        <strong>Error!</strong> Message Sending failed.
                    </div>

                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show"><?=lang('AppLang.info')?></a>
                                </li>
                                <li class="nav-item"><a href="#change-password" data-toggle="tab" class="nav-link"><?=lang('AppLang.password')?></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="profile-settings" class="tab-pane fade active show">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <div class="basic-form">
                                                <form method="post" id="update_user">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label><?=lang('UserLang.username')?></label>
                                                            <input type="text" name="username" id="username" value="<?=isset($user) ? $user->username : ''; ?>"
                                                                   class="form-control" placeholder="<?=lang('UserLang.username')?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" name="email" id="email" value="<?=isset($user) ? $user->email : ''; ?>"
                                                                   class="form-control" placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label><?=lang('UserLang.phonenumber')?></label>
                                                            <input type="text" name="phonenumber" id="phonenumber" value="<?=isset($user) ? $user->phonenumber : ''; ?>"
                                                                   class="form-control" placeholder="<?=lang('UserLang.phonenumber')?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label><?=lang('UserLang.gender')?></label>
                                                            <select id="gender" name="gender" class="form-control">
                                                                <option <?=isset($user) && $user->gender==1 ? 'selected' : ''; ?> value="1"><?=lang('UserLang.male')?></option>
                                                                <option <?=isset($user) && $user->gender==2 ? 'selected' : ''; ?> value="2"><?=lang('UserLang.female')?></option>
                                                                <option <?=isset($user) && $user->gender==3 ? 'selected' : ''; ?> value="3"><?=lang('UserLang.other')?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="btn_submit"  class="btn btn-primary "><?=lang('AppLang.save')?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="change-password" class="tab-pane fade ">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Password Setting</h4>
                                            <div class="basic-form">
                                                    <form id="needs-validation-2" novalidate="" method="post">
                                                        <div class="form-group">
                                                            <label for="old_password"><?=lang('UserLang.old_password')?></label><br>
                                                            <input autocomplete="off" class="form-control" type="password" name="old_password"
                                                                   id="old_password" required="">
                                                            <div class="invalid-feedback">
                                                                <?=lang('AppLang.please_enter_information')?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="new_password"><?=lang('UserLang.new_password')?></label><br>
                                                            <?php echo form_password('new_password', '', 'class="form-control" autocomplete="off"
									 id="new_password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"'); ?>
                                                            <div class="invalid-feedback">
                                                                <?=lang('UserLang.password_hint')?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="new_password_confirmation"><?=lang('UserLang.new_password_confirmation')?></label><br>
                                                            <?php echo form_password('new_password_confirm', '', 'class="form-control" id="new_password_confirm" required="required" 
									data-bv-identical="true" data-bv-identical-field="new_password" autocomplete="off" '); ?>
                                                            <div class="invalid-feedback">
                                                                <?=lang('UserLang.pw_not_same')?>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="btn btn-success" value="<?=lang('AppLang.save')?>">
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!---->
    </div>
</div>

<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#update_user").on('submit',function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>dashboard/user/update_user",
                method:"POST",
                data:formData,
                dataType:"json",
                success:function (data) {
                    if(data[0]==0){
                        $("#response_success").show('fast');
                        $("#response_success").effect("shake");
                        $("#response_success").html(data[1]);
                        userDataTable.ajax.reload();
                        reset_form();
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

        var password = document.getElementById("new_password")
            , confirm_password = document.getElementById("new_password_confirm");
        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        //
        var form2 = document.getElementById("needs-validation-2");
        form2.addEventListener("submit", function(event) {
            event.preventDefault();
            if (form2.checkValidity() == false || password.value!=confirm_password.value) {
                event.stopPropagation();
            }else {
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                var formData = $(this).serialize();
                $.ajax({
                    url: "<?= base_url() ?>dashboard/user/change_password",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        if (data[0] == 0) {
                            $("#response_success").show('fast');
                            $("#response_success").effect("shake");
                            $("#response_success").html(data[1]);

                        } else {
                            $("#response_danger").show('fast');
                            $("#response_danger").effect("shake");
                            $("#response_danger").html(data[1]);
                        }
                    },
                    error: function (data) {
                        $("#response_danger").show('fast');
                        $("#response_danger").effect("shake");
                        $("#response_danger").html(data);
                    }
                });
            }
            form2.classList.add("was-validated");
        }, false);
    });
</script>