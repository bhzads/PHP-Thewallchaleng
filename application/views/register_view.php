<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>
<head>
<title>Reddit Alpha</title>
</head>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h2>Howdy, Welcome to Reddit!</h2>
        </div> 
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Register</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                if (!empty($errorsMsg)) {
                    echo '<div class="alert alert-danger" role="alert">' . $errorsMsg . '</div>';
                }
                if (!empty($success)) {
                    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                }
                ?>
                <!-- Start form -->
                <form action="/register" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="conf-password" id="password" placeholder="Confirm Password">
                    </div>
                    <div class="form-check">
                        <button class="btn btn-info" type="reset">Reset</button>
                        <button type="submit" class="btn btn-primary" name="signin">Register</button>
                    </div>

                </form>
                <!-- End form -->
            </div>
        </div>




    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger" role="alert">' . $errors . '</div>';
                }
                if (!empty($success)) {
                    echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                }
                ?>
                <!-- Start form -->
                <form action="/login" method="POST">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
                    </div>
                    <div class="form-check">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                </form>
                <!-- End form -->
            </div>
        </div>
    </div>


    </div>

<?php

$this->load->view('layout', [
        'content' => ob_get_clean(),
        'user' => $user
]);
