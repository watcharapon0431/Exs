<?php
/*
	* v_create_report
	* Display static graph case report 
	* @input -
	* @output -
	* @author Chalongchai
	* @Create Date 2562-09-10
	*/
?>
<script>
    // Document Ready Function
    $(document).ready(() => {

    })

    /*
     * Add_append
     * Add JS input by count subq
     * @input name, id
     * @output subq input tag 
     * @author Chalongchai
     * @Update Date 2562-09-10
     */
    function add_append() {
        // declare new_subq_no = value of input id total_count_subq+1
        new_subq_no = parseInt($('#total_count_subq').val()) + 1
        new_score_no = parseInt($('#total_count_subq').val()) + 1
        $(".subq").append(
            "<div class='col-md-9' id='div_input_append" + new_subq_no + "'><br>" +
            "<input type='text' id='subq_name_" + new_subq_no + "' class='form-control' placeholder='เกณฑ์คะแนน...'>" +
            "</div>" +
            "<div class='col-md-2' id='div_input_score_append" + new_score_no + "'><br>" +
            "<input type='text' id='score_" + new_score_no + "' class='form-control' placeholder='คะแนน'>" +
            "</div>" +
            "<div class='col-md-1' id='div_btn_append" + new_subq_no + "'><br>" +
            "<button class='btn btn-danger' id='subq_btn_" + new_subq_no + "' onclick='remove_append();' ><span class='btn-label'><i class='mdi mdi-plus-circle'></i></span>ลบ</button>" +
            "</div>"
        )
        // set input id total_count_subq = new_subq_no
        $('#total_count_subq').val(new_subq_no)
    }

    /*
     * Remove_append
     * Remove JS input when user click on button "ลบ"
     * @input -
     * @output Delete subq input tag 
     * @author Chalongchai
     * @Update Date 2562-09-10
     */
    function remove_append() {
        // declare last_subq_no = value of input id total_count_subq
        last_subq_no = $('#total_count_subq').val()
        if (last_subq_no >= 1) {
            $('#subq_name_' + last_subq_no).remove()
            $('#score_' + last_subq_no).remove()
            $('#subq_btn_' + last_subq_no).remove()
            $("#div_input_append" + last_subq_no).remove()
            $("#div_input_score_append" + last_subq_no).remove()
            $("#div_btn_append" + last_subq_no).remove()
            $('#total_count_subq').val(last_subq_no - 1)
        }
    }


    function insert() {
        // When Required information is empty show alert text
        // declare last_subq_no form input id total_count_subq
        var last_subq_no = $('#total_count_subq').val()
        // declare language_id form input id language_id
        let language_id = $('#language_id').val()
        // declare q_name form input id q_name
        let q_name = $('#q_name').val()
        // declare level_id form input id level_id
        let level_id = $('#level_id').val()
        // declare create_subq form input id create_subq
        let create_subq = $('#create_subq').val()
        // declare create_subq form input id create_subq
        let create_score = $('#create_score').val()
        // declare create_subq form input id create_subq
        let description = $('#description').val()

        // declare subq_name in array
        var subq_name = []
        var score = []
        // if create_subq not empty push create_subq into subq_name
        if (create_subq.trim() != '') {
            subq_name.push(create_subq)
        }
        if (create_subq.trim() != '') {
            score.push(create_score)
        }

        /* Start loop for push all input id subq_name_ into subq_name */
        for (var i = 1; i <= last_subq_no; i++) {
            if ($('#subq_name_' + i).val().trim() != '') {
                subq_name.push($('#subq_name_' + i).val())
            }
            if ($('#score_' + i).val().trim() != '') {
                score.push($('#score_' + i).val())
            }
        }
        /* End loop for push all input id subq_name_ into subq_name */


        /* Start form ajax for call function insert_report in Case_report_controller_ajax */
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Question_manage_controller/question_insert/"; ?>",
            data: {
                'language_id': language_id,
                'q_name': q_name,
                'description': description,
                'level_id': level_id,
                'subq_name': subq_name,
                'score': score
            },
            dataType: 'JSON',
            success: function(result) {
                if (result) {
                    new PNotify({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        text: 'ชื่อข้อสอบของคุณคือ ' + q_name,
                        type: 'success',
                        icon: 'ti ti-ckeck',
                        delay: 5000
                    })
                    // set time to exit to view v_report.php
                    setTimeout(function() {
                        let location = "<?php echo site_url() . "/Question_manage_controller/load_v_question_manage/"; ?>";
                        window.location.href = location;
                    }, 2500);
                    // insert fail show alert
                } else {
                    new PNotify({
                        title: 'บันทึกข้อมูลไม่สำเร็จ',
                        text: 'ระบบไม่สามารถบันทึกข้อมูลได้ ',
                        type: 'error',
                        icon: 'ti ti-close',
                        delay: 5000
                    })
                }
            },
            // error show alert
            error: function(result) {
                new PNotify({
                    title: 'ERROR',
                    text: 'เกิดปัญหาในการบันทึกข้อมูล ',
                    type: 'error',
                    icon: 'ti ti-close',
                    delay: 5000
                })
            },
        })
        /* End form ajax for call function insert_report in Case_report_controller_ajax */

    }

    function update(q_id) {

        // When Required information is empty show alert text
     
        let language_id = $('#language_id').val()
        // declare q_name form input id q_name
        let q_name = $('#q_name').val()
        // declare level_id form input id level_id
        let level_id = $('#level_id').val()
        // declare subq form input id create_subq
        let subq = $('#create_subq').val()
        // declare score form input id create_score
        let score = $('#create_score').val()
        // declare description form input id description
        let description = $('#description').val()
      
        if (language_id == 'HTML') {
            language_id = 1;
        } else if (language_id == 'CSS') {
            language_id = 2;
        } else if (language_id == 'PHP') {
            language_id = 3;
        } else if (language_id == 'JS') {
            language_id = 4;
        } else if (language_id == 'SQL') {
            language_id = 5;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Question_manage_controller/question_update/"; ?>",
            data: {
                'language_id': language_id,
                'q_name': q_name,
                'description': description,
                'level_id': level_id,
                'subq_name': subq,
                'score': score,
                'q_id': q_id
            },
            dataType: 'JSON',
            success: function(result) {
                if (result) {
                	new PNotify({
                		title: 'บันทึกข้อมูลสำเร็จ',
                		text: 'ชื่อข้อสอบของคุณคือ ' + q_name,
                		type: 'success',
                		icon: 'ti ti-ckeck',
                		delay: 5000
                	})
                	// set time to exit to view v_report.php
                	setTimeout(function() {
                		let location = "<?php echo site_url() . "/Question_manage_controller/load_v_question_manage/"; ?>";
                		window.location.href = location;
                	}, 2500);
                	// insert fail show alert
                } else {
                	new PNotify({
                		title: 'บันทึกข้อมูลไม่สำเร็จ',
                		text: 'ระบบไม่สามารถบันทึกข้อมูลได้ ',
                		type: 'error',
                		icon: 'ti ti-close',
                		delay: 5000
                	})
                }
            },
            // error show alert
            error: function(result) {
            	new PNotify({
            		title: 'ERROR',
            		text: 'เกิดปัญหาในการบันทึกข้อมูล ',
            		type: 'error',
            		icon: 'ti ti-close',
            		delay: 5000
            	})
            }
        })
        /* End form ajax for call function insert_report in Case_report_controller_ajax */

    }
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="box-title"><i class="mdi mdi-email-outline" style="font-size:30px;"></i>&emsp;เพิ่มข้อสอบ</h4>
                    </div>
                </div>
            </div>
          <?php 
        //   print_r($category);
          
            foreach ($rs_question as $row) {
            ?>
                <!-- <input type="hiddne"> -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">ข้อมูลข้อสอบ
                            <div class="panel-action">
                                <a href="javascript:void(0)" data-perform="panel-collapse"><i class="ti-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-12">ชื่อข้อ : <span class="help"> *</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="q_name" value="<?php echo $row->q_name ?> " placeholder="ชื่อคำถาม">
                                            <span style="color:red;">
                                                <p for="" id="validate_q_name"></p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-12">ภาษา : <span class="help"> *</span></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="language_id">
                                                
                                                <option value="<?php echo $category[0]->ca_name;; ?>"><?php echo $category[0]->ca_name;; ?></option>
                                                 <?php 
                                                /*start call level infomation form case_controller*/
                                                foreach ($rs_category as $value) { ?>
                                                  <?php if($value->ca_name != $row->ca_name){ ?> 
                                                  <option value="<?php echo $value->ca_name; ?>"><?php echo $value->ca_name; ?></option>
                                                  <?php } ?>
                                                  

                                                <?php  }
                                                ?>
                                            </select>
                                            <span style="color:red;">
                                                <p for="" id="validate_language_id"></p>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-12">ความยาก : <span class="help"> *</span></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="level_id" onchange="check_level();">
                                                <option value="<?php echo $row->q_level ?>"><?php echo $row->q_level ?> </option>
                                                <?php
                                                /*start call level infomation form case_controller*/
                                                for ($i = 1; $i <= 5; $i++) {
                                                 if($i != $row->q_level){
                                                 ?> 
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                                 }   
                                                 }
                                                /*end call level infomation form case_controller*/
                                                ?>
                                            </select>
                                            <span style="color:red;">
                                                <p for="" id="validate_level_id"></p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-8">รายละเอียด : <span class="help"> *</span></label>
                                        <div class="col-md-12">
                                            <textarea id="description" class="form-control" value="<?php echo $row->q_description ?>" rows="5"><?php echo $row->q_description ?></textarea>

                                        </div>
                                        <input type="hidden" id="message_send">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <br><br>
                                    <div class="form-group case">
                                        <div class="col-md-12">
                                            <label>เกณฑ์คะแนน : <span class="help"> *</span></label>
                                        </div>
                                        <div class="row">
                                            <div class="case_subq">
                                                <div class="subq">
                                                    <div class="col-md-9">
                                                        <br>
                                                        <input type="text" id="create_subq" class="form-control" placeholder="เกณฑ์คะแนน..." value="<?php echo $row->sq_description ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <br>
                                                        <input type="text" id="create_score" class="form-control" placeholder="คะแนน" value="<?php echo $row->sq_score ?>">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <br>
                                                        <button class="btn btn-success btn-add-append"><span class="btn-label"><i class="mdi mdi-plus-circle"></i></span>เพิ่ม</button>
                                                    </div>
                                                </div>
                                                <span style="color:red;">
                                                    <p for="" id="validate_create_subq" class="col-md-6"></p>
                                                </span>
                                                <input type="hidden" value="0" id="total_count_subq">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" align="middle">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success" onclick="update(<?php echo $row->q_id ?>);"><span class="btn-label"><i class="mdi mdi-content-save"></i></span>บันทึก</button>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- <br>
                                    <button class="btn btn-default" onclick="case_cancel();">ยกเลิก</button> -->
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
<?php } ?>
