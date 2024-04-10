<?php
include_once '../controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.jpg" type="image/jpg">
    <title>BLOGGLE</title>
    <?php
    include_once './utils/utils.php';
    import_css('../assets/css/main.css');
    import_css('./post-style.css');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
    $bio = $user->bio;
    $profile_pic = $user->profile_pic_url;
    $title = $post->title;
    $content = $post->content;
    $img_url = $post->img_url;
    $created_at = $post->created_at;
    $date = date('M d, Y', strtotime($created_at));

    function read_more_card($post_id, $img_url, $username, $title, $content, $date)
    {
        return "
        <div class='read-more'>
            <div class='read-more-img'><img src='$img_url' alt=''>
            </div>

            <div class='read-more-body'>
                <span class='username'>$username</span>
                <a href='post.php?id=$post_id' class='read-more-heading'>$title</a>
                <p>$content</p>
                <a href='post.php?id=$post_id'>Read More</a>
            </div>
        </div>
        ";
    }

    $more_posts = get_posts_oc(0, 3);
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
                <a href="<?php echo "profile.php?user=" . $username ?>">
                    <?php
                    echo "<img class='profile-img' src='$profile_pic' alt='$fullname'>"
                    ?>
                </a>
                <div class="profile-info">
                    <span class="name"> <?php echo $fullname; ?></span>
                    <span class="username"><?php echo $username; ?></span>
                    <span class="user-info"><?php echo $bio; ?></span>
                </div>
            </div>
            <div class="second-container">
                <div class="profile-link">
                    <i class="fa-brands fa-square-github"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-square-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="profile-button">
                    <button class="profile-share">Share</button>
                </div>
            </div>
        </div>
    </section>

    <section class="third">
        <div class="blog-body">
            <h1 class="blog-title"><?php echo $title; ?></h1>
            <p class="post-body"><?php echo $content; ?></p>
        </div>
    </section>

    <section class="fourth">
        <h2 class="read-more-title">Related blog posts</h2>

        <div class="fourth-container">
            <?php
            foreach ($more_posts as $post) {
                $post_owner = User::find_by_id($post->user_id)->username;
                echo read_more_card($post->id, $post->img_url, $post_owner, $post->title, $post->content, $post->created_at);
            }
            ?>
        </div>
    </section>

    <?php include_once './components/footer.php'; ?>
</body>

</html>