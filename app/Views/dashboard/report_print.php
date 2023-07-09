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
                        <!---->
                        <div class="form-group row col-lg-12">
                            <label class="col-lg-1 col-form-label" for="report_year"><?=lang('ReportLang.group')?></label>
                            <div class="col-lg-3">
                                <select class="custom-select" id="group_id" name ="group_id">
                                    <?php if (isset($list_group) && count($list_group)) :
                                        foreach ($list_group as $key => $item) : ?>
                                            <option value="<?=$item->group_id?>"><?=$item->group_name?></option>
                                        <?php
                                        endforeach;
                                    endif ?>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label" for="report_year"><?=lang('ReportLang.year')?></label>
                            <div class="col-lg-1">
                                <select class="form-control" id="report_year" name="report_year">
                                    <?php
                                    $nowYear =2022;
                                    foreach (range(date('Y'), $nowYear) as $i) {
                                        echo "<option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label" for="quarter_month"><?=lang('ReportLang.quarter_month')?></label>
                            <div class="col-lg-1">
                                <select class="form-control" id="quarter_month">
                                    <option value="1"  ><?=lang('ReportLang.month')?></option>
                                    <option value="2" ><?=lang('ReportLang.quarter')?></option>
                                </select>
                            </div>
                            <div class="col-lg-1">
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
                                <select class="form-control" id="report_quarter" name="report_quarter">
                                    <option value="1" <?=round((date('m')-1)/3,0)==0? 'selected':''?> >I</option>
                                    <option value="2" <?=round((date('m')-1)/3,0)==1? 'selected':''?> >II</option>
                                    <option value="3" <?=round((date('m')-1)/3,0)==2? 'selected':''?> >III</option>
                                    <option value="4" <?=round((date('m')-1)/3,0)==3? 'selected':''?> >IV</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" id="export_excel" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i>
                                    </span>Excel</button>
                            </div>
                        </div>
                        <!---->

                    </div>
                    <div class="card-body">

                        <div id ="printReport">
                            <div class="row" style="text-align:center">
                                <div class="col-md-6">
                                    <h5 id="title_report">VĂN PHÒNG ĐĂNG KÝ ĐẤT ĐAI TỈNH BÌNH PHƯỚC</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 id="title_group">Chi nhánh</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>Độc lập - Tự do - Hạnh phúc</h5>
                                </div>
                            </div>
                            <br/>
                            <div class="row" style="text-align:center">
                                <div class="col-md-12">
                                    <h4 >BIỂU TỔNG HỢP CÔNG TÁC TIẾP NHẬN VÀ GIẢI QUYẾT HỒ SƠ ĐẤT ĐAI</h4>
                                </div>
                                <div class="col-md-12">
                                    <h5 ><i id="title_month_year">Tháng 5 Năm 2023</i></h5>
                                </div>
                            </div>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script lang="javascript" src="js/exceljs.min.js"></script>
<script lang="javascript" src="js/FileSaver.min.js"></script>
<script lang="javascript" src="js/export2excel.js"></script>
<script>
    jQuery(document).ready(function($) {
        let myData = [];
        $("#export_excel").on( "click", function() {
            //exportToExcel('Users', 'Users', '',myData);
            var title_group = document.getElementById('title_group')
            var title_month_year = document.getElementById('title_month_year')
            var title_report = document.getElementById('title_report')
            export_excel(title_group.innerText,title_month_year.innerText,title_report.innerText,myData);
            //getData();
        });
        $('#report_month').show('fast');
        $('#report_quarter').hide();
        title_month_quarter();
        $('#quarter_month').change(function(){
            if(this.value == 1){
                // tháng
                $('#report_month').show('fast');
                $('#report_quarter').hide();
            }else {
                // quý
                $('#report_month').hide();
                $('#report_quarter').show('fast');
            }
            title_month_quarter();
        });
        function title_month_quarter(){
            var quarter_month = $('#quarter_month').val();
            var month = $('#report_month').val();
            var year = $('#report_year').val();
            var quarter = $('#report_quarter').val();
            var name_group = $("#group_id  option:selected").text();
            if(quarter_month == 1){
                $('#title_month_year').html("<?=lang('ReportLang.month')?> "  + month + " " + "<?=lang('ReportLang.year')?> " + year);
            }else{
                $('#title_month_year').html("<?=lang('ReportLang.quarter')?> "+ " "  + quarter + " " + "<?=lang('ReportLang.year')?> " + year);
            }
            $('#title_group').html(name_group);
            loadDataTable();
        }
        $('#report_year,#report_month,#report_quarter,#group_id').change(function () {
            title_month_quarter();
        });
        function loadDataTable() {
            var quarter_month = $('#quarter_month').val();
            var month = $('#report_month').val();
            var year = $('#report_year').val();
            var quarter = $('#report_quarter').val();
            var group_id = $('#group_id').val();
            $.ajax({
                url: "<?= base_url() ?>dashboard/report_group/data_report_group_print",
                method: "POST",
                dataType: "json",
                data: {report_month: month,report_year: year,group_id: group_id,report_quarter: quarter,quarter_month:quarter_month},
                success: function (data) {
                    $("#data_table").html(data[1]);
                    myData = (data[0]);
                },
                error: function (data) {
                    $("#data_table").html(data[1]);
                }
            });
        };
    });
</script>