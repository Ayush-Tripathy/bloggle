<?php
include_once '../controllers/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.jpg" type="image/jpg">
    <title>Upload</title>
    <?php
    include_once './utils/utils.php';
    import_css('../assets/css/main.css');
    import_css('./upload.css');
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo "<script>console.log('User is logged in as: " . $user['username'] . "')</script>";
    } else {
        echo "<script>window.location.href = 'login.php';</script>";
    }
    ?>
    <div class="upload-container">
        <div class="first-part">
            <div class="back-button">
                <a href="landing.php"><ion-icon name="arrow-back-outline"></ion-icon></a>
            </div>
        </div>
        <div class="input-container">
            <form action="">
                <div class="title-box">
                    <input type="text" name="title" id="title" placeholder="Share a captivating title..." required title="Enter the Title of your Blog">
                </div>
                <div class="caption-part">
                    <textarea name="caption" id="caption" cols="30" rows="10" placeholder="What's on your mind? Share your thoughts here..." required title="What do you want to talk about?"></textarea>
                </div>
                <div class="file-upload">
                    <label for="fileToUpload" class="file-upload-label">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        Choose File
                    </label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </form>
        </div>
        <div class="last-part">
            <button type="submit" id="upload-btn">Post</button>
        </div>
    </div>

    <script type="module">
        import {
            uploadImage
        } from '../scripts/firebase_upload.js'

        const fileInput = document.getElementById('fileToUpload');
        const uploadBtn = document.getElementById('upload-btn');
        const postTitle = document.getElementById('title');
        const postCaption = document.getElementById('caption');

        uploadBtn.addEventListener('click', handleUpload);

        async function handleUpload(event) {
            event.preventDefault();

            if (!postTitle.value || !postCaption.value) {
                alert('Please fill in all the fields');
                return;
            }

            if (!fileInput.files.length) {
                alert('No file selected');
                return;
            }

            // const file = fileInput.files[0];
            const ret = await uploadImage(fileInput);

            if (ret) {
                // console.log('Image uploaded successfully');

                // const xhr = new XMLHttpRequest();
                // xhr.open('POST', 'upload_post_meta_data.php', false);
                // xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                // xhr.onreadystatechange = function() {
                //     if (xhr.readyState == 4 && xhr.status == 200) {
                //         if (xhr.responseText === 'SUCCESS') {
                //             console.log('Post uploaded successfully');
                //             // window.location.href = 'landing.php';
                //         } else {
                //             console.log('Post upload failed');
                //             alert('Post upload failed, please try again later.');
                //         }
                //     }
                // }
                // // xhr.send(`imageurl=${ret}&title=${postTitle.value}&content=${postCaption.value}&file=${fileInput}`);
                // xhr.send(formData);

                const formData = new FormData();
                formData.append('imageurl', ret);
                formData.append('title', postTitle.value);
                formData.append('content', postCaption.value);

                const response = await fetch('upload_post_meta_data.php', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    const data = await response.text();
                    if (data === 'SUCCESS') {
                        console.log('Post uploaded successfully');
                        window.location.href = 'landing.php';
                    } else {
                        console.log('Post upload failed');
                        alert('Post upload failed, please try again later.');
                    }
                } else {
                    console.log('Post upload failed');
                    alert('Post upload failed, please try again later.');
                }

            } else {
                console.log('Image upload failed');
            }

        }

        const titleInput = document.getElementById('title');
        const captionTextarea = document.getElementById('caption');

        const titlePlaceholder = "Share a captivating title...";
        const captionPlaceholder = "What's on your mind? Share your thoughts here...";

        const typeWriter = (inputElement, text, delay) => {
            let charIndex = 0;
            inputElement.placeholder = '';
            const interval = setInterval(() => {
                if (charIndex < text.length) {
                    inputElement.placeholder += text.charAt(charIndex);
                    charIndex++;
                } else {
                    clearInterval(interval);
                }
            }, delay);
        };


        typeWriter(titleInput, titlePlaceholder, 100);
        typeWriter(captionTextarea, captionPlaceholder, 50);
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>