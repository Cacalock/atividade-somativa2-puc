const user_param = document.querySelector("#query-param");

function sendUserId() {
    const url = window.location.href;
    const parsedUrl = new URL(url);

    const userId = parsedUrl.searchParams.get("user_id");
    user_param.value = userId;
}
