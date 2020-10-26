<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h2><i class="fa fa-list-alt" style="font-size:40px;"></i>&emsp;จัดการแบบฝึกหัด</h2>
                            </div>
                            <div class="col-md-6" align="right">
                                <br>
                                <!-- --------------------------------------------- start report insert button ------------------------------------------------------ -->
                                <a id="insert-btn" href="<?php echo site_url(); ?>/Question_manage_controller/load_v_create_question" class="btn btn-info" type="button" class="model_img img-responsive">
                                    <span class="btn-label"><i class="mdi mdi-plus-circle "></i></span>เพิ่มแบบฝึกหัด
                                </a>
                                <!-- ---------------------------------------------- end report insert button ------------------------------------------------------- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">

                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">

                            <!-- --------------------------------------------- start report data table ------------------------------------------------------ -->
                            <table id="report_table" class="table table-striped dataTable no-footer display" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width: 10%"">ลำดับ</th>
                                        <th style=" text-align:center; width: 40%">เรื่อง</th>
                                        <th style="text-align:center; width: 15%"">วิชา</th>
                                        <th style=" text-align:center; width: 15%"">สถานะ</th>
                                        <th style="text-align:center; width: 20%"">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- ---------------------------------------------- end report data table ------------------------------------------------------- -->

                            <!-- --------------------------------------------- start pagination ------------------------------------------------------ -->
                            <div class=" col-md-12">
                                            <div class="col-md-4" align="left">
                                                <p id="count_of_master_data"></p>
                                            </div>
                                            <input type="hidden" id="current_page" value="1">
                                            <input type="hidden" id="section_page" value="1">
                                            <div id="page_option" class="col-md-8" align="right">

                                            </div>
                        </div>
                        <!-- ---------------------------------------------- end pagination ------------------------------------------------------- -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(() => {
        // call report_get_table function
        data_table()
    })

    function data_table() {
        let table = $("#report_table tbody")
        table.empty()

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Question_manage_controller/question_data_table/" ?>",
            data: {},
            dataType: 'JSON',
            async: false,
            success: function(json_data) {
                if (json_data.rs_question != 0) {
                    let i = 1
                    // start loop foreach display case's data on table
                    json_data.rs_question.forEach(function(element) {
                        let status = '';
                        (element.q_status == 0) ? status = 'ไม่ใช้งาน': status = 'ใช้งาน';
                        table.append($('<tr>')
                            .append($('<td>').append("<center>" + i++ + "</center>"))
                            .append($('<td>').append(element.q_name))
                            .append($('<td>').append("<center>" + element.q_ca_name + "</center>"))
                            .append($('<td>').append("<center>" + status + "</center>"))
                            .append($('<td>').append("<center>" + element.btn_edit + ' ' + element.btn_delete + "</center>"))
                        )
                    })
                    // end loop foreach display case's data on table
                } else {
                    let text_no_data = '<center><b>ไม่มีรายการแบบทดสอบ</b></center>'
                    table.append($('<tr>').append('<td colspan="6">' + text_no_data + '</td>'))
                }
                // end if condition when have case's data equal or more than 1 data
            }
        })
    }

    function question_edit(q_id) {
        // ตรง
    }

    function question_delete(q_id) {
        // ตรง
    }
</script>