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
    import_css('./components/Navbar.css');
    import_css('../assets/css/main.css');
    import_css('./profile.css')
    ?>
    <title>Bloggle</title>
</head>

<body>

    <?php include_once './components/Navbar.php'; ?>

    <?php
    include_once '../controllers/UserController.php';
    include_once '../models/User.php';
    include_once '../models/Post.php';

    if (!isset($_GET['user'])) {
        return;
    }

    $username = $_GET['user'];
    $user = User::find_by_username($username);
    $fullname = $user->fullname;
    $bio = $user->bio;
    $profile_pic = $user->profile_pic_url;
    $created_at = $user->created_at;
    $date = date('M d, Y', strtotime($created_at));
    $posts_count = $user->posts_count;
    $posts = Post::find_by_user_id($user->id);


    function read_more_card($post_id, $img_url, $username, $title, $content, $date)
    {
        return "
        <a href='post.php?id=$post_id'>
        <div class='read-more' href='post.php?id=$post_id'>
            <div class='read-more-img'><img src='$img_url' alt=''>
            </div>

            <div class='read-more-body'>
                <a href='post.php?id=$post_id' class='read-more-heading'>$title</a>
                <p>$content</p>
            </div>
        </div>
        </a>
        ";
    }

    $all_posts = Post::find_by_user_id($user->id);
    ?>

    <div class="first-part">

        <div class="profile-header">
            <div class="image-section">
                <img src="<?php echo $profile_pic; ?>" alt="<?php echo $username; ?>">
            </div>
            <div class="about-section">
                <div class="name">
                    <?php echo $fullname; ?>
                </div>
                <div class="userid">
                    @<?php echo $username; ?>
                </div>
                <textarea id="bio" class="bio" contenteditable="false" readonly>
                    <?php echo $bio; ?>
                </textarea>
                <div class="edit-bio" id="edit-bio">
                    <span class="material-symbols-outlined">
                        edit_square
                    </span>
                    <span>Edit Bio</span>
                </div>
            </div>
        </div>
        <div class="all-posts">
            SEE ALL POSTS
        </div>
    </div>
    <!-- <section class="first">
    

        <div class="container">

            <div class="card">

                <div class="img">

                    <img src="DP.jpg" alt="">

                </div>

                <div class="innerContainer">

                    <div class="profile name">

                        <h1>@Aryan.Raj_59 </h1>

                        <div class="bio">

                            <h4>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nemo numquam vel cumque ullam
                                    alias sequi suscipit velit! Enim cumque aperiam tempore tenetur?
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti itaque voluptatum, ratione,
                                    eligendi incidunt alias ab obcaecati, consequuntur laudantium similique aut dolor? Deleniti
                                    facere maiores nisi possimus voluptas similique hic.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus maiores inventore ea dolor eos,
                                    deserunt quam voluptate soluta facilis sequi. Quasi neque saepe nisi vero sapiente laboriosam,
                                    modi ratione perspiciatis,
                                    quisquam veniam quam asperiores earum dicta? Iste quo ea dolorum unde dolor fuga ipsum numquam velit modi vitae.
                                    Quaerat blanditiis commodi perferendis aspernatur et laboriosam unde dolorum iusto, sequi nisi culpa placeat corporis
                                    alias maxime pariatur, deserunt eos perspiciatis maiores fugiat atque optio. Nisi, laudantium! Quas libero optio
                                    quae fuga
                                    explicabo possimus esse distinctio dignissimos alias autem non adipisci quo illum nemo accusamus beatae illo velit,
                                    ullam quod recusandae? In.
                            </h4>
                            </p>

                        </div>


                        <a href="" class="button">
                            Collaborate
                        </a>

                    </div>

                </div>

            </div>


    </section>

    <section class="second">

        <div class="post_heading">


            <div class="content_of_the_box">

                <p>
                <h2>See all the Posts</h2>
                </p>

            </div>

        </div>

    </section> -->

    <section class="three">

        <div class="post_grid">
            <?php
            foreach ($all_posts as $post) {
                echo read_more_card($post->id, $post->img_url, $username, $post->title, $post->content, $post->created_at);
            }
            ?>
        </div>

    </section>


    <?php
    include_once './components/footer.php';

    ?>

    <script>
        const editBio = document.getElementById('edit-bio');
        const bio = document.getElementById('bio');

        let isEditing = false;
        let prevBio = bio.value;
        editBio.addEventListener('click', async () => {

            let editingHtml = `<span class="material-symbols-outlined">
                                edit_square
                                </span>
                                <span>Edit Bio</span>`;
            let doneHtml = `<span class="material-symbols-outlined">
                                save
                            </span>
                            <span>Save Bio</span>`;

            isEditing = !isEditing;
            if (isEditing) {
                bio.readOnly = false;
                bio.contentEditable = true;
                bio.focus();
                editBio.innerHTML = doneHtml;
                return;
            }
            bio.readOnly = true;
            bio.contentEditable = false;
            editBio.innerHTML = editingHtml;

            let newBio = bio.value;
            if (newBio === prevBio) {
                return;
            }
            prevBio = newBio;
            const formData = new FormData();
            formData.append('bio', newBio);
            formData.append('username', '<?php echo $username; ?>');

            await fetch('save_bio.php', {
                method: 'POST',
                body: formData
            });
        });
    </script>
</body>

</html>