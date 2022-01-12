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

$(document).ready(function () {
    
    $("button").click(function () {
        var name = $(this).val();
        $.post("playerInfo.php", {
            playerName: name
        }, function (data, status) {
            $("#playerInfo").html(data);
            $("#bg-popup").show();
        });
    });
});

$(document).ready(function () {
    $("#close-popup").click(function () {
        $("#bg-popup").hide();
    });
});

