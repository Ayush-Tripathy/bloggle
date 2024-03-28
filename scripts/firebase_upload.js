import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-analytics.js";
import { getStorage, ref, uploadBytes } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-storage.js";
import { get_env } from "./env.js";

const env = JSON.parse(await get_env());

const firebaseConfig = {
    apiKey: env['FIREBASE_API_KEY'],
    authDomain: env['FIREBASE_AUTH_DOMAIN'],
    projectId: env['FIREBASE_PROJECT_ID'],
    storageBucket: env['FIREBASE_STORAGE_BUCKET'],
    messagingSenderId: env['FIREBASE_MESSAGING_SENDER_ID'],
    appId: env['FIREBASE_APP_ID'],
    measurementId: env['FIREBASE_MEASUREMENT_ID']
};

export async function uploadImage(fileInput, phpPostPath) {
    const file = fileInput.files[0];
    if (!file) {
        console.error("No file selected");
        return false;
    }
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);

    const storage = getStorage();

    // Generating image name with current time
    const imageName = new Date().getTime() + "-" + file.name;
    const storageRef = ref(storage, imageName);

    let returnValue = false;

    await uploadBytes(storageRef, file).then((snapshot) => {
        const filename = snapshot.metadata.fullPath;
        const url = `https://firebasestorage.googleapis.com/v0/b/blog-project-417316.appspot.com/o/${filename}?alt=media`;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", phpPostPath, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                returnValue = true;
            }
        };
        xhr.send("url=" + url);
    }).catch((error) => {
        console.error(error);
        returnValue = false;
    });

    return returnValue;
}