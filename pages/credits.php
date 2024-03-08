<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits</title>
    <?php 
        include_once './utils/utils.php';
        import_css('../assets/css/main.css');
        import_css('./credits-styles.css');
    ?>
</head>
<body>
    <!-- Adding Loading Animation for better User Experience -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>
    <div class="heading">
        CREDITS
    </div>
    <div class="cards">
        <div class="ayush-card card">
            <img src="../assets/images/bismay-image.jpg" alt="">
            <h2>Ayush Tripathy</h2>
            <div class="social-networks">
                <span><a href=""><ion-icon name="logo-instagram"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-github"></ion-icon></a></span>
            </div>
        </div>
        <div class="bismay-card card">
            <img src="../assets/images/bismay-image.jpg" alt="">
            <h2>Bismay Sarangi</h2>
            <div class="social-networks">
                <span><a href="https://www.instagram.com/b._.smay/"><ion-icon name="logo-instagram"></ion-icon></a></span>
                <span><a href="https://www.linkedin.com/in/bismay-sarangi-0804aa263/"><ion-icon name="logo-linkedin"></ion-icon></a></span>
                <span><a href="https://github.com/bismaysarangi"><ion-icon name="logo-github"></ion-icon></a></span>
            </div>
        </div>
        <div class="aryan-card card">
            <img src="../assets/images/bismay-image.jpg" alt="">
            <h2>Aryan Raj</h2>
            <div class="social-networks">
                <span><a href=""><ion-icon name="logo-instagram"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-github"></ion-icon></a></span>
            </div>
        </div>
        <div class="nayab-card card">
            <img src="../assets/images/bismay-image.jpg" alt="">
            <h2>Nayab Mirza</h2>
            <div class="social-networks">
                <span><a href=""><ion-icon name="logo-instagram"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-github"></ion-icon></a></span>
            </div>
        </div>
        <div class="srijay-card card">
            <img src="../assets/images/bismay-image.jpg" alt="">
            <h2>Srijayditya Nanda</h2>
            <div class="social-networks">
                <span><a href=""><ion-icon name="logo-instagram"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></span>
                <span><a href=""><ion-icon name="logo-github"></ion-icon></a></span>
            </div>
        </div>
        <div class="quote-card card">
            <p>
                "The web does not just connect machines, it connects people." - Tim Berners-Lee
            </p>
        </div>
    </div>
    <?php 
        include_once './components/footer.php';
    ?>
    <script>
        window.addEventListener('load', function () {
            var loadingOverlay = document.querySelector('.loading-overlay');
            loadingOverlay.style.display = 'none';
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
