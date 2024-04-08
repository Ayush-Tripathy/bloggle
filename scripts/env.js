export async function get_env() {
    let ENV;

    // ** The method of getting the environment variables is extremely insecure. **
    // ** Only using this method for this project to avoid using extra php libraries. **
    // ** All the keys will be revoked after the project is completed. **

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../config/get_env.php', false); // false makes the request synchronous
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const json = JSON.parse(this.responseText);
            ENV = json;
        }
        if (this.readyState == 4 && this.status == 401) {
            console.error(this.responseText);
        }
    };
    xhr.send();

    return ENV;
};