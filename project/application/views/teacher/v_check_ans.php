<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h2><i class="fa fa-check-square-o" style="font-size:40px;"></i>&emsp;ตรวจแบบฝึกหัด</h2>
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
                                        <th style="text-align:center; width: 30%">แบบฝึกหัด</th>
                                        <th style="text-align:center; width: 15%"">หมวดหมู่</th>
                                        <th style="text-align:center; width: 15%"">ชื่อ</th>
                                        <th style="text-align:center; width: 15%"">สถานะ</th>
                                        <th style="text-align:center; width: 15%"">คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- ---------------------------------------------- end report data table ------------------------------------------------------- -->

                            <!-- --------------------------------------------- start pagination ------------------------------------------------------ -->
                            <div class="col-md-12">
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
        data_table_ans()
        //start when click at row on table for display v_detail_report
        $('#report_table tbody').on('click', 'td', function() {
            // declare when click element on row table
            let check_col = $(this).index()
            let check_row = $(this).parent().index();
            // if condition when dont click on btn-delete id button 
            // set row  is colunm index 2 for sent display v_detail_report
            let $row = $(this).closest("tr")
            let $tds = $row.find("td:nth-child(1)")
            // declare code is null string
            let ans_id = ""
            $.each($tds, function() {
                ans_id = $(this).text()
            })
            ans_id = ans_id.trim()
            // console.log(ans_id)
            // url is string website
            if (ans_id != 'ไม่มีรายการคำตอบ') {
                let url = "<?php echo site_url() . "/Question_manage_controller/check_ans_score/" ?>"
                // link to url and sent parameter
                window.location.href = url + ans_id
            }
        })
        //end when click at row on table for display v_detail_report
    })

    function data_table_ans() {
        let table = $("#report_table tbody")
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Ans_controller/table_data_ans/" ?>",
            data: {},
            dataType: 'JSON',
            async: false,
            success: function(json_data) {
                if (json_data.rs_all != 0) {
                    let i = 1
                    // start loop foreach display case's data on table
                    json_data.rs_all.forEach(function(element) {
                        let score;
                        (element.ans_status != '1') ? status = 'ยังไม่ตรวจ' : status = 'ตรวจแล้ว'; 
                        table.append($('<tr>')
                            .append($('<td hidden>').append("<center>" + element.ans_id + "</center>"))
                            .append($('<td>').append("<center>" + i++ + "</center>"))
                            .append($('<td>').append(element.ans_q_name))
                            .append($('<td>').append("<center>" + element.ans_q_category + "</center>"))
                            .append($('<td>').append("<center>" + element.ans_user_fname + "</center>"))
                            .append($('<td>').append("<center>" + status + "</center>"))
                            .append($('<td>').append("<center>" + element.ans_score + "</center>"))
                            // .append($('<td>').append("<center>" + element.score + "</center>"))
                        )
                    })
                    // end loop foreach display case's data on table
                } else {
                    let text_no_data = '<center><b>ไม่มีรายการคำตอบ</b></center>'
                    table.append($('<tr>').append('<td colspan="6">' + text_no_data + '</td>'))
                }
                
            }
        })
    }
</script>