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

        // /* Start validate case report infomation */
        // $("#q_name").change(function() {
        // 	if ($('#q_name').val().trim() == '') {
        // 		$('#q_name').css("border", "1px solid red");
        // 		$('#q_name').focus();
        // 		$('#validate_q_name').text('กรุณากรอกชื่อเรื่องร้องเรียน')
        // 	} else {
        // 		$('#q_name').css("border", "");
        // 		$('#validate_q_name').text('')
        // 	}
        // });
        // $("#language_id").change(function() {
        // 	if ($('#language_id').val() == null) {
        // 		$('#language_id').css("border", "1px solid red");
        // 		$('#language_id').focus();
        // 		$('#validate_language_id').text('กรุณาเลือกช่องทางแหล่งข้อมูล')
        // 	} else {
        // 		$('#language_id').css("border", "");
        // 		$('#validate_language_id').text('')
        // 	}
        // });
        // $("#level_id").change(function() {
        // 	if ($('#level_id').val() == null) {
        // 		$('#level_id').css("border", "1px solid red");
        // 		$('#level_id').focus();
        // 		$('#validate_level_id').text('กรุณาเลือกประเภทเรื่องร้องเรียน')
        // 	} else {
        // 		$('#level_id').css("border", "");
        // 		$('#validate_level_id').text('')
        // 	}
        // });
        // $("#create_report").change(function() {
        // 	if ($('#create_report').val().trim() == '') {
        // 		$('#create_report').css("border", "1px solid red");
        // 		$('#create_report').focus();
        // 		$('#validate_create_report').text('กรุณากรอกวันที่บันทึกข้อมูล')
        // 	} else {
        // 		$('#create_report').css("border", "");
        // 		$('#validate_create_report').text('')
        // 	}
        // });
        // $("#if_name").change(function() {
        // 	if ($('#if_name').val().trim() == '') {
        // 		$('#if_name').css("border", "1px solid red");
        // 		$('#if_name').focus();
        // 		$('#validate_if_name').text('กรุณากรอกชื่อผู้แจ้งเรื่องร้องเรียน')
        // 	} else {
        // 		$('#if_name').css("border", "");
        // 		$('#validate_if_name').text('')
        // 	}
        // });
        // $("#create_subq").change(function() {
        // 	if ($('#create_subq').val().trim() == '') {
        // 		$('#create_subq').css("border", "1px solid red");
        // 		$('#create_subq').focus();
        // 		$('#validate_create_subq').text('กรุณากรอกชื่อเจ้าหน้าที่ผู้รับผิดชอบ')
        // 	} else {
        // 		$('#create_subq').css("border", "");
        // 		$('#validate_create_subq').text('')
        // 	}
        // });
        // $("#internal_department").change(function() {
        // 	if ($('#internal_department').val().length == 0) {
        // 		$('#internal_department').css("border", "1px solid red");
        // 		$('#internal_department').focus();
        // 		$('#validate_internal_department').text('กรุณาเลือกหน่วยงานที่รับผิดชอบ')
        // 	} else {
        // 		$('#internal_department').css("border", "");
        // 		$('#validate_internal_department').text('')
        // 	}
        // });
        // /* End validate case report infomation */

        // declare today = current date
        var today = new Date();
        // declare year = current year and select last 2 digit
        var year = (today.getFullYear() + 543).toString().substr(-2)
        // declare case_code
        let case_code = "cs-" + year + "xxxx"
        // set Element id code = case_code
        //$("#code").html(case_code)

        // set radio class is_disclosed is true 
        //$("#is_disclosed_false").prop("checked", true)
        // set radio class case_status_id_1 is true 
        //$("#case_status_id_1").prop("checked", true)

        // Call function e.preventDefault() and add_append() when click button class btn-add-append
        $('.btn-add-append').click(function(e) {
            e.preventDefault()
            add_append()
        })

        // // set input id hour = current hour
        // $("#hour").val(today.getHours())
        // // set input id minute = current minute
        // $("#minute").val(today.getMinutes())
        // // set input id level_note on disabled
        // $("#level_note").prop("disabled", true);
        // // set input id alert_day_amt on disabled
        // $("#alert_day_amt").prop("disabled", true);
        // /* Start call function report_upload in Case_report_controller_ajax when upload_form submit */
        // // call function report_upload in Case_report_controller_ajax when upload_form submit
        // $('#upload_form').on('submit', function(e) {
        // 	e.preventDefault();
        // 	var form_data = new FormData(this)
        // 	console.log(form_data)
        // 	$.ajax({
        // 		url: "<?php echo site_url() . "/Case_report_controller_ajax/report_upload/"; ?>",
        // 		method: "POST",
        // 		data: form_data,
        // 		contentType: false,
        // 		cache: false,
        // 		processData: false,
        // 		success: function(data) {
        // 			console.log(data)
        // 		}
        // 	});
        // })
        /* End call function report_upload in Case_report_controller_ajax when upload_form submit */
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

    // 	/*
    // 	 * get_subq_name
    // 	 * Get subq name form get_subq controller
    // 	 * @input -
    // 	 * @output subq_name
    // 	 * @author Chalongchai
    // 	 * @Update Date 2562-09-10
    // 	 */
    // 	function get_subq_name() {
    // 		$.ajax({
    // 			type: "POST",
    // 			url: "<?php echo site_url() . "/Case_report_controller_ajax/get_subq/"; ?>",
    // 			dataType: "json",
    // 			success: function(result) {
    // 				/* Start check input id is_my_self is true or false */
    // 				// if input id is_my_self is true
    // 				if ($("#is_my_self").is(":checked") == true) {
    // 					/* Start check input id create_subq is empty or not empty */
    // 					// if input id create_subq is empty set input id create_subq = result.rs_subq_name 
    // 					if ($('#create_subq').val().trim() == '') {
    // 						$('#create_subq').val(result.rs_subq_name)
    // 					}
    // 					// if input id create_subq is result.rs_subq_name do noting 
    // 					else if ($('#create_subq').val() == result.rs_subq_name) {

    // 					}
    // 					// else set subq_name_+i = result.rs_subq_name				
    // 					else {
    // 						last_subq_no = $('#total_count_subq').val()
    // 						/* Start loop last_subq_no */
    // 						for (var i = 1; i <= last_subq_no; i++) {
    // 							// if input id subq_name_ is empty then set input id subq_name_ = result.rs_subq_name							
    // 							if ($('#subq_name_' + i).val().trim() == '') {
    // 								$('#subq_name_' + i).val(result.rs_subq_name)
    // 								break;
    // 							}
    // 						}
    // 						/* End loop last_subq_no */
    // 					}
    // 					/* Start check input id create_subq is empty or not empty */
    // 				}
    // 				// if input id is_my_self is false
    // 				else {
    // 					// if input id subq_name_ is result.rs_subq_name then set input id subq_name_ = empty							
    // 					if ($('#create_subq').val() == result.rs_subq_name) {
    // 						$('#create_subq').val('')
    // 					} else {
    // 						last_subq_no = $('#total_count_subq').val()
    // 						/* Start loop last_subq_no */
    // 						for (var i = 1; i <= last_subq_no; i++) {
    // 							// if input id subq_name_ is result.rs_subq_name then set input id subq_name_ = empty	
    // 							if ($('#subq_name_' + i).val() == result.rs_subq_name) {
    // 								$('#subq_name_' + i).val('')
    // 								break;
    // 							}
    // 						}
    // 						/* End loop last_subq_no */
    // 					}
    // 				}
    // 				/* End check input id is_my_self is true or false */
    // 			}
    // 		})
    // 	}
    // 	/*
    // 	 * check_level
    // 	 * check_level value
    // 	 * @input level
    // 	 * @output -
    // 	 * @author Chalongchai
    // 	 * @Update Date 2562-09-10
    // 	 */
    // 	function check_level() {
    // 		// declare level = selected option from select tag id level_id
    // 		var level = $("#level_id option:selected").html()
    // 		/* Start check level = อื่นๆ or not */
    // 		if (level == "อื่นๆ") {
    // 			$("#level_note").prop("disabled", false);
    // 		} else {
    // 			$("#level_note").prop("disabled", true);
    // 			$("#level_note").val('');
    // 		}
    // 		/* End check level = อื่นๆ or not */
    // 	} // end of function

    // 	/*
    // 	 * Case_cancel
    // 	 * return to page report 
    // 	 * @input -
    // 	 * @output -
    // 	 * @author Chalongchai
    // 	 * @Update Date 2562-09-10
    // 	 */
    // 	function case_cancel() {
    // 		/* Start show alert when exit from create report page */
    // 		swal({
    // 				title: "คุณต้องการออกจากหน้าบันทึกเรื่องร้องเรียนใช่หรือไม่",
    // 				text: "ข้อมูลที่ยังไม่ถูกบันทึกของคุณจะสูญหาย!",
    // 				type: "warning",
    // 				showCancelButton: true,
    // 				confirmButtonColor: 'green',
    // 				confirmButtonText: "ตกลง",
    // 				closeOnConfirm: false,
    // 				cancelButtonText: 'ยกเลิก'
    // 			},
    // 			function() {
    // 				// return to view load_v_report
    // 				let location = "<?php echo site_url() . "/Case_report_controller_ajax/load_v_report/"; ?>";
    // 				window.location.href = location;
    // 			})
    // 		/* Start show alert when exit from create report page */
    // 	}

    // 	/*
    // 	 * Btn_clear
    // 	 * when click btn_clear it clear data in input type file id real-input
    // 	 * @input -
    // 	 * @output -
    // 	 * @author Chutipong
    // 	 * @Create Date 2562-08-30
    // 	 */
    // 	function btn_clear() {
    // 		$('#real-input').val('');
    // 	}

    // 	/*
    // 	 * Case_validate_email
    // 	 * Data at this site sent to input in html
    // 	 * @input message, reply_email
    // 	 * @output -
    // 	 * @author Chalongchai	
    // 	 * @Update Date 2562-09-10
    // 	 */
    // 	function validate_email() {
    // 		// When Required information is empty show alert text
    // 		// declare reply_email form input id reply_email
    // 		var reply_email = $('#reply_email').val()
    // 		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

    // 		if (reply_email.trim() == '') {
    // 			$('#reply_email').css("border", "1px solid red");
    // 			$('#reply_email').focus();
    // 			$('#validate_email_address').text('กรุณากรอกข้อมูลที่สำคัญให้ครบ')
    // 		} else {
    // 			if (emailReg.test(reply_email)) {
    // 				$('#reply_email').css("border", '');
    // 				$('#validate_email_address').text('')
    // 				// declare message = input id message 
    // 				var message = $('#message').val()
    // 				// declare input id if_email = reply_email 
    // 				$('#if_email').val(reply_email)
    // 				// declare input id message_send = message 			
    // 				$('#message_send').val(message)
    // 				/* Start alert when success */
    // 				new PNotify({
    // 					title: 'ที่อยู่ email ถูกต้อง',
    // 					text: 'ที่อยู่ email สามารถใช้งานได้',
    // 					type: 'success',
    // 					icon: 'ti ti-check',
    // 					delay: 5000
    // 				});
    // 				/* End alert when success */
    // 			} else {
    // 				$('#reply_email').css("border", "1px solid red");
    // 				$('#reply_email').focus();
    // 				$('#validate_email_address').text('กรุณากรอกที่อยู่ email ที่ถูกต้อง')
    // 				new PNotify({
    // 					title: 'ไม่มีที่อยู๋ของ email ที่ระบุ',
    // 					text: 'กรุณากรอกที่อยู่ email ที่ถูกต้อง',
    // 					type: 'warning',
    // 					icon: 'ti ti-info',
    // 					delay: 5000
    // 				});
    // 			}
    // 		}
    // 	}

    // 	/*
    // 	 * Case_send_email
    // 	 * send email from case management system to user email 
    // 	 * @input -
    // 	 * @output -
    // 	 * @author Chalongchai	
    // 	 * @Update Date 2562-09-10
    // 	 */
    // 	function case_send_email() {
    // 		// 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
    // 		// cient OAuth : 642190525149-1mrm2c92f6b9h5q567rn021kbt8pkvl9.apps.googleusercontent.com
    // 		// cient secret OAuth : jN5cobS81v8oIor81l9_MRp1
    // 		// "ssl-key token : 11994aba-1e07-48e2-87d2-70704744a9c8"
    // 		// s-token ssl : ade9d67e-984c-4a68-9723-92cab7b7546d 
    // 		// s-token tls : 0845a3cf-0b4c-45f4-b528-d4f53c5ea4fe
    // 		// ssl : 3fc34e3a-4736-4051-a9e4-6ddf0349b4a8
    // 		// When Required information is empty show alert text
    // 		if ($('#reply_email').val().trim() == '') {
    // 			new PNotify({
    // 				title: 'ส่งข้อมูลการตอบกลับไม่สำเร็จ',
    // 				text: 'กรุณากรอกข้อมูลที่สำคัญให้ครบ',
    // 				type: 'warning',
    // 				icon: 'ti ti-info',
    // 				delay: 5000
    // 			});
    // 			$('#reply_email').css("border", "1px solid red");
    // 			$('#reply_email').focus();
    // 			$('#validate_email_address').text('กรุณากรอกข้อมูลที่สำคัญให้ครบ')
    // 		} else {
    // 			// declare reply_email form input id reply_email
    // 			var reply_email = $('#reply_email').val()
    // 			// validate email
    // 			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    // 			var file = $("#real-input")[0].files[0];
    // 			if (typeof file === 'undefined') {
    // 				if (emailReg.test(reply_email)) {
    // 					// declare message = input id message 
    // 					var message = $('#message').val()
    // 					// declare input id if_email = reply_email 
    // 					$('#if_email').val(reply_email)
    // 					if (message == "") {
    // 						message = "เรื่องร้องเรียนของคุณกำลังถูกดำเนินการ"
    // 					}
    // 					// declare input id message_send = message 			
    // 					$('#message_send').val(message)
    // 					Email.send({
    // 						SecureToken: "11994aba-1e07-48e2-87d2-70704744a9c8",
    // 						To: reply_email,
    // 						From: "teamthree.cn@gmail.com",
    // 						q_name: "ระบบรับเรื่องร้องเรียนเมืองพัทยา",
    // 						Body: message
    // 					}).then(() => {
    // 						/* Start alert when success */
    // 						$.ajax({
    // 							type: "POST",
    // 							url: "<?php echo site_url() . "/Case_report_controller_ajax/case_send_email/"; ?>",
    // 							dataType: "json",
    // 							data: {
    // 								"message_send": message,
    // 								"reply_email": reply_email
    // 							},
    // 							success: function(result) {
    // 								/* Start show alert when success */
    // 								new PNotify({
    // 									title: 'ส่งข้อมูลการตอบกลับสำเร็จ',
    // 									text: 'การตอบกลับสำเร็จ',
    // 									type: 'success',
    // 									icon: 'ti ti-check',
    // 									delay: 5000
    // 								});
    // 								/* End show alert when success */
    // 							}
    // 						});
    // 						/* End alert when success */
    // 						// close modal
    // 						$('#myModal').modal('hide');
    // 						$('#real-input').val('');
    // 					});
    // 				} else {
    // 					new PNotify({
    // 						title: 'ไม่มีที่อยู๋ของ email ที่ระบุ',
    // 						text: 'กรุณากรอกที่อยู่ email ที่ถูกต้อง',
    // 						type: 'warning',
    // 						icon: 'ti ti-info',
    // 						delay: 5000
    // 					});
    // 				}
    // 			} else {
    // 				if (emailReg.test(reply_email)) {
    // 					// declare message = input id message 
    // 					var message = $('#message').val()
    // 					// declare input id if_email = reply_email 
    // 					$('#if_email').val(reply_email)
    // 					if (message == "") {
    // 						message = "เรื่องร้องเรียนของคุณกำลังถูกดำเนินการ"
    // 					}
    // 					// declare input id message_send = message 			
    // 					$('#message_send').val(message)
    // 					var reader = new FileReader();
    // 					reader.readAsBinaryString(file);
    // 					reader.onload = function() {
    // 						var dataUri = "data:" + file.type + ";base64," + btoa(reader.result);
    // 						Email.send({
    // 							SecureToken: "11994aba-1e07-48e2-87d2-70704744a9c8",
    // 							To: reply_email,
    // 							From: "teamthree.cn@gmail.com",
    // 							q_name: "ระบบรับเรื่องร้องเรียนเมืองพัทยา",
    // 							Body: message,
    // 							Attachments: [{
    // 								name: file.name,
    // 								data: dataUri
    // 							}]
    // 						}).then(() => {
    // 							/* Start alert when success */
    // 							$.ajax({
    // 								type: "POST",
    // 								url: "<?php echo site_url() . "/Case_report_controller_ajax/case_send_email/"; ?>",
    // 								dataType: "json",
    // 								data: {
    // 									"message_send": message,
    // 									"reply_email": reply_email
    // 								},
    // 								success: function(result) {
    // 									/* Start show alert when success */
    // 									new PNotify({
    // 										title: 'ส่งข้อมูลการตอบกลับสำเร็จ',
    // 										text: 'การตอบกลับสำเร็จ',
    // 										type: 'success',
    // 										icon: 'ti ti-check',
    // 										delay: 5000
    // 									});
    // 									/* End show alert when success */
    // 								}
    // 							});
    // 							/* End alert when success */
    // 							// close modal
    // 							$('#myModal').modal('hide');
    // 							$('#real-input').val('');
    // 						});
    // 					};
    // 					reader.onerror = function() {
    // 						new PNotify({
    // 							title: 'ส่งข้อมูลการตอบกลับไม่สำเร็จ',
    // 							text: 'การตอบกลับไม่สำเร็จ',
    // 							type: 'error',
    // 							icon: 'ti ti-close',
    // 							delay: 5000
    // 						});
    // 						$('#real-input').val('');
    // 					};

    // 				} else {
    // 					new PNotify({
    // 						title: 'ไม่มีที่อยู๋ของ email ที่ระบุ',
    // 						text: 'กรุณากรอกที่อยู่ email ที่ถูกต้อง',
    // 						type: 'warning',
    // 						icon: 'ti ti-info',
    // 						delay: 5000
    // 					});
    // 				}
    // 			}

    // 		}
    // 	}

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
                        'description':description,
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
                                    <label class="col-md-12">ภาษา : <span class="help"> *</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="language_id">
                                            <option value="" selected disabled style="display:none">- เลือกภาษาที่ต้องการ -</option>
                                            <?php
                                            /*start call language infomation form case_controller*/
                                            $i = 0;
                                            foreach ($rs_category as $row) {
                                            ?>
                                                <option value="<?php echo $row->ca_id; ?>"><?php echo $row->ca_name; ?></option>
                                            <?php
                                            }
                                            /*end call language infomation form case_controller*/
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
                                            <option value="" selected disabled style="display:none">- เลือกความยากที่ต้องการ -</option>
                                            <?php
                                            /*start call level infomation form case_controller*/
                                            for ($i = 1; $i <= 5; $i++) {
                                            ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
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
                                            <div class="subq">
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

                            <div class="col-md-12" align="middle">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" onclick="insert();"><span class="btn-label"><i class="mdi mdi-content-save"></i></span>บันทึก</button>
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