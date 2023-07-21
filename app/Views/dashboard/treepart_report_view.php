<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_treepart_report')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
        <!---->
                <div class="card">
                    <div class="card-body">
                        <!---->
                        <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label><?=lang('TreePartLang.line_year')?></label>
                                        <select class="form-control" id="line_year" name="line_year">
                                            <?php
                                            $nowYear =2022;
                                            foreach (range(date('Y'), $nowYear) as $i) {
                                                echo "<option value=$i>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?=lang('TreePartLang.worker_id')?></label>
                                        <select class="form-control" id="worker_id" name="worker_id">
                                            <?php if (isset($list_worker) && count($list_worker)) :
                                                foreach ($list_worker as $key => $item) : ?>
                                                    <option value="<?=$item->worker_id?>"><?=$item->worker_name?></option>
                                                <?php
                                                endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" id="export_excel" class="btn btn-rounded btn-success">
                                    <span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i></span>Excel</button>
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
                        <table class="table table-bordered verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col"><?=lang('TreePartLang.garden_id')?></th>
                                <th scope="col"><?=lang('TreeLineLang.line_id')?></th>
                                <th scope="col"><?=lang('TreeLineLang.tree_live')?></th>
                                <th scope="col"><?=lang('TreeLineLang.tree_dead')?></th>
                                <th scope="col"><?=lang('TreeLineLang.hole_empty')?></th>
                                <th scope="col">Tổng</th>
                            </tr>
                            </thead>
                            <tbody id ="data_table">
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

<!---->

<script lang="javascript" src="js/exceljs.min.js"></script>
<script lang="javascript" src="js/FileSaver.min.js"></script>
<script lang="javascript" src="js/export2excel.js"></script>

<script>
    jQuery(document).ready(function($) {
        let myData = [];
        $("#export_excel").on( "click", function() {
            var line_year = $('#line_year').val();
            var worker = $("#worker_id option:selected").text();
            console.log(myData);
            export_excel(line_year,worker,myData);
        });
        function loadDataTable() {
            var line_year = $('#line_year').val();
            var worker_id = $('#worker_id').val();

            $.ajax({
                url: "<?= base_url() ?>dashboard/treepart/report_ajax",
                method: "POST",
                dataType: "json",
                data: {line_year: line_year,worker_id: worker_id},
                success: function (data) {
                    $("#data_table").html(data[1]);
                    myData = (data[0]);
                },
                error: function (data) {
                    $("#data_table").html(data[1]);
                }
            });
        };
        $('#line_year,#worker_id').change(function(){
            loadDataTable() ;
        });
        loadDataTable();
    });
</script>

