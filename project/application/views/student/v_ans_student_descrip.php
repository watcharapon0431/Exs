<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h2><i class="mdi mdi-clipboard-text" style="font-size:40px;"></i>&emsp;แบบฝึกหัด : <?php echo $rs_q[0][1]; ?></h2>
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
                            <table id="sup_q_table" class="table table-striped dataTable no-footer display" role="grid" aria-describedby="myTable_info">
                                <h4><b>รายละเอียด : </b> <?php echo $rs_q[0][2]; ?> โดยมีเกณฑ์คะแนนดังนี้</h4>
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width: 15%"">ลำดับ</th>
                                        <th style=" text-align:center; width: 60%">รายละเอียด</th>
                                        <th style=" text-align:center; width: 20%"">คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- ---------------------------------------------- end report data table ------------------------------------------------------- -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        data_table()
    })

    function data_table() {
        let table = $("#sup_q_table tbody")
        table.empty()

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Ans_controller/ans_sup_q_table/" ?>",
            data: {
                'q_id': <?php echo $rs_q[0][0] ?>
            },
            dataType: 'JSON',
            success: function(json_data) {
                // console.log(json_data)
                if (json_data.rs_sq != 0) {
                    let i = 1
                    // start loop foreach display case's data on table
                    json_data.rs_sq.forEach(function(element) {
                        table.append($('<tr>')
                            .append($('<td>').append("<center>" + i++ + "</center>"))
                            .append($('<td>').append(element.sq_description))
                            .append($('<td>').append("<center>" + element.sq_score + "</center>"))
                        )
                    })
                    // end loop foreach display case's data on table
                } else {
                    let text_no_data = '<center><b>ไม่มีเกณฑ์คะแนนแบบฝึกหัด</b></center>'
                    console.log(text_no_data)
                    table.append($('<tr>').append('<td colspan="3">' + text_no_data + '</td>'))
                }
                // end if condition when have case's data equal or more than 1 data
            }
        })
    }
</script>