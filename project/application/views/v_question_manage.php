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
                                        <th style=" text-align:center;">สถานะ</th>
                                        <th style="text-align:center;"></th>
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

        // When Click toggle sorting
        $("#sorting_date").click(function() {
            if ($("#type_sorting_date").val() == "ASC") {
                $("#icon_sorting_date").attr('class', 'mdi mdi-arrow-down-bold');
                $("#type_sorting_date").val("DESC")
                report_get_table_by_page_number_search($("#current_page").val())
            } else {
                $("#icon_sorting_date").attr('class', 'mdi mdi-arrow-up-bold');
                $("#type_sorting_date").val("ASC")
                report_get_table_by_page_number_search($("#current_page").val())
            }
        })

        // call report_get_table function
        report_get_table_by_page_number_search(1)

        // start when click at row on table for display v_detail_report
        $('#report_table tbody').on('click', 'td', function() {
            // declare when click element on row table
            let check_col = $(this).index(),
                check_row = $(this).parent().index();
            // if condition when dont click on btn-delete id button 
            if (check_col != 0 && check_col != 7) {
                // set row  is colunm index 2 for sent display v_detail_report
                let $row = $(this).closest("tr"),
                    $tds = $row.find("td:nth-child(2)")
                // declare code is null string
                let code = ""

                // start loop set code value
                $.each($tds, function() {
                    code = $(this).text()
                })
                code = code.trim()
                // end loop set code value

                // let url = "<?php echo site_url() . "/Case_report_controller_ajax/report_get_detail/" ?>"
                // window.location.href = url + code
            }
        })
        // end when click at row on table for display v_detail_report

        $("#btn_search").on("click", () => {
            report_get_table_by_page_number_search(1)
        })
    })

    function report_get_table_by_page_number_search(page_number) {
        let table = $("#report_table tbody")
        let page = $("#page_option")

        table.empty()
        page.empty()

        let count_of_master_data = $("#count_of_master_data")
        count_of_master_data.empty()

        $('#current_page').val(page_number)

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/Question_manage_controller/question_data_table/" ?>",
            data: {},
            dataType: 'JSON',
            async: false,
            success: function(json_data) {
                let count_data = 0

                if (json_data.rs_question.length > 0) {
                    // start loop foreach display case's data on table
                    json_data.rs_question.forEach(function(element) {
                        table.append($('<tr>')
                            .append($('<td>').append("<center>" + element.q_seq + "</center>"))
                            .append($('<td>').append(element.q_name))
                            .append($('<td>').append("<center>" + element.ca_name + "</center>"))
                            .append($('<td>').append("<center>" + element.q_status + "</center>"))
                            .append($('<td>').append("<center>" + element.btn_edit + ' ' + element.btn_delete + "</center>"))
                        )
                        count_data++
                    })
                    // end loop foreach display case's data on table
                    // console.log(table);
                    //--------------------------------  start declare count number pagination -------------------------------------------------
                    let count_section_page = $("#section_page").val()
                    let current_page = $("#current_page").val()
                    let max_page = json_data.count_question / 10
                    if (json_data.count_question % 10 != 0) {
                        max_page++
                    }
                    if ((count_section_page * 10) % 10 != 0) {
                        count_section_page = Math.floor(count_section_page)
                        count_section_page++
                        $("#section_page").val(count_section_page)
                    }
                    max_page = Math.floor(max_page)
                    let count_loop = null
                    if (max_page >= 10) {
                        count_loop = (10 * count_section_page) - 9
                    } else if (max_page < 10) {
                        count_loop = 1
                    }
                    //---------------------------------  end declare count number pagination --------------------------------------------------

                    page.append('<a style="color:black; " href="javascript:report_search_first_page()">&emsp;< |&emsp;</a>')
                    page.append('<a style="color:black; " href="javascript:report_search_page_previous()">&emsp;<&emsp;</a>')
                    $("#count_of_master_data").text("แสดง " + count_data + " ข้อมูล จาก " + json_data.count_question + " ข้อมูล")
                    for (count = count_loop; count <= max_page; count++) {
                        if (count <= count_section_page * 10) {
                            if (current_page == count) {
                                page.append('<a style="color:#0000FF; font-weight:bold" href="javascript:report_get_table_by_page_number_search(' + count + ')">&emsp;' + count + '&emsp;</a>')
                            } else {
                                page.append('<a style="color:black; " href="javascript:report_get_table_by_page_number_search(' + count + ')">&emsp;' + count + '&emsp;</a>')
                            }

                        }
                    }
                    page.append('<a style="color:black; " href="javascript:report_search_page_next(' + max_page + ')">&emsp;>&emsp;</a>')
                    page.append('<a style="color:black; " href="javascript:report_search_last_page(' + max_page + ')">&emsp;| >&emsp;</a>')
                } else {
                    let text_no_data = '<center><b><p>ไม่มีรายการแบบทดสอบ</p></b></center>'
                    table.append($('<tr>').append('<td colspan="8">' + text_no_data + '</td>'))
                }
                // end if condition when have case's data equal or more than 1 data
            }
        })
    }

    function report_get_table_by_page_number_search(page_number) {
        let table = $("#report_table tbody")
        let page = $("#page_option")

        table.empty()
        page.empty()

        let count_of_master_data = $("#count_of_master_data")
        count_of_master_data.empty()

        $('#current_page').val(page_number)

        // set type_sorting_date 
        let type_sorting_date = $("#type_sorting_date").val()

        let user_login = '<?php echo $this->session->case_code; ?>'
        let user_login_position = null
    }

    function report_search_page_previous() {
        let current_page = $('#current_page').val()
        if (current_page > 1) {
            if (current_page % 10 == 1) {
                let new_section_page = parseInt($('#section_page').val()) - 1
                $('#section_page').val(new_section_page)
            }
            page_temp = parseInt($('#current_page').val()) - 1
            report_get_table_by_page_number_search(page_temp)
        }
    }

    function report_search_page_next(max_count) {
        let current_page = $('#current_page').val()
        if (current_page < max_count) {
            if (current_page % 10 == 0 && current_page != max_count) {
                let new_section_page = parseInt($('#section_page').val()) + 1
                $('#section_page').val(new_section_page)
            }
            page_temp = parseInt($('#current_page').val()) + 1
            report_get_table_by_page_number_search(page_temp)
        }
    }

    function report_search_first_page() {
        $('#section_page').val(1)
        report_get_table_by_page_number_search(1)
    }

    function report_search_last_page(max_count) {
        let change_section_page_value = max_count
        if (max_count >= 10) {
            change_section_page_value = (max_count / 10)
        }
        $('#section_page').val(change_section_page_value)
        report_get_table_by_page_number_search(max_count)
    }
</script>