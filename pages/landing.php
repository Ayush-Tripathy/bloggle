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
                    <div class="post__card">
                        <div class="post__card_user_div">
                            <img src="../../assets/images/dragon.png" alt="" class="post__card_profile_pic">
                            <span class="post__card_username">
                                Carter Gibson
                            </span>
                        </div>
                        <img src="../../assets/images/i2.jpg" alt="" class="post__image">
                        <h3 class="post__title">
                            I tasted the future of EV charging and it was
                            delicious.
                        </h3>
                        <p class="post__content">Electrify America's newest, indoor charging concept reimagines
                            the electric vehicle experience for the better. And I love it.</p>

                        <span class="date__ribbon">Jan 9, 2024</span>
                    </div>
                    <div class="post__card">
                        <div class="post__card_user_div">
                            <img src="../../assets/images/dragon.png" alt="" class="post__card_profile_pic">
                            <span class="post__card_username">
                                Carter Gibson
                            </span>
                        </div>
                        <img src="../../assets/images/i2.jpg" alt="" class="post__image">
                        <h3 class="post__title">
                            I tasted the future of EV charging and it was
                            delicious.
                        </h3>
                        <p class="post__content">Electrify America's newest, indoor charging concept reimagines
                            the electric vehicle experience for the better. And I love it.</p>

                        <span class="date__ribbon">Jan 9, 2024</span>
                    </div>
                    <div class="post__card">
                        <div class="post__card_user_div">
                            <img src="../../assets/images/dragon.png" alt="" class="post__card_profile_pic">
                            <span class="post__card_username">
                                Carter Gibson
                            </span>
                        </div>
                        <img src="../../assets/images/i2.jpg" alt="" class="post__image">
                        <h3 class="post__title">
                            I tasted the future of EV charging and it was
                            delicious.
                        </h3>
                        <p class="post__content">Electrify America's newest, indoor charging concept reimagines
                            the electric vehicle experience for the better. And I love it.</p>

                        <span class="date__ribbon">Jan 9, 2024</span>
                    </div>
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