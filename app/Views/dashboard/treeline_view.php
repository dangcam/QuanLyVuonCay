<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_treeline')?></h4>
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
                            <form method="post" id="add_treeline">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label><?=lang('TreeLineLang.line_year')?></label>
                                        <select class="form-control" id="line_year" name="line_year">
                                            <?php
                                            $nowYear =2022;
                                            foreach (range(date('Y'), $nowYear) as $i) {
                                                echo "<option value=$i>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?=lang('TreeLineLang.garden_id')?></label>
                                        <select class="form-control" id="garden_id" name="garden_id">
                                            <?php if (isset($list_garden) && count($list_garden)) :
                                                foreach ($list_garden as $key => $item) : ?>
                                                    <option value="<?=$item->garden_id?>"><?=$item->garden_name?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TreeLineLang.line_id')?></label>
                                        <input type="text" name="line_id" id="line_id" class="form-control" placeholder="<?=lang('TreeLineLang.line_id')?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TreeLineLang.tree_live')?></label>
                                        <input type="text" name="tree_live" id="tree_live" class="form-control" placeholder="<?=lang('TreeLineLang.tree_live')?>" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TreeLineLang.tree_dead')?></label>
                                        <input type="text" name="tree_dead" id="tree_dead" class="form-control" placeholder="<?=lang('TreeLineLang.tree_dead')?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TreeLineLang.hole_empty')?></label>
                                        <input type="text" name="hole_empty" id="hole_empty" class="form-control" placeholder="<?=lang('TreeLineLang.hole_empty')?>">
                                    </div>
                                </div>
                                <button type="submit" id="btn_submit" name="add_treeline" class="btn btn-primary "><?=lang('AppLang.save')?></button>
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
                                <th scope="col"><?=lang('TreeLineLang.line_id')?></th>
                                <th scope="col"><?=lang('TreeLineLang.tree_live')?></th>
                                <th scope="col"><?=lang('TreeLineLang.tree_dead')?></th>
                                <th scope="col"><?=lang('TreeLineLang.hole_empty')?></th>
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
            $('#line_id').val('');
            $('#hole_empty').val();
            $('#tree_live').val('');
            $('#tree_dead').val('');
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","add_treeline");
            $('#line_id').prop("readonly", false);
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
                {data: 'line_id'},
                {data: 'tree_live'},
                {data: 'tree_dead'},
                {data: 'hole_empty'},
                {data: 'active'}
            ]
        });
        $('#line_year,#garden_id').change(function(){
            ajaxDataTable.draw();
        });
        $("#add_treeline").on('submit',function (event) {
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
            var recipient = button.data('line_id') // Extract info from data-* attributes
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
                    data: { line_id:recipient,line_year:line_year,garden_id:garden_id},
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
            var line_id =  $(this).attr("line_id");
            var hole_empty =  $(this).attr("hole_empty");
            var tree_live =  $(this).attr("tree_live");
            var tree_dead =  $(this).attr("tree_dead");
            $('#line_id').val(line_id);
            $('#hole_empty').val(hole_empty);
            $('#tree_live').val(tree_live);
            $('#tree_dead').val(tree_dead);
            //
            var field = document.getElementById("btn_submit");
            field.setAttribute("name","update_user");
            $('#line_id').prop("readonly", true);
        });       

    });
</script>

