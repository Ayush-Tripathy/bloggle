<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include_once './utils/utils.php';
        import_css('./components/Navbar.css');
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
    <?php 
        include_once './footer.php';
    ?>
</body>

</html>