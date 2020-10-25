<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h2><i class="mdi mdi-clipboard-text" style="font-size:40px;"></i>&emsp;ทำแบบฝึกหัด</h2>
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
                                        <th style=" text-align:center; width: 20%"">คะแนน</th>
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
        data_table()

        // start when click at row on table for display v_detail_report
        $('#report_table tbody').on('click', 'td', function() {
            // declare when click element on row table
            let check_col = $(this).index(),
                check_row = $(this).parent().index();
            // if condition when dont click on btn-delete id button 
            if (check_col != 7) {
                // set row  is colunm index 2 for sent display v_detail_report
                let $row = $(this).closest("tr"),
                    $tds = $row.find("td:nth-child(1)")
                // declare code is null string
                let code = ""

                // url is string website
                if (code != 'ไม่มีรายการแบบทดสอบ') {
                    let url = "<?php echo site_url() . "/Exs_controller/load_v_ans_student_descrip/" ?>"
                    // link to url and sent parameter
                    window.location.href = url + code
                }
            }
        })
        // end when click at row on table for display v_detail_report
    })

    function data_table() {
        let table = $("#report_table tbody")
        table.empty()

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Ans_controller/ans_data_table/" ?>",
            data: {},
            dataType: 'JSON',
            async: false,
            success: function(json_data) {
                console.log(json_data)
                if (json_data.rs_ans != null) {
                    let i = 1
                    // start loop foreach display case's data on table
                    json_data.rs_ans.forEach(function(element) {
                        table.append($('<tr>')
                            .append($('<td>').append("<center>" + i++ + "</center>"))
                            .append($('<td>').append(element.ans_q_name))
                            .append($('<td>').append("<center>" + element.ans_q_ca_name + "</center>"))
                            .append($('<td>').append("<center>" + element.ans_score + "</center>"))
                        )
                    })
                    // end loop foreach display case's data on table
                } else {
                    let text_no_data = '<center><b><p>ไม่มีรายการแบบทดสอบ</p></b></center>'
                    table.append($('<tr>').append('<td colspan="6">' + text_no_data + '</td>'))
                }
                // end if condition when have case's data equal or more than 1 data
            }
        })
    }
</script>