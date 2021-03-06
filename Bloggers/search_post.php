<?php 


include 'connect_db.php';
$database=new database();
$db = $database->connect_pdo();


?>

<html lang="en-US">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Our Blogs | Find Affordable Legal Help with us </title>

    <meta name="description" content="Hello bloggers">



    <?php include("head_libs.php"); ?>


</head>

<body class="fontb bg33">

    <?php include "header.php"; ?>

    <div class="jumbotron jumbotron-fluid bg1 blog_bg border-0">
        <div class="container paddings text-left">
            <p class="size55 text-white text-left b7 m-0" style="line-height: 1.3;">Start Your Blogging Journey <span
                    class="text-primary b8">Now</span></p>
            <button class="btn btn-primary text-white b8  pl-5 pr-5 pt-4 pb-4 mt-5 btn-lg text-center"
                style="border-radius: 38px;" onclick="window.location.href='signup.php'">Sign Up Now</button>
        </div>
    </div>

    <section class="bg-transparent text-dark mt-5 pr-3 pl-3">
        <div class="container p-0">
            <div class="row">

                <div class="col-xl-8 col-lg-8 col-md-8  col-sm-12 col-12 pt-4 mb-3">

                    <?PHP
                    if(isset($_POST['serbtn'])){
                        
                        $serval=$_POST['sertitle'];

                        $serval="%$serval%";

                        $query="select * from posts where title like :title"; 
                       
                        $stmt=$db->prepare($query);

                        if($stmt){
                            $stmt->bindParam(':title',$serval);
                            $stmt->execute();
                            if($stmt->rowCount()>0){
                                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    // $id = $row['id'];
                                    $permalink = $row['permalink'];
                                    $title = $row['title'];
                                    $image = $row['image'];
                                    $date = $row['date'];
                                    $content= $row['content'];
                                ?>

                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 card bg-white mb-5 card shadow rounded-0 p-0">

                        <img src="admin/post_images/<?php echo $image; ?>" class="img-fluid images" />

                        <div class="card-body p-5 text-dark">

                            <p class="text-black-50 text-left font-weight-bold m-0 p-0">
                                <span class="text-dark">Author: </span>
                                <!-- <a href="#" class="size15 b7 text-primary"><?php //echo $r['username']; ?></a> -->
                            </p>

                            <p class="text-black-50 text-left font-weight-bold mt-1 mb-3">
                                <span class="text-dark">Published Date: </span>
                                <span class="size15 b7">
                                    <?php 
                                    $arr = explode('-', $date);
                                    $post_date = $arr[2] . '-' . $arr[0] . '-' . $arr[1];
                                    echo date("M d, Y", strtotime($post_date));
                                    ?>
                                </span>
                            </p>

                            <a href="/<?php //echo $post_url; ?>" class="blog_hov1 nav-link p-0">
                                <h3 class="font_meri">
                                    <?php echo $title; ?>
                                </h3>
                            </a>

                            <p class="text-dark fontb text-left pt-2 ">
                                <?php
                                $post_content = strip_tags($content);
                                $post_content = substr($post_content, 0, 240);
                                echo "<p class='card-text text-secondary text-justify size16 decor' >$post_content...</p>";
                                ?>
                            </p>

                            <a href="index.php?sp=<?php echo $permalink; ?>"
                                class="nav-link size14 text-primary font-weight-bold mt-2 p-0">
                                Read More <i class="fas fa-angle-double-right fa-1x"></i>
                            </a>
                        </div>
                    </div>

                    <?PHP
                    }}else
                        echo "<p class='bg-danger rounded text-white b7 p-3 m-5 size15 '>No record found</p>";
                    }}?>

                </div>


                <div class="col-xl-4 col-lg-4 col-md-4 mb-5 col-sm-12 col-12">

                    <div class="pt-4" style="position:sticky; top:0;">
                        <div id="searchbox" class="card shadow rounded-0 mb-5">
                            <div class="card-body pt-4 pb-4">
                                <h6 class="font-weight-bold pl-1">Search Article</h6>

                                <form method="post" action="search_post.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="text" class="form-control col-7  ml-3 rounded-0" name="sertitle"
                                            placeholder="Search" size="25">
                                        <input type="submit" name="serbtn"
                                            class="btn btn-primary col-3 size13 font-weight-bold  rounded-0"
                                            value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="card  bg-white set_img shadow rounded-0 pb-5" style="display: table-cell;">
                            <p class="size22 font-weight-bold text-white p-3 mt-0 bg-primary">Recently Uploaded</p>
                            <div class="card-body text-dark">


                                <?php

                            $query = "select * from posts order by 1 DESC LIMIT 0,5";

                            $stmt = $db->prepare($query);

                            if($stmt){
                                $stmt->execute();
                                if($stmt->rowCount()>0){
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                $post_id = $row['id'];
                                $post_url = $row['permalink'];
                                $title = $row['title'];
                                $image = $row['image'];
                                $post_date = $row['date'];


                                $arr = explode('-', $post_date);
                                $post_date = $arr[2] . '-' . $arr[0] . '-' . $arr[1];

                            ?>
                                <div class="">
                                    <!-- <a href="/<?php //echo $post_url; ?>" class="col-5 d-block mr-0 pr-0">
                                        <img src='admin/post_images/<?php //echo $image; ?>' width='100' height='100' />
                                    </a> -->

                                    <a href="?sp=<?php echo $post_url; ?>" class="blog_hov1 d-block nav-link p-0">
                                        <h6 class="font-weight-bold m-0 size18">
                                            <!-- Family Law Attorney, Dayton, Ohio -->
                                            <?php echo $title; ?>
                                            <p class="size14 text-black-50 text-left font-weight-bold">
                                                <?php echo date("M d, Y", strtotime($post_date)); ?>
                                            </p>
                                        </h6>
                                    </a>


                                    <hr>
                                </div>


                                <?php }}} ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>




    <?php include("footer.php"); ?>


    <?php include("footer_libs.php"); ?>


</body>

</html>