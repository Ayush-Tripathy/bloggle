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
    import_css('./components/Navbar.css');
    import_css('../assets/css/main.css');
    import_css('./profile.css')
    ?>
    <title>Bloggle</title>
</head>

<body>

    <?php include_once './components/Navbar.php'; ?>

    <section class="first">

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

    </section>

    <section class="three">

        <div class="post_grid">


            <div class="read-more">

                <div class="read-more-img"><img src="DP.jpg" alt="">


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

                <div class="read-more-img"><img src="DP.jpg" alt="">

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

                <div class="read-more-img"><img src="DP.jpg" alt="">
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

            <div class="read-more">

                <div class="read-more-img"><img src="DP.jpg" alt="">

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




        </div>

    </section>


    <?php
    include_once './components/footer.php';

    ?>


</body>

</html>