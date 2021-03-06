<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap template
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/js.min.js'); ?>"></script>
    <style type="text/css">
        /*--------------------------------------------------------------*/



        /*--------------------------------------------------------------*/
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;

        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 83vh;
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
                <a class="navbar-brand" href="<?php echo base_url(); ?> ">CMS</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="<?php echo base_url(); ?>home/dash">Home</a></li>
                        <?php if ($_SESSION['role'] != 'admin') { ?>
                            <li><a href="<?php echo base_url(); ?>home/profile">Profile</a></li>
                            <li><a href="<?php echo base_url(); ?>mydash">My Dashboard</a></li>

                    <?php }
                    } ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['username'])) { ?>


                        <li><a class="navbar-brand" href="<?php echo base_url(); ?>home/profile"><?= $_SESSION['username'] ?></a></li>

                        <?php echo "<li>" . form_open('home/logout'); ?>

                        <input type="submit" name="submit" value="Logout" class="btn btn-primary" style="margin: 8px"></li>
                        </form>
                </ul>
                <div class="nav navbar-nav navbar-right">
                    <a class="msgread" href="<?php echo base_url(); ?>message"></a>
                </div>
            <?php } else {
                        echo '<li><a href="' . base_url() . 'home/login">Login</a></li></ul>';
                    } ?>


            </div>
        </div>
    </nav>


    <div class="container-fluid text-center">
        <div class="row content">