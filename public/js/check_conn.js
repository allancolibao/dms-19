function updateOnlineStatus() {
    document.getElementById("status").innerHTML =
        "<a id='status' class='nav-link text-success' aria-haspopup='true' aria-expanded='false'><i class='fa fa-wifi fa-3x'></i></a>";
}

function updateOfflineStatus() {
    document.getElementById("status").innerHTML =
        "<a id='status' class='nav-link text-danger' aria-haspopup='true' aria-expanded='false'><i class='fa fa-wifi fa-3x'></i></a>";
}

window.addEventListener("online", updateOnlineStatus);
window.addEventListener("offline", updateOfflineStatus);