<?php
include_once '../controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
    $logged_in = false;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $logged_in = true;
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
            Explore More.
        </h1>
        <p class="sub__text">
            Discover stories, thinking, and <br>
            expertise from writers on any topic.
        </p>
        <?php
        if (!$logged_in) {
        ?>
            <a href="" class="btn__primary">
                Get Started
            </a>
        <?php
        } else {
        ?>
            <a href="upload.php" class="btn__primary">
                Share your story
            </a>
        <?php
        }
        ?>
    </section>

    <section class="section__explore">
        <h2 class="section__heading">
            Explore
        </h2>
        <div class="posts__wrapper">
            <div class="posts__gutter is--1"></div>
            <div class="posts__container">
                <div class="posts__column" id="post-feed">
                    <?php
                    $posts = get_posts_oc(0, 3);
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
                        <a href="upload.php" class="btn__primary">
                            <?php
                            if (!$logged_in) {
                            ?>
                                Get Started
                            <?php
                            } else { ?>
                                <span>Share your story</span>&nbsp;&nbsp;
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            <?php
                            }
                            ?>
                        </a>
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
    <div id="load-more-posts"></div>
    <?php
    include_once './components/footer.php';
    ?>

    <script>
        function postCard(post) {
            return `
            <a class='post__card' href='post.php?id=${post.id}'>
                <div class='post__card_user_div' href='login.php'>
                    <img src='${post.user.profile_pic}' alt='' class='post__card_profile_pic'>
                    <span class='post__card_username'>
                        ${post.user.username}
                    </span>
                </div>
                <img src='${post.img_url}' alt='' class='post__image'>
                <h3 class='post__title'>
                    ${post.title}
                </h3>
                <span class='post__content'>${post.content}</span>
                <span class='date__ribbon'>${post.date}</span>
            </a>
            `;
        }

        let isLoading = false;
        let lastPost = document.querySelector('.post__card:last-child');

        function loadMorePosts() {
            isLoading = true;
            let loadMore = document.getElementById('post-feed');
            // loadMore.innerHTML = 'Loading...';

            // AJAX request to fetch more posts
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        let posts = response.posts;
                        let newPostEls = [];
                        posts.forEach(function(post) {
                            let postHtml = postCard(post);
                            let postEl = document.createElement('div');
                            postEl.innerHTML = postHtml;
                            newPostEls.push(postEl);
                        });
                        loadMore.append(...newPostEls);
                        isLoading = false;
                    } else {
                        loadMore.innerHTML = 'Failed to load more posts';
                    }
                }
            };
            const offset = document.getElementsByClassName('post__card').length;
            xhr.open('GET', 'load_more_posts.php?offset=' + offset, false);
            xhr.send();
        }

        let prevObserbedPost = null;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(async (entry) => {
                if (entry.isIntersecting && !isLoading) {
                    await loadMorePosts();
                    prevObserbedPost = entry.target;
                    observer.unobserve(entry.target);

                    const newPosts = document.querySelectorAll('.post__card');
                    lastPost = newPosts[newPosts.length - 1];
                    if (lastPost !== prevObserbedPost) {
                        observer.observe(lastPost);
                    }
                }
            });
        }, {
            threshold: 1
        });

        lastPost = document.querySelector('.post__card:last-child');
        observer.observe(lastPost);
    </script>
</body>

</html>