<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_worker')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
        <!---->
                <div class="card">
                    <div class="card-body">
                        <!---->
                        <div class="alert alert-success alert-alt"role="alert" id="response_success">
                        </div>
                        <div class="alert alert-info alert-alt"role="alert" id="response_info">
                        </div>
                        <div class="alert alert-warning alert-alt "role="alert" id="response_warning">
                        </div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger">
                        </div>

                        <!---->
                        <div class="basic-form">
                            <form method="post" id="add_worker">
                               
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.worker_id')?></label>
                                        <input type="text" name="worker_id" id="worker_id" class="form-control" placeholder="<?=lang('WorkerLang.worker_id')?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.worker_name')?></label>
                                        <input type="text" name="worker_name" id="worker_name" class="form-control" placeholder="<?=lang('WorkerLang.worker_name')?>" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.worker_birthyear')?></label>
                                        <input type="text" name="worker_birthyear" id="worker_birthyear" class="form-control" placeholder="<?=lang('WorkerLang.worker_birthyear')?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.worker_year')?></label>
                                        <input type="text" name="worker_year" id="worker_year" class="form-control" placeholder="<?=lang('WorkerLang.worker_year')?>">
                                    </div>
									<div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.phone_number')?></label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="<?=lang('WorkerLang.phone_number')?>">
                                    </div>
									<div class="form-group col-md-3">
                                        <label><?=lang('WorkerLang.address')?></label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="<?=lang('WorkerLang.address')?>">
                                    </div>
                                </div>
                                <button type="submit" id="btn_submit" name="add_worker" class="btn btn-primary "><?=lang('AppLang.save')?></button>
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
                                <th scope="col"><?=lang('WorkerLang.worker_id')?></th>
                                <th scope="col"><?=lang('WorkerLang.worker_name')?></th>
                                <th scope="col"><?=lang('WorkerLang.worker_birthyear')?></th>
                                <th scope="col"><?=lang('WorkerLang.worker_year')?></th>
                                <th scope="col"><?=lang('WorkerLang.phone_number')?></th>
                                <th scope="col"><?=lang('WorkerLang.address')?></th>
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

<!---->

<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<link href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>

<script>
    jQuery(document).ready(function($) {

        function reset_form(){
            $('#worker_id').val('');
            $('#worker_year').val();
            $('#worker_name').val('');
            $('#worker_birthyear').val('');
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","add_worker");
            $('#worker_id').prop("readonly", false);
        };

        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/treeline/treeline_ajax',
                'data': function(data){
                    data.searchYear = $('#line_year').val();
                    data.searchGarden = $('#garden_id').val();
                }
            },
            'columns': [
                {data: 'worker_id'},
                {data: 'worker_name'},
                {data: 'worker_birthyear'},
                {data: 'worker_year'},
                {data: 'active'}
            ]
        });
        $('#line_year,#garden_id').change(function(){
            ajaxDataTable.draw();
        });
        $("#add_worker").on('submit',function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            var name = $("#btn_submit").attr("name");
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>dashboard/treeline/"+name,
                method:"POST",
                data:formData,
                dataType:"json",
                success:function (data) {
                    if(data[0]==0){
                        $("#response_success").show('fast');
                        $("#response_success").effect("shake");
                        $("#response_success").html(data[1]);
                        ajaxDataTable.ajax.reload();
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
            var recipient = button.data('worker_id') // Extract info from data-* attributes
            var line_year = $('#line_year').val();
            var garden_id = $('#garden_id').val();
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/treeline/delete_treeline',
                    type: 'POST',
                    data: { worker_id:recipient,line_year:line_year,garden_id:garden_id},
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

        $("#btn_cancel").click(function(){
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            //
            reset_form();
        });
        $("#data-table").on('click', '.update', function(event){
            var worker_id =  $(this).attr("worker_id");
            var worker_year =  $(this).attr("worker_year");
            var worker_name =  $(this).attr("worker_name");
            var worker_birthyear =  $(this).attr("worker_birthyear");
            $('#worker_id').val(worker_id);
            $('#worker_year').val(worker_year);
            $('#worker_name').val(worker_name);
            $('#worker_birthyear').val(worker_birthyear);
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","update_user");
            $('#worker_id').prop("readonly", true);
        });       

    });
</script>

