<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- ----------------------- Start panel heading ----------------------- -->
                    <div class="panel-heading">
                        <h2 class="box-title"><i class="fa fa-list-alt" style="font-size:40px;"></i>&emsp;จัดการแบบฝึกหัด</h2>
                    </div>
                    <!-- ----------------------- End panel heading ----------------------- -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <!-- ----------------------- Start panel body ----------------------- -->
                        <div class="panel-body">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <h2><i class="mdi mdi-email-outline" style="font-size:30px;"></i>&emsp;รายการเรื่องร้องเรียน</h2>
                            </div>
                            <div class="col-md-6" align="right">
                                <br>

                                <!-- --------------------------------------------- start report insert button ------------------------------------------------------ -->
                                <a id="insert-btn" href="<?php echo site_url(); ?>/Case_report_controller_ajax/load_v_create_report" class="btn btn-info" type="button" class="model_img img-responsive">
                                    <span class="btn-label"><i class="mdi mdi-plus-circle "></i></span>เพิ่มเรื่องร้องเรียน
                                </a>
                                <!-- ---------------------------------------------- end report insert button ------------------------------------------------------- -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-4">

                                <!-- --------------------------------------------- start report channel select search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">ช่องทางการติดต่อ : </label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="channel_id">
                                            <option value="" selected>- เลือกช่องทางของแหล่งข้อมูลที่ต้องการ -</option>
                                            <?php
                                            foreach ($rs_channel as $row) {
                                            ?>
                                                <option value="<?php echo $row->channel_id; ?>"><?php echo $row->name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- ---------------------------------------------- end report channel select search ------------------------------------------------------- -->

                            </div>
                            <div class="col-md-4">

                                <!-- --------------------------------------------- start report type select search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">ประเภทเรื่องร้องเรียน : </label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="category_id">
                                            <option value="" selected>- เลือกประเภทเรื่องร้องเรียนที่ต้องการ -</option>
                                            <?php
                                            foreach ($rs_category as $row) {
                                            ?>
                                                <option value="<?php echo $row->category_id; ?>"><?php echo $row->name; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- ---------------------------------------------- end report type select search ------------------------------------------------------- -->

                            </div>
                            <div class="col-md-4">

                                <!-- --------------------------------------------- start report status select search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">สถานะ : </label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="case_status_id">
                                            <option value="" selected>- เลือกสถานะที่ต้องการ -</option>
                                            <option value="1">ฉบับร่าง</option>
                                            <option value="2">ระหว่างการดำเนินการ</option>
                                            <option value="3">ได้ข้อยุติ</option>
                                            <option value="4">ไม่สามารถดำเนินการได้</option>
                                            <option value="5">รอเจ้าหน้าที่รับเรื่อง</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- ---------------------------------------------- end report status select search ------------------------------------------------------- -->

                            </div>
                            <div class="col-md-4">

                                <!-- --------------------------------------------- start report position select search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <br>
                                    <label class="col-md-12">ผู้ดำเนินการ : </label>
                                    <div class="col-md-12">
                                        <select class="form-control" id="case_position_id">
                                            <option value="" selected>- เลือกสถานะที่ต้องการ -</option>
                                            <option value="0">เจ้าหน้าที่ Contact Center</option>
                                            <option value="1">เจ้าหน้าที่ ศอท. (สํานักงาน)</option>
                                            <option value="2">เจ้าหน้าที่ ศอท. (ภาคสนาม)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- ---------------------------------------------- end report position select search ------------------------------------------------------- -->

                            </div>
                            <div class="col-md-4">
                                <br>

                                <!-- --------------------------------------------- start date_begin input search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">วันที่เริ่มต้น : </label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="date_begin" placeholder="วัน/เดือน/ปี"> <span class="input-group-addon"><i class="icon-calender"></i></span>

                                        </div>
                                    </div>
                                </div>
                                <!-- ---------------------------------------------- end date_begin input search ------------------------------------------------------- -->

                            </div>

                            <div class="col-md-4">
                                <br>

                                <!-- --------------------------------------------- start date_end input search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">วันที่เสร็จสิ้น : </label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="date_end" placeholder="วัน/เดือน/ปี"> <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- ----------------------------------------------- end date_end input search -------------------------------------------------------- -->

                            </div>
                            <div class="col-md-4">
                                <br>

                                <!-- --------------------------------------------- start keyword input search ------------------------------------------------------ -->
                                <div class="form-group">
                                    <label class="col-md-12">คำค้นหา : </label>
                                    <div class="col-md-12">
                                        <input type="text" id="keyword" class="form-control" placeholder="คำต้น ชื่อเรื่อง รายละเอียด">
                                    </div>
                                </div>
                                <!-- --------------------------------------------- end keyword input search ------------------------------------------------------ -->

                            </div>



                            <div class="col-md-8" align="right">
                                <br><br>

                                <!-- --------------------------------------------- start search button ------------------------------------------------------ -->
                                <button id="btn_search" class="btn btn-primary" type="button">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหา
                                </button>
                                <!-- ---------------------------------------------- end search button ------------------------------------------------------- -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">เลือกรายการที่ต้องการลบ</h3>
                    <button class="btn btn-block btn-danger" style="width:80px;height:35px;" type="button" id="btn_multiple_delete"><span class="btn-label "><i class="fa fa-minus-circle"></i></span>ลบ</button>
                    <br>
                    <div class="table-responsive">
                        <div class="dataTables_wrapper no-footer">

                            <!-- --------------------------------------------- start report data table ------------------------------------------------------ -->
                            <table id="report_table" class="table table-striped dataTable no-footer display" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            <input type="checkbox" id="check_all">
                                        </th>
                                        <th style="text-align:center;">เลขที่รับเรื่อง</th>
                                        <th style="text-align:center;">เรื่อง</th>
                                        <th style="text-align:center;">ผู้รับเรื่อง</th>
                                        <th style="text-align:left;">ลงวันที่</th>
                                        <th style="text-align:left;">วันที่แก้ไขล่าสุด&emsp;
                                            <span id="sorting_date"><i id="icon_sorting_date" class="mdi mdi-arrow-down-bold"></i></span>
                                            <input type="hidden" id="type_sorting_date" value="DESC">
                                        </th>
                                        <th style="text-align:center;">สถานะ</th>
                                        <th style="text-align:center;"></th>
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