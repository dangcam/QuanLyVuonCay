<style>
    #response_danger_modal{display: none}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_garden')?></h4>
                </div>
            </div>
        </div>
        <!------------------>
        <div class="row">
            <div class="col-lg-12">
                <!---->
                <div class="card">
                    <div class="card-header">
                            <div class="col-lg-2">
                                <select class="form-control" id="garden_year_view" name="garden_year_view">
                                    <?php
                                    $nowYear =2022;
                                    foreach (range(date('Y'), $nowYear) as $i) {
                                        echo "<option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        <a href="#" type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#myModal" data-whatever="add">
                            <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add</a>
                    </div>
                    <div class="card-body">
                        <!---->
                        <div class="alert alert-success alert-alt"role="alert" id="response_success"></div>
                        <div class="alert alert-info alert-alt"role="alert" id="response_info"></div>
                        <div class="alert alert-warning alert-alt "role="alert" id="response_warning"></div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger"></div>
                        <!---->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-striped verticle-middle table-responsive-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col"><?=lang('GardenLang.garden_id')?></th>
                                    <th scope="col"><?=lang('GardenLang.garden_name')?></th>
                                    <th scope="col"><?=lang('GardenLang.acreage')?></th>
                                    <th scope="col"><?=lang('GardenLang.year_planting')?></th>
                                    <th scope="col"><?=lang('GardenLang.year_up')?></th>
                                    <th scope="col"><?=lang('GardenLang.year_down')?></th>
                                    <th scope="col"><?=lang('GardenLang.year_full')?></th>
                                    <th scope="col"><?=lang('GardenLang.type_tree')?></th>
                                    <th scope="col"><?=lang('GardenLang.type_garden')?></th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><?=lang('GardenLang.garden_id')?></th>
                                    <th><?=lang('GardenLang.garden_name')?></th>
                                    <th><?=lang('GardenLang.acreage')?></th>
                                    <th><?=lang('GardenLang.year_planting')?></th>
                                    <th><?=lang('GardenLang.year_up')?></th>
                                    <th><?=lang('GardenLang.year_down')?></th>
                                    <th><?=lang('GardenLang.year_full')?></th>
                                    <th><?=lang('GardenLang.type_tree')?></th>
                                    <th><?=lang('GardenLang.type_garden')?></th>
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
        <!------------------>
    </div>
</div>

<div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="alert alert-danger" role="alert" id="response_danger_modal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Group</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="post" id="form_id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.garden_id')?></label>
                            <input type="text" id="garden_id" name="garden_id"
                                   class="form-control" placeholder="<?=lang('GardenLang.garden_id')?>">
                            <input type="hidden" name="garden_year" id="garden_year" ">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('GardenLang.garden_name')?></label>
                            <input type="text" id="garden_name" name="garden_name"
                                   class="form-control" placeholder="<?=lang('GardenLang.garden_name')?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.acreage')?></label>
                            <input type="text" id="acreage" name="acreage"
                                   class="form-control" placeholder="<?=lang('GardenLang.acreage')?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.year_planting')?></label>
                            <input type="text" id="year_planting" name="year_planting"
                                   class="form-control" placeholder="<?=lang('GardenLang.year_planting')?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.year_down')?></label>
                            <input type="text" id="year_down" name="year_down"
                                   class="form-control" placeholder="<?=lang('GardenLang.year_down')?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.year_up')?></label>
                            <input type="text" id="year_up" name="year_up"
                                   class="form-control" placeholder="<?=lang('GardenLang.year_up')?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><?=lang('GardenLang.year_full')?></label>
                            <input type="text" id="acreage" name="acreage"
                                   class="form-control" placeholder="<?=lang('GardenLang.year_full')?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('GardenLang.type_tree')?></label>
                            <select class="custom-select" id="type_tree" name="type_tree">
                                <?php if (isset($list_type_tree) && count($list_type_tree)) :
                                    foreach ($list_type_tree as $key => $item) : ?>
                                        <option value="<?=$item->tree_id?>"><?=$item->tree_name?></option>
                                    <?php
                                    endforeach;
                                endif ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?=lang('GardenLang.type_garden')?></label>
                            <select class="custom-select" id="type_garden" name="type_garden">
                                <option value="KTCB">Kiến thiết cơ bản</option>
                                <option value="KD">Kinh doanh</option>
                                <option value="TC">Tái canh</option>
                                <option value="TT">Tận thu</option>
                            </select>
                        </div>
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
<script>
    jQuery(document).ready(function($) {
        var ajaxDataTable = $('#data-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('AppLang.all') ?>"]],
            'searching': true, // Remove default Search Control
            'ajax': {
                'url': '<?=base_url()?>dashboard/garden/garden_ajax',
                'data': function(data){
                    data.searchYear = $('#garden_year_view').val();
                }
            },
            'columns': [
                {data: 'garden_id'},
                {data: 'garden_name'},
                {data: 'acreage'},
                {data: 'year_planting'},
                {data: 'year_up'},
                {data: 'year_down'},
                {data: 'year_full'},
                {data: 'type_tree'},
                {data: 'type_garden'},
                {data: 'active'}
            ]
        });
        $('#garden_year_view').change(function(){
            ajaxDataTable.draw();
        });
        $('#myModal').on('show.bs.modal', function (event) {
            $("#response_danger_modal").hide('fast');
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var garden_id = button.data('garden_id');
            var garden_name = button.data('garden_name');
            var acreage = button.data('acreage');
            var year_planting = button.data('year_planting');
            var year_up = button.data('year_up');
            var year_down = button.data('year_down');
            var year_full = button.data('year_full');
            var type_tree = button.data('type_tree');
            var type_garden = button.data('type_garden');
            var garden_year = $('#garden_year_view').val();

            var field = document.getElementById("add_edit");
            field.setAttribute("name",recipient);
            $('#garden_id').val(garden_id);
            $('#garden_name').val(garden_name);
            $('#acreage').val(acreage);
            $('#year_planting').val(year_planting);
            $('#year_up').val(year_up);
            $('#year_down').val(year_down);
            $('#year_full').val(year_full);
            $('#type_tree').val(type_tree);
            $('#type_garden').val(type_garden);
            $('#garden_year').val(garden_year);

            if(recipient=="add"){
                $('#myModalLabel').text("<?=lang('GardenLang.add_garden')?>");
                $('#garden_id').prop("readonly",false);
            }else {
                $('#myModalLabel').text("<?=lang('GardenLang.edit_garden')?>");
                $('#garden_id').prop("readonly",true);
            }
        });
        // Delete
        $('#smallModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('garden_id') // Extract info from data-* attributes
            $("#modal-btn-yes").on("click", function(event){
                $("#smallModal").modal('hide');
                event.preventDefault();
                $("#response_success").hide('fast');
                $("#response_danger").hide('fast');
                $.ajax({
                    url: '<?= base_url() ?>dashboard/garden/delete_garden',
                    type: 'POST',
                    data: { garden_id:recipient },
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
            console.log(formData);
            $.ajax({
                url: "<?= base_url() ?>dashboard/garden/"+name+"_garden",
                method: "POST",
                data: formData,
                dataType: "json",
                success: function (data) {
                    if (data[0]==0) {
                        $("#response_success").show('fast');
                        $("#response_success").html(data[1]);
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