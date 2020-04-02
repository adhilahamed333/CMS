<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .container {
            width: 100%;
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style-type: none;
            float: left;
            width: 12.5%;
            position: relative;
            text-align: center;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 1px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
            border-color: #ddd;
        }

        .progressbar li:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #ddd;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .progressbar li.active {
            color: green;
        }

        .progressbar li.active:before {
            border-color: green;
        }

        .progressbar li.active:after {
            background-color: green;
        }

        .progressbar li.deactive {
            color: red;
        }

        .progressbar li.deactive:before {
            border-color: red;
        }

        .progressbar li.deactive:after {
            background-color: red;
        }


        /*--------------------------------------------------------------*/



        /*--------------------------------------------------------------*/
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CMS</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <?php if (isset($_SESSION['username'])) { ?><ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>index.php/home/dash">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/profile">Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/mydash">My Dashboard</a></li>

                    </ul><?php } ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo form_open('home/logout');
                        echo '<div class="form-group"  style="margin-top:8px,margin-bottom:1px">
        <input type="submit" name="submit" value="Logout" class="btn btn-primary">
    </div>
    </form>';
                    } else {
                        echo '<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="row content">