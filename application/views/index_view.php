<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>
<head>
<title>Reddit Feed</title>
</head>

<?php if( !empty($user) ) { ?>
    
    <div class="jumbotron">
        <div class="container">
            <h2>Welcome to Reddit!</h2>
            
        </div>
    </div>

    <div class="container">

        <?php
        if (!empty($errorsPost)) {
            echo '<div class="alert alert-danger" role="alert">' . $errorsPost . '</div>';
        }
        if (!empty($successPost)) {
            echo '<div class="alert alert-success" role="alert">' . $successPost . '</div>';
        }
        ?>

        <!-- <?php if( !empty($user) ) { ?> -->
        <div class="row">
            <div class="col-md-12">
            <h3>Post on Reddit.</h3>
                <form action="/post/add" method="post">
                    <textarea name="text" id="" cols="30" rows="10"
                              class="form-control"></textarea>
                    <button class="btn btn-warning">.  .Post.  .</button>
                </form>
            </div>
        </div>
       
        <!-- <?php } ?> -->
            
        <div class="row">
            <div class="col-md-12">
                <h2>All Posts</h2>
            </div>
        </div>

        <?php
        if (!empty($forbiddenUser)) {
            echo '<div class="alert alert-danger" role="alert">' . $forbiddenUser . '</div>';
        }
        ?>

        <?php foreach($posts as $post) { ?>
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-12">
                <p><?= $post['text']; ?></p>
                <h4>Uploader: <?= $post['fullname']; ?>
                    <span class="help-block" style="display: inline-block">
                        <?= date("F j, Y, g:i a", strtotime($post['create_date'])); ?>
                    </span>
                    | <?= $post['upvoet']; ?> Upvoetes |<a href="/post/upvoet/<?= $post['id'] ?>" class="btn btn-success"> Upvoet</a>
                </h4>
                
                   
                
                
                <?php if( !empty($user) && $post['user_id'] === $user['id'] ) { ?>
                <p>
                    <a href="/post/delete/<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                </p>

                <?php } ?>
            </div>
        </div>
        <hr/>
        <?php } ?>
    </div>

    <?php } else {redirect('/login');}?>


<?php
$this->load->view('layout', [
        'content' => ob_get_clean(),
        'user' => $user
]);
