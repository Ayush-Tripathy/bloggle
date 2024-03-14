<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <?php 
        include_once './utils/utils.php';
        import_css('../assets/css/main.css');
        import_css('./upload.css');
    ?>
</head>
<body>
    <div class="upload-container">
        <div class="first-part">
            <div class="back-button">
                <a href="#"><ion-icon name="arrow-back-outline"></ion-icon></a>
            </div>
        </div>
        <form action="">
            <div class="input-container">
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
            </div>
            <div class="last-part">
                <button type="submit">Post</button>
            </div>
        </form>
    </div>

    <script>
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
