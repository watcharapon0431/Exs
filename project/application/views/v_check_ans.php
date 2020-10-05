<!-- <div id="page-wrapper">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-12"> -->
                <!-- <div class="panel panel-default"> -->
                    <!-- ----------------------- Start panel heading ----------------------- -->
                    <!-- <div class="panel-heading">
                        <h2 class="box-title"><i class="fa fa-check-square-o" style="font-size:40px;"></i>&emsp;ตรวจแบบฝึกหัด</h2>
                    </div> -->
                    <!-- ----------------------- End panel heading ----------------------- -->
                <!-- </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true"> -->
                        <!-- ----------------------- Start panel body ----------------------- -->
                        <!-- <div class="panel-body">

                            
                        </div>
                    </div> -->
                    <!-- ----------------------- End panel body ----------------------- -->
                    <!-- <div class="panel-body">
                        <div class="col-md-12" style="text-align: center;">
                            <br>
                            <button class="btn btn-default waves-effect waves-light" onclick="contact_setting_cancle()"><span class="btn-label"><i class="fa fa-times"></i></span>ยกเลิก</button>
                            &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-success waves-effect waves-light" onclick="contact_setting()"><span class="btn-label"><i class="fa fa-save"></i></span>บันทึก</button>
                        </div>
                    </div> -->
                <!-- </div>
            </div>
        </div>
    </div>
</div> -->


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
                                        <th style="text-align:center; width: 40%">เรื่อง</th>
                                        <th style="text-align:center; width: 15%"">วิชา</th>
                                        <th style="text-align:center; width: 15%"">สถานะ</th>
                                        <th style="text-align:center; width: 20%"">ดำเนินการ</th>
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