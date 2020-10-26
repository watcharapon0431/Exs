<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <!-- <?php print_r($rs_a)?> -->
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
                                        <th style=" text-align:center; width: 50%">รายละเอียด</th>
                                        <th style=" text-align:center; width: 20%"">คะแนน</th>
                                        <th style=" text-align:center; width: 10%"">กรอกคะแนน</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <input type="hidden" value="0" id="total_count_score">
                            </table>
                            <!-- ---------------------------------------------- end report data table ------------------------------------------------------- -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <textarea id="Ans" cols="220"  disabled value="sadas" rows="10"><?php echo  $rs_a[0]->ans_description;?></textarea>
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="text-align: center;">
                                <br>
                                <!-- ----------------------- start ยกเลิก submit ----------------------- -->
                                <button class="btn btn-default waves-effect waves-light" onclick="history.back();"><span class="btn-label"><i class="fa fa-times"></i></span>ยกเลิก</button>
                                <!-- ----------------------- End ยกเลิก submit ----------------------- -->
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <br>
                                <!-- ----------------------- start ส่งข้อมูล input ----------------------- -->
                                <button class="btn btn-success waves-effect waves-light" onclick="check_score()"><span class="btn-label"><i class="fa fa-save"></i></span>บันทึก</button>
                                <!-- ----------------------- End ส่งข้อมูล input ----------------------- -->
                            </div>
                            <div class="col-md-4"></div>
                        </div>
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
        // $('input[name="score"]').change(function() {
        //     console.log("s")
        //     let count = $('#total_count_score').val()
        //     let i
        //     let score = 0;
        //     for (i = 1; i <= count; i++) {
        //         score += $('#score_'+i).val()
        //     }
        //     $('#sum_score').text(score+" คะแนน")

        // })
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
                  
                    let score = 0;
                    let index=1;
                    json_data.rs_sq.forEach(function(element) {
                        table.append($('<tr>')
                            .append($('<td>').append("<center>" + i++ + "</center>"))
                            .append($('<td>').append(element.sq_description))
                            .append($('<td>').append("<center>" + element.sq_score + "</center>"))
                            .append($('<td>').append("<input type='text' name='score' id='score_"+index+"' placeholder='"+element.sq_score+"'> "))  
                        )
                      
                        score += parseInt(element.sq_score);
                        let new_score_no = parseInt($('#total_count_score').val()) + 1
                        $('#total_count_score').val(new_score_no)
                        index+=1;
                    })
                    table.append($('<tr>').append('<td colspan="2"><center>รวม</center></td><td><center>'+score+' คะแนน</center></td><td id="sum_score"><center>0 คะแนน</center></td>'))
                    // end loop foreach display case's data on table
                } else {
                    let text_no_data = '<center><b>ไม่มีเกณฑ์คะแนนแบบฝึกหัด</b></center>'
                    console.log(text_no_data)
                    table.append($('<tr>').append('<td colspan="4">' + text_no_data + '</td>'))
                }
                // end if condition when have case's data equal or more than 1 data
            }
        })
    }

    function check_score() {
        let ans_description = $("#Ans").val()
        let count = $('#total_count_score').val()
            let i
            let score = 0;
            for (i = 1; i <= count; i++) {
                score += parseInt($('#score_'+i).val())
            }
            alert(score)
            $('#sum_score').text(score+" คะแนน")
            let id = <?php echo  $rs_a[0]->ans_id;?>;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Ans_controller/ans_check_score/" ?>",
            data: {
                'score':score,
                'id':id
            },
            dataType: 'JSON',
            success: function(json_data) {
                if (json_data) {
    						new PNotify({
    							title: 'เพิ่มคะแนนสำเร็จ',
    							text: 'ข้อสอบของนักเรียนถูกตรวจแล้ว ',
    							type: 'success',
    							icon: 'ti ti-ckeck',
    							delay: 5000
    						})
    						// set time to exit to view v_report.php
    						setTimeout(function() {
    							let location = "<?php echo site_url() . "/Exs_controller/load_v_check_ans"; ?>";
    							window.location.href = location;
    						}, 1000);
    						// insert fail show alert
    					} else {
    						new PNotify({
    							title: 'เพิ่มคะแนนไม่สำเร็จ',
    							text: 'ระบบไม่สามารถบันทึกข้อมูลได้ ',
    							type: 'error',
    							icon: 'ti ti-close',
    							delay: 5000
    						})
    					}
            }
        })
    }
</script>



