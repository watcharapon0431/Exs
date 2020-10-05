<style>
    #header_3 {
        margin-top: 13px;
    }

    #login {

        text-align: right;
    }

    #login button {
        margin-top: 8px;
        margin-right: 13px;
        width: 140px;
        height: 45px;
    }

</style>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="#">
                        <img src="<?php echo base_url() . "assets/"; ?>img/admin-logo.png" alt="home" class="light-logo" />
                        </b>
                        <span class="hidden-xs"><img src="<?php echo base_url() . "assets/"; ?>img/admin-text.png" alt="home" class="light-logo" /></span>
                    </a>
                </div>
                <div id="login">
                    <a href="<?php echo site_url(); ?>/Exs_controller/index" class="waves-effect">
                        <button type="button" class="btn btn-info btn-lg"><i class="fa fa-sign-in"></i>&emsp;เข้าสู่ระบบ</button>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu"></span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li class="devider"></li>
                <li>
                    <a href="<?php echo site_url(); ?>/Exs_controller/index " class="waves-effect">
                        <span class="hide-menu">
                            <i class="mdi mdi-home"></i>&emsp;หน้าหลัก
                            <span class="fa arrow"></span>
                            <span class="label label-rouded label-inverse pull-right">2</span>
                        </span>
                    </a>
                </li>
                <li class="devider"></li>
                <li>
                    <a href="<?php echo site_url(); ?>/Exs_controller/index" class="waves-effect">
                        <span class="hide-menu">
                            <i class="mdi mdi-clipboard-text"></i>&emsp;เเจ้งเรื่องร้องเรียน
                            <span class="fa arrow"></span>
                            <span class="label label-rouded label-inverse pull-right">4</span>
                        </span>
                    </a>
                </li>
                <li class="devider"></li>
                <li>
                    <a href="<?php echo site_url(); ?>/Exs_controller/index" class="waves-effect">
                        <span class="hide-menu">
                            <i class="mdi mdi-clipboard-text"></i>&emsp;ติดตามเรื่องร้องเรียน
                            <span class="fa arrow"></span>
                            <span class="label label-rouded label-inverse pull-right">4</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>