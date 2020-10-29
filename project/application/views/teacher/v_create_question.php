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



        // Call function e.preventDefault() and add_append() when click button class btn-add-append
        $('.btn-add-append').click(function(e) {
            e.preventDefault()
            add_append()
        })

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


    /*
    * Case_insert
    * Data at this site sent to function insert in Case_report_controller_ajax.php
    * @input case_id, q_name, create_date, date_hour, date_min, language_id, level_id, level_note,
            description, latitude, longitude, location, requirement, internal_department, external_department,
    		subq_name, alert_day_amt, if_name, if_phone_no, if_email, is_disclosed, case_status_id, is_my_self
    * @output -
    * @author Chalongchai
    * @Update Date 2562-09-10
    */
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

        let code = $('#code').val()
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
                'score': score,
                'code': code
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
                                        <input type="text" class="form-control" id="q_name" placeholder="ชื่อคำถาม">
                                        <span style="color:red;">
                                            <p for="" id="validate_q_name"></p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">หมวดหมู่ : <span class="help"> *</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="language_id">
                                            <option value="" selected disabled style="display:none">- เลือกหมวดหมู่ที่ต้องการ -</option>
                                            <option value="Insert">Insert</option>
                                            <option value="Update">Update</option>
                                            <option value="Delete">Delete</option>
                                            <option value="Find">Find</option>
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
                                            <option value="" selected disabled style="display:none">- เลือกความยากที่ต้องการ -</option>
                                            <!-- <?php
                                                    /*start call level infomation form case_controller*/
                                                    for ($i = 1; $i <= 5; $i++) {
                                                    ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                                    }
                                                    /*end call level infomation form case_controller*/
                                            ?> -->
                                            <option value="ง่าย">ง่าย</option>
                                            <option value="ง่ายมาก">ง่ายมาก</option>
                                            <option value="ปานกลาง">ปานกลาง</option>
                                            <option value="ยาก">ยาก</option>
                                            <option value="ยากมาก">ยากมาก</option>
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
                                        <textarea id="description" class="form-control" rows="5"></textarea>
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
                                            <div class="subq col-md-12">
                                                <div class="col-md-9">
                                                    <br>
                                                    <input type="text" id="create_subq" class="form-control" placeholder="เกณฑ์คะแนน...">
                                                </div>
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="text" id="create_score" class="form-control" placeholder="คะแนน">
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
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="col-md-8">โค้ดคำตอบ : <span class="help"> *</span></label>
                                    <div class="col-md-12">
                                        <textarea id="code" class="form-control" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" id="message_send">
                                </div>
                            </div>
                            <br>
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
                                    <button class="btn btn-success waves-effect waves-light" onclick="insert()"><span class="btn-label"><i class="fa fa-save"></i></span>บันทึก</button>
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

<script type="text/javascript">
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#create_report').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
    }).datepicker("setDate", 'now');
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });

    const uploadButton = document.querySelector('.browse-btn');
    const fileInfo = document.querySelector('.file-info');
    const realInput = document.getElementById('case_file');

    uploadButton.addEventListener('click', (e) => {
        realInput.click();
    });

    realInput.addEventListener('change', () => {
        const name = realInput.value.split(/\\|\//).pop();
        const truncated = name.length > 20 ?
            name.substr(name.length - 20) :
            name;

        // fileInfo.innerHTML = truncated;
    });
</script>
<!-- call map -->
<script>
    $(function() {
        $("<script/>", {
            "type": "text/javascript",
            src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyDfeSc7kRuhm_txbcXq74HZ1YdMvvy9m9M&libraries=places&callback=initmap"
        }).appendTo("body");
    });
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>