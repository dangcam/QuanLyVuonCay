<style type="text/css">



</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4><?=lang('AppLang.page_title_report_group')?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">BIỂU 01: BIỂU TỔNG HỢP CÔNG TÁC TIẾP NHẬN VÀ GIẢI QUYẾT HỒ SƠ ĐẤT ĐAI</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-alt"role="alert" id="response_success"></div>
                        <div class="alert alert-danger alert-alt" role="alert" id="response_danger"></div>
                        <form method="post" id="form_id">
                            <!---->
                            <div class="form-group row">
                                <label class="col-lg-1 col-form-label" for="report_year"><?=lang('ReportLang.year')?></label>
                                <div class="col-lg-2">
                                    <select class="form-control" id="report_year" name="report_year">
                                        <?php
                                        $nowYear =2022;
                                        foreach (range(date('Y'), $nowYear) as $i) {
                                            echo "<option value=$i>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label class="col-lg-1 col-form-label" for="report_month"><?=lang('ReportLang.month')?></label>
                                <div class="col-lg-2">
                                    <select class="form-control" id="report_month" name="report_month">
                                        <option value="1" <?=date('m')=='01'? 'selected':''?> >1</option>
                                        <option value="2" <?=date('m')=='02'? 'selected':''?> >2</option>
                                        <option value="3" <?=date('m')=='03'? 'selected':''?> >3</option>
                                        <option value="4" <?=date('m')=='04'? 'selected':''?> >4</option>
                                        <option value="5" <?=date('m')=='05'? 'selected':''?> >5</option>
                                        <option value="6" <?=date('m')=='06'? 'selected':''?>>6</option>
                                        <option value="7" <?=date('m')=='07'? 'selected':''?>>7</option>
                                        <option value="8" <?=date('m')=='08'? 'selected':''?>>8</option>
                                        <option value="9" <?=date('m')=='09'? 'selected':''?>>9</option>
                                        <option value="10" <?=date('m')=='10'? 'selected':''?>>10</option>
                                        <option value="11" <?=date('m')=='11'? 'selected':''?>>11</option>
                                        <option value="12" <?=date('m')=='12'? 'selected':''?>>12</option>
                                    </select>
                                </div>
                            </div>
                            <!---->
                            <input type="hidden" name="group_id" id="group_id" value="<?=session()->get('group_id')?>">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped table-responsive-sm">
                                <thead style="text-align:center" >
                                <tr>
                                    <th rowspan="3" style="vertical-align: middle">STT</th>
                                    <th rowspan="3" style="vertical-align: middle">Tên</th>
                                    <th colspan="4">Số hồ sơ phải giải quyết</th>
                                    <th colspan="4">Đã giải quyết</th>
                                    <th colspan="4">Đang giải quyết</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle">Kỳ trước chuyển sang</th>
                                    <th colspan="2">Tiếp nhận trong kỳ</th>
                                    <th rowspan="2" style="vertical-align: middle">Cộng</th>

                                    <th rowspan="2" style="vertical-align: middle">Tổng số</th>
                                    <th rowspan="2" style="vertical-align: middle">Trước và trong hạn</th>
                                    <th rowspan="2" style="vertical-align: middle">Trễ hạn</th>
                                    <th rowspan="2" style="vertical-align: middle">Tỷ lệ trễ hạn (%)</th>
                                    <th rowspan="2" style="vertical-align: middle">Tổng số</th>
                                    <th rowspan="2" style="vertical-align: middle">Trong hạn</th>
                                    <th rowspan="2" style="vertical-align: middle">Quá hạn</th>
                                    <th rowspan="2" style="vertical-align: middle">Tỷ lệ quá hạn (%)</th>
                                </tr>
                                <tr>
                                    <th>Trực tiếp</th>
                                    <th>Trực tuyến</th>
                                </tr>
                                </thead>
                                <tbody id ="data_table">
                                <?php //echo $data_table?>
                                </tbody>
                            </table>

                        </div>
                            <button type="submit" id="btn_submit" class="btn btn-primary "><?=lang('AppLang.save')?></button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="vendor/jqueryui/js/jquery-ui.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        function loadDataTable() {
            $.ajax({
                url: "<?= base_url() ?>dashboard/report_group/data_report_group",
                method: "POST",
                dataType: "json",
                data: {report_month: $('#report_month').val(),report_year: $('#report_year').val(),group_id: $('#group_id').val() },
                success: function (data) {
                    $("#data_table").html(data);
                },
                error: function (data) {
                    $("#data_table").html(data);
                }
            });
        };
        loadDataTable();
        $('#report_month,#report_year').change(function(){
            loadDataTable();
        });
        $("#form_id").on('submit',function (event) {
            event.preventDefault();
            $("#response_success").hide('fast');
            $("#response_danger").hide('fast');
            var name = $("#btn_submit").attr("name");
            var formData = $(this).serialize();
            $.ajax({
                url:"<?= base_url() ?>dashboard/report_group/save_report_group",
                method:"POST",
                data:formData,
                dataType:"json",
                success:function (data) {
                    if(data[0]==0){
                        $("#response_success").show('fast');
                        $("#response_success").effect("shake");
                        $("#response_success").html(data[1]);
                        loadDataTable();
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