<?php
include_once '../controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once './utils/utils.php';
    import_css('../assets/css/main.css');
    import_css('./landing.css');
    ?>
    <title>Bloggle</title>
</head>

<body>
    <?php include_once './components/Navbar.php'; ?>

    <?php
    // check if user is logged in
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo "<script>console.log('User is logged in as: " . $user['username'] . "')</script>";
    } else {
        echo "<script>console.log('User is not logged in')</script>";
    }
    ?>

    <?php
    include_once '../controllers/PostController.php';

    function post_card(Post $post)
    {
        $user = User::find_by_id($post->user_id);
        $username = $user->username;
        $profile_pic = $user->profile_pic_url;
        $post_id = $post->id;
        $title = $post->title;
        $content = $post->content;
        $img_url = $post->img_url;
        $created_at = $post->created_at;
        $date = date('M d, Y', strtotime($created_at));

        $len = strlen($content);
        if ($len > 250) {
            $content = substr($content, 0, 250) . "...";
        }

        echo "<a class='post__card' href='post.php?id=$post_id'>
                <div class='post__card_user_div' href='login.php'>
                    <img src='$profile_pic' alt='' class='post__card_profile_pic'>
                    <span class='post__card_username'>
                        $username
                    </span>
                </div>
                <img src='$img_url' alt='' class='post__image'>
                <h3 class='post__title'>
                    $title
                </h3>
                <span class='post__content'>" . $content . "</span>
                <span class='date__ribbon'>$date</span>
            </a>";
    };
    ?>

    <section class="section__landing">
        <h1 class="main__text">
            Stay curious.
        </h1>
        <p class="sub__text">
            Discover stories, thinking, and <br>
            expertise from writers on any topic.
        </p>
        <a href="" class="btn__primary">
            Get Started
        </a>
    </section>

    <section class="section__explore">
        <h2 class="section__heading">
            Explore
        </h2>
        <div class="posts__wrapper">
            <div class="posts__gutter is--1"></div>
            <div class="posts__container">
                <div class="posts__column">
                    <?php
                    $posts = getPostsFromBefore();
                    foreach ($posts as $post) {
                        post_card($post);
                    }
                    ?>
                </div>
                <div class="sidepanel">
                    <div class="get__started">
                        <span class="text">
                            Connect with a vibrant community of
                            like-minded individuals.
                        </span>
                        <br>
                        <a href="" class="btn__primary">Get Started</a>
                    </div>
                    <blockquote class="quote">
                        EVERY STORY SHARED CREATES A
                        NEW CHAPTER IN OUR COMMUNITY'S
                        BOOK OF INSPIRATION.
                    </blockquote>
                </div>
            </div>
            <div class="posts__gutter is--2"></div>
        </div>
    </section>
    <?php
    include_once './components/footer.php';
    ?>
</body>

</html>