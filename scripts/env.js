export async function get_env() {
    let ENV;

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../config/get_env.php', false); // false makes the request synchronous
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const json = JSON.parse(this.responseText);
            ENV = json;
        }
    };
    xhr.send();

    return ENV;
};