<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_users')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
        <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.info')?></h4>
                    </div>
                    <div class="card-body">
                        <!---->

                        <div class="alert alert-success alert-alt"role="alert" id="response_success">
                            <strong>Success!</strong> Message has been sent.
                        </div>
                        <div class="alert alert-info alert-alt"role="alert" id="response_info">
                            <strong>Info!</strong> You have got 5 new email.
                        </div>
                        <div class="alert alert-warning alert-alt "role="alert" id="response_warning">
                            <strong>Warning!</strong> Something went wrong. Please check.
                        </div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger">
                            <strong>Error!</strong> Message Sending failed.
                        </div>

                        <!---->
                        <div class="basic-form">
                            <form method="post" id="create_user">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><?=lang('UserLang.user_id')?></label>
                                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="<?=lang('UserLang.user_id')?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('UserLang.username')?></label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="<?=lang('UserLang.username')?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?=lang('UserLang.password')?></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="<?=lang('UserLang.password')?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label><?=lang('UserLang.phonenumber')?></label>
                                        <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="<?=lang('UserLang.phonenumber')?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?=lang('UserLang.gender')?></label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="1"><?=lang('UserLang.male')?></option>
                                            <option value="2"><?=lang('UserLang.female')?></option>
                                            <option value="3"><?=lang('UserLang.other')?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?=lang('UserLang.group')?></label>
                                        <select class="custom-select" id="group_id" name ="group_id">
                                            <?php if (isset($list_group) && count($list_group)) :
                                                foreach ($list_group as $key => $item) : ?>
                                                    <option value="<?=$item->group_id?>"><?=$item->group_name?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><?=lang('UserLang.user_status')?></label>
                                        <select id="user_status" class="form-control"name ="user_status">
                                            <option value="1"><?=lang('AppLang.active')?></option>
                                            <option value="2"><?=lang('AppLang.inactive')?></option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" id="btn_submit" name="create_user" class="btn btn-primary "><?=lang('AppLang.save')?></button>
                                <button type="button" id="btn_cancel" class="btn btn-warning"><?=lang('AppLang.cancel')?></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!---->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?=lang('AppLang.list')?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col"><?=lang('UserLang.user_id')?></th>
                                <th scope="col"><?=lang('UserLang.username')?></th>
                                <th scope="col"><?=lang('UserLang.gender')?></th>
                                <th scope="col">Email</th>
                                <th scope="col"><?=lang('UserLang.phonenumber')?></th>
                                <th scope="col"><?=lang('UserLang.group')?></th>
                                <th scope="col"><?=lang('UserLang.user_status')?></th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!---->
            </div>
        </div>
    </div>
</div>
<!---->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallModalLabel"><?=lang('AppLang.notify')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=lang('AppLang.are_you_sure')?>
            </div>
            <div class="modal-footer">
                <button type="button" id="modal-btn-no" class="btn btn-white" data-dismiss="modal"><?=lang('AppLang.no')?></button>
                <button type="button" id="modal-btn-yes" class="btn btn-primary"><?=lang('AppLang.yes')?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userFunctionModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="smallModalLabel"><?=lang('AppLang.page_user_function')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_userFunction">
                <div class="modal-body">
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border table-hover verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=lang('FunctionLang.function_name')?></th>
                                        <th scope="col"><?=lang('FunctionLang.view')?></th>
                                        <th scope="col"><?=lang('FunctionLang.add')?></th>
                                        <th scope="col"><?=lang('FunctionLang.edit')?></th>
                                        <th scope="col"><?=lang('FunctionLang.delete')?></th>
                                    </tr>
                                    </thead>
                                    <tbody class="data_table">

                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('AppLang.close')?></button>
                    <input id="userFunctionUpdate" type="submit" class="btn btn-primary" value="<?=lang('AppLang.save')?>">
                </div>
            </form>
        </div>
    </div>
</div>
<!---->

<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<link href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>

<script>
    jQuery(document).ready(function($) {

        function reset_form(){
            $('#user_id').val('');
            $('#username').val('');
            $('#password').val('');
            $('#gender').val(1);
            $('#email').val('');
            $('#phonenumber').val('');
            $('#user_status').val(1);
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","create_user");
            $('#password').prop("required", true);
            $('#user_id').prop("readonly", false);
        };

        var userDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/user/user_ajax',
                'data': function (data) {
                }
            },
            'columns': [
                {data: 'user_id'},
                {data: 'username'},
                {data: 'gender'},
                {data: 'email'},
                {data: 'phonenumber'},
                {data: 'group_id'},
                {data: 'user_status'},
                {data: 'active'}
            ]
        });


        $("#create_user").on('submit',function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            var name = $("#btn_submit").attr("name");
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>dashboard/user/"+name,
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
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('user_id') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/user/delete_user',
                    type: 'POST',
                    data: { user_id:recipient },
                    dataType:"json",
                    success:function (data) {
                        if(data[0]==0){
                            $("#response_success").show('fast');
                            $("#response_success").html(data[1]);
                            userDataTable.ajax.reload();
                        }else {
                            $("#response_danger").show('fast');
                            $("#response_danger").html(data[1]);
                        }
                    },
                    error:function (data) {
                        $("#response_danger").show('fast');
                        $("#response_danger").html(data);
                    }
                });
            });
        });

        $("#btn_cancel").click(function(){
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            //
            reset_form();
        });
        $("#data-table").on('click', '.update', function(event){
            var user_id =  $(this).attr("user_id");
            var username =  $(this).attr("username");
            var gender =  $(this).attr("gender");
            var email =  $(this).attr("email");
            var phonenumber =  $(this).attr("phonenumber");
            var group_id =  $(this).attr("group_id");
            var user_status =  $(this).attr("user_status");
            $('#user_id').val(user_id);
            $('#username').val(username);
            $('#gender').val(gender);
            $('#email').val(email);
            $('#phonenumber').val(phonenumber);
            $('#user_status').val(user_status);
            $('#group_id').val(group_id);
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","update_user");
            $('#password').prop("required", false);
            $('#user_id').prop("readonly", true);
        });
        $("#data-table").on('click', '.user_function', function(event){
            var user_id =  $(this).attr("user_id");
            $.ajax({
                url: '<?= base_url() ?>dashboard/userfunction',
                type: 'post',
                data: {user_id: user_id},
                success: function(response){
                    // Add response in Modal body
                    $('.data_table').html(response);
                    // Display Modal
                    $('#userFunctionModal').modal('show');
                }
            });
        });

        $('#form_userFunction').on('submit', function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>dashboard/userfunction/update",
                method:"POST",
                data:formData,
                dataType:"json",
                success:function (data) {
                    if(data[0]==0){
                        $('#userFunctionModal').modal('toggle');
                        $("#response_success").show('fast');
                        $("#response_success").html(data[1]);
                    }else {
                        $("#response_danger_modal").show('fast');
                        $("#response_danger_modal").effect("shake");
                        $("#response_danger_modal").html(data);
                    }
                },
                error:function (data) {
                    $("#response_danger_modal").show('fast');
                    $("#response_danger_modal").effect("shake");
                    $("#response_danger_modal").html(data);
                }
            });

        });
        $('#userFunctionModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
        });
    });
</script>

