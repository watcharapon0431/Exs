<style>
    div.white-box {
        border-style: solid;
        border-width: 5px;
        border-color: gray;
        margin: 10px;
    }

    .img-logo-login {
        margin-top: 25rem;
        margin-left: 10rem;
    }

    @media only screen and (max-width: 1000px) {
        .img-logo-login {
            margin-top: 0rem;
            margin-left: 0rem;
        }
    }
</style>
<script>
    // start $(document).ready()
    $(document).ready(function() {

        // when press enter button on login-btn (ID HTML) call login_authentication
        $('body').keypress(function(event) {
            if (event.key === "Enter") {
                login_authentication()
            }
        });

        // when click on login-btn (ID HTML) call login_authentication
        $('body').on('click', '.login-btn', function(event) {
            login_authentication()
        });

        $("#case_forget_username").keyup(function() {
            /* Start validate_username */
            if ($('#case_forget_username').val() == '') {
                $('#case_forget_username').css("border", "1px solid red");
                $('#case_forget_username').focus();
                $('#validate_username').text('กรุณาระบุชื่อผู้ใช้งาน')
            }
            /* End validate_username */
        });

        $("#case_forget_password").keyup(function() {
            /* Start validate con_phone_no */
            if ($('#case_forget_password').val() == '') {
                $('#case_forget_password').css("border", "1px solid red");
                $('#case_forget_password').focus();
                $('#validate_email_address').text('กรุณาระบุอีเมลที่มีอยู่ในระบบ')
            }
            /* End validate con_phone_no */
        });
    });
    // end $(document).ready()

    // ตรวจสอบการเข้าสู่ระบบ
    function login_authentication() {

        let user_username = $('#user_username').val()
        let user_password = $('#user_password').val()

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/User_controller/login_authentication/"; ?>",
            data: {
                'user_username': user_username,
                'user_password': user_password
            },
            dataType: 'JSON',
            async: false,
            success: function(json_data) {
                if (json_data.check) {
                    swal({
                        title: 'เข้าสู่ระบบสำเร็จ',
                        text: 'สวัสดีคุณ ' + json_data.user[0].user_fname + ' ' + json_data.user[0].user_lname,
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                        document.getElementById("loginform").submit()
                    }, 1500)
                } else {
                    swal({
                        title: 'เข้าสู่ระบบไม่สำเร็จ',
                        text: 'กรุณาทำการล็อคอินใหม่',
                        type: 'error',
                        confirmButtonText: 'ตกลง'
                    });
                }

            }
        })
    }

    function htmlEntities(str) {
        // converts special characters into their escaped/encoded values
        return String(str).replace(/<\/?[^>]+>/ig, " ").replace(/&emsp;/ig, " ");
    }
</script>

<div class="login-box login-sidebar" align="middle">
    <div class="white-box border">
        <form class="form-horizontal form-material" id="loginform" action="<?php echo site_url() . '/Question_manage_controller/load_v_question_manage'; ?> ">
            <img src="<?php echo base_url() . "assets/img/documents.png"; ?>" width="50%">
            <h3 style="font-weight: bold;">Exam System</h3>
            <h5>ระบบทำแบบฝึกหัดออนไลน์</h5>
            <br>
            <div class="form-group m-t-40">

                <div class="col-xs-12">

                    <!-- ---------------------------- start case_username input section --------------------------------- -->
                    <label>ชื่อผู้ใช้งาน : </label>
                    <input class="form-control" id="user_username" type="text" required="" placeholder="Username">
                    <!-- ----------------------------- end case_username input section ---------------------------------- -->

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">

                    <!-- ---------------------------- start case_password input section --------------------------------- -->
                    <label>รหัสผ่าน : </label>
                    <input class="form-control" id="user_password" type="password" required="" placeholder="Password">
                    <!-- ----------------------------- end case_password input section ---------------------------------- -->

                </div>
            </div>
            <div class="form-group text-center m-t-20">

                <!-- ---------------------------- start button -> "เข้าสู่ระบบ" and call document ready function section --------------------------------- -->
                <div class="col-xs-12">
                    <button type="button" id="login" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light login-btn">เข้าสู่ระบบ</button>
                </div>
                <!-- ----------------------------- end button -> "เข้าสู่ระบบ" and call document ready function section ---------------------------------- -->

            </div>
        </form>
    </div>
</div>

<style>
    .login-box {
        margin-right: 40%;
    }
</style>