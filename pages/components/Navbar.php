<?php
import_css('./components/Navbar.css');
$navbar_unauthorized =
    "
        <nav class='navbar'>
            <div class='navbar__el'>
                <a href='index.php' class='logo'>
                    Bloggle
                </a>
            </div>

            <div class='navbar__el'>
                <a href='credits.php' class='navbar__el__text'>
                    Team
                </a>
                <a href='login.php' class='btn__primary'>
                    Login
                </a>
            </div>
        </nav>
    ";

$navbar_authorized =
    "
        <nav class='navbar'>
            <div class='navbar__el'>
                <a href='index.php' class='logo'>
                    Bloggle
                </a>
            </div>

            <div class='navbar__el'>
                <a href='credits.php' class='navbar__el__text'>
                    Team
                </a>
                <a href='upload.php' class='navbar__el__text' style='display: flex; align-items: center; gap: 10px;'>
                    Post
                    <img src='components/tool.png' alt='post-btn' style='width: 17.5px; height: 17.5px; object-fit: contain;'>
                </a>
                <a href='logout.php' class='btn__primary'>
                    Logout
                </a>
            </div>
        </nav>
    ";

if (isset($_SESSION['user'])) {
    echo $navbar_authorized;
} else {
    echo $navbar_unauthorized;
}
