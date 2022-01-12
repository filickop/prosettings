
function sendWarning(warning) {
    window.alert(warning);
}


$(document).ready(function () {

    $("input").keyup(function () {
        var name = $("input").val();
        $.post("playerTable.php", {
            playerName: name
        }, function (data, status) {
            $("#tablePlayers").html(data);
        });
    });
});



/*
function loadPlayer() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByName("open").innerHTML = this.responseText;
    }
    xhttp.open("POST", index.php);
    xhttp.send();
}*/
