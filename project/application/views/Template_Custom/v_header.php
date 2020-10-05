<?php
/*
	* v_header
	* Storage CSS path link and CSS custom template
	* @input -
	* @output -
	* @author Chutipong
	* @Create Date 2562-08-30
	*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . "assets/img/system.png"; ?>">
    <title>Exam</title>
    <!-- Bootstrap Core CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>css/colors/megna-dark.css" id="theme" rel="stylesheet">
    <!-- Sweet alert CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Fonts Kanit CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/kanit/css/fonts.css" rel="stylesheet" type="text/css">
    <!-- multiple select CSS -->
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . "assets/"; ?>/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <link href="<?php echo base_url() . "assets/"; ?>/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . "assets/"; ?>plugins/pines-notify/pnotify.css" rel="stylesheet" type="text/css" />
    <!-- Dropzone css -->
    <link href="<?php echo base_url() . "assets/"; ?>plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        button,
        label,
        select,
        input,
        table,
        div {
            font-family: 'Kanit', sans-serif !important;
        }

        #map {
            height: 300px;
            width: 670px;
        }

        #searchbox {
            width: 40%;
            margin-top: 10px;
            left: 40%;
        }

        @media screen and (max-width: 1024px) {
            #searchbox {
                width: 40%;

                left: 40%;
            }
        }

        @media screen and (max-width: 768px) {
            #searchbox {
                width: 30%;
                left: 30%;
            }

            #day_input {
                width: 20%;
            }
        }

        @media screen and (max-width: 550px) {
            #searchbox {
                visibility: hidden;
            }
        }

        span.help {
            color: red;
        }

        u {
            text-decoration: underline;
        }

        .textarea_custom {
            display: block;
            /* or inline-block */
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 3.6em;
            line-height: 1.8em;
        }

        .btn_circle {
            border-radius: 50% !important;
        }
    </style>
</head>