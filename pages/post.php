<?php
include_once '../controllers/UserController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGGLE</title>
    <!-- <link rel="stylesheet" href="post-style.css"> -->
    <?php
    include_once './utils/utils.php';
    import_css('../assets/css/main.css');
    import_css('./post-style.css');
    ?>
</head>

<body>
    <!-- <header class="header">
        <nav class="navbar">
            <span class="blog-logo"><img width="50" src="logo.svg" alt=""></span>
            <div>
                <span><a href="" class="btn">HOME</a></span>
                <span><a href="" class="btn">DISCOVER</a></span>
                <span><a href="" class="btn">SEARCH</a></span>
                <span><a href="" class="btn">SIGN IN</a></span>

            </div>
        </nav>
    </header> -->
    <header>
        <?php
        include_once './components/Navbar.php';
        ?>
    </header>

    <div class="separation"></div>

    <?php
    include_once '../controllers/PostController.php';
    include_once '../models/Post.php';

    if (!isset($_GET['id'])) {
        return;
    }

    $post_id = $_GET['id'];
    $post = Post::find_by_id($post_id);
    $user = User::find_by_id($post->user_id);
    $username = $user->username;
    $fullname = $user->fullname;
    $profile_pic = $user->profile_pic_url;
    $title = $post->title;
    $content = $post->content;
    $img_url = $post->img_url;
    $created_at = $post->created_at;
    $date = date('M d, Y', strtotime($created_at));

    ?>

    <section class="first">
        <div class="first-container">
            <?php
            echo "<img class='blog-img' src='$img_url' alt='$title'>"
            ?>
        </div>
    </section>

    <section class="second">
        <div class="card">
            <div class="profile">
                <!-- <div class="profile-img"> -->
                <?php
                echo "<img class='profile-img' src='$profile_pic' alt='profile-pic'>"
                ?>
                <!-- </div> -->
                <div class="profile-info">
                    <span class="name">
                        <?php
                        echo $fullname;
                        ?>
                    </span>
                    <span class="username">
                        <?php
                        echo $username;
                        ?>
                    </span>
                </div>
            </div>
            <h1 class="card-title">
                <?php
                echo substr($title, 0, 20);
                ?>
            </h1>
            <p class="card-body">
                <?php
                echo substr($content, 0, 500);
                ?>
            </p>
        </div>
    </section>

    <section class="third">
        <div class="blog-body">
            <h2 class="sub-title">
                <?php
                echo $title;
                ?>
            </h2><br>
            <p>
                <?php
                echo $content;
                ?>
            </p>
        </div>
    </section>

    <section class="fourth">
        <h2 class="read-more-title">Related blog posts</h2>

        <div class="fourth-container">
            <div class="read-more">
                <div class="read-more-img"><img src="img2.jpg" alt="">
                </div>

                <div class="read-more-body">
                    <span class="username">dustinmoskovitz</span>
                    <a href="#" class="read-more-heading">Lorem ipsum dolor sit amet.</a>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur libero impedit hic voluptas
                        eligendi quae tenetur obcaecati atque doloribus earum porro dolores maxime nostrum doloremque
                        molestias aspernatur reprehenderit, nulla id. Illo aliquid, quae architecto quidem vero
                        molestias voluptatum aspernatur fugiat omnis quam consequatur blanditiis aperiam, repellendus
                        veniam laboriosam obcaecati recusandae.
                    </p>
                    <a href="#">Read More</a>
                </div>
            </div>

            <div class="read-more">
                <div class="read-more-img"><img src="img3.jpg" alt="">
                </div>

                <div class="read-more-body">
                    <span class="username">dustinmoskovitz</span>
                    <a href="#" class="read-more-heading">Lorem ipsum dolor sit amet.</a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut molestiae, laboriosam nostrum
                        accusamus fugit totam ratione iste, provident cumque sunt debitis sit facilis porro aliquam
                        reprehenderit magni dolor esse dignissimos deserunt exercitationem quibusdam id, sint sequi!
                        Repudiandae ut, aut delectus minima optio deleniti excepturi voluptatibus unde, quisquam quidem
                        provident assumenda.
                    </p>
                    <a href="#">Read More</a>
                </div>
            </div>

            <div class="read-more">
                <div class="read-more-img"><img src="img4.jpg" alt="">
                </div>

                <div class="read-more-body">
                    <span class="username">dustinmoskovitz</span>
                    <a href="#" class="read-more-heading">Lorem ipsum dolor sit amet.</a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum laboriosam quibusdam possimus
                        facere asperiores fugiat ipsum illum, assumenda necessitatibus est fuga dolorem rerum
                        exercitationem enim, voluptatum excepturi reprehenderit eum consequatur beatae? Aspernatur,
                        adipisci voluptates id dignissimos, fugiat sunt itaque nam ipsum, quod veritatis architecto fuga
                        hic blanditiis neque quibusdam ea.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui consectetur saepe molestias et. Vel
                        corrupti architecto nesciunt quia sint dicta ducimus debitis totam facere, ratione maiores ex
                        consequuntur incidunt iure magni fugiat ut, tempore excepturi reiciendis suscipit magnam. Neque,
                        illum?
                    </p>
                    <a href="#">Read More</a>
                </div>
            </div>

        </div>
    </section>
    <?php
    include_once './components/footer.php';
    ?>
</body>

</html>