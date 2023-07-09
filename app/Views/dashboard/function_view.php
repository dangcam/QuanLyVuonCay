<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_functions')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?=lang('AppLang.page_title_functions')?></h4>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add</a>
                    </div>
                    <div class="card-body">
                        <!---->
                        <div class="alert alert-success alert-alt"role="alert" id="response_success">
                            <strong>Success!</strong> Message has been sent.                        </div>
                        <div class="alert alert-info alert-alt"role="alert" id="response_info">
                            <strong>Info!</strong> You have got 5 new email.                        </div>
                        <div class="alert alert-warning alert-alt "role="alert" id="response_warning">
                            <strong>Warning!</strong> Something went wrong. Please check.                        </div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger">
                            <strong>Error!</strong> Message Sending failed.                        </div>
                        <!---->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?=lang('FunctionLang.function_id')?></th>
                                    <th scope="col"><?=lang('FunctionLang.function_name')?></th>
                                    <th scope="col"><?=lang('FunctionLang.function_status')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('FunctionLang.function_id')?></th>
                                    <th><?=lang('FunctionLang.function_name')?></th>
                                    <th><?=lang('FunctionLang.function_status')?></th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>



                <!---->
            </div>
        </div>
    </div>
</div>

<!--<script src="vendor/jquery/jquery.min.js"></script>-->

<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/moment/moment.min.js"></script>


<script src="vendor/bootstrap-tree/js/bootstrap-treeview.js"></script>
<link href="vendor/bootstrap-tree/css/bootstrap-treeview.css" rel="stylesheet">

<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<link href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>


<!---->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Group</h5>
                <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><?=lang('FunctionLang.function_id')?></label>
                        <input type="text" name="function_id" class="form-control" id="function_id" required placeholder="<?=lang('FunctionLang.function_id')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('FunctionLang.function_name')?></label>
                        <input type="text" name="function_name" class="form-control" id="function_name" required placeholder="<?=lang('FunctionLang.function_name')?>">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><?=lang('FunctionLang.function_status')?></label>
                        <select id="function_status" class="form-control"name ="function_status">
                            <option value="1"><?=lang('AppLang.active')?></option>
                            <option value="2"><?=lang('AppLang.inactive')?></option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=lang('AppLang.close')?></button>
                    <input id="add_edit" type="submit" class="btn btn-primary" name="" value="<?=lang('AppLang.save')?>">
                </div>
            </form>
        </div>
    </div>
</div>

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
<!---->

<script>
    jQuery(document).ready(function($) {
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/function/function_ajax',
                'data': function (data) {
                }
            },
            'columns': [
                {data: 'function_id'},
                {data: 'function_name'},
                {data: 'function_status'},
                {data: 'active'}
            ]
        });

        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var function_id = button.data('function_id')
            var function_name = button.data('function_name')
            var group_parent = button.data('group_parent')
            var function_status = button.data('function_status')
            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#function_id').val(function_id);
            $('#function_name').val(function_name);
            $('#function_status').val(function_status);
            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('FunctionLang.add_function')?>");
                $('#function_id').prop("readonly",false);
                $('#function_status').val(1);
            }else {
                $('#myModalLabel').text("<?=lang('FunctionLang.edit_function')?>");
                $('#function_id').prop("readonly",true);
                $('#function_status').val(function_status);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('function_id') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/function/delete_function',
                    type: 'POST',
                    data: { function_id:recipient },
                    dataType:"json",
                    success:function (data) {
                        if(data[0]==0){
                            $("#response_success").show('fast');
                            $("#response_success").html(data[1]);
                            ajaxDataTable.ajax.reload();
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

        $('#form_id').on('submit', function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            $("#response_danger_modal").hide('fast');
            var name = $("#add_edit").attr("name");
            var formData = $(this).serialize();
            $.ajax({
                url: "<?= base_url() ?>dashboard/function/"+name+"_function",
                method: "POST",
                data: formData,
                dataType: "json",
                success: function (data) {
                    if (data[0]==0) {
                        $("#response_success").show('fast');
                        $("#response_success").html(data[1]);
                        //$('#myModal').modal('hide');
                        $('#myModal').modal('toggle');
                        ajaxDataTable.ajax.reload();
                    } else {
                        $("#response_danger_modal").show('fast');
                        $("#response_danger_modal").html(data[1]);
                    }
                },
                error: function (data) {
                    $("#response_danger_modal").show('fast');
                    $("#response_danger_modal").html(data);
                }
            });
        });
    });
</script>

