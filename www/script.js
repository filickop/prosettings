function sendWarning(warning) {
    window.alert(warning);
}
//SEARCH PLAYER
$(document).ready(function () {

    $(".search").keyup(function () {
        var name = $(".search").val();
        $.post("playerTable.php", {
            playerName: name
        }, function (data, status) {
            $("#tablePlayers").html(data);
        });
    });
});

//POPUP WINDOW OPEM
$(document).ready(function () {
    
    $(".openPlayer").click(function () {
        var name = $(this).val();
        $.post("playerInfo.php", {
            playerName: name
        }, function (data, status) {
            $("#playerInfo").html(data);
            $("#bg-popup").show();
            $("body").css('overflow', 'hidden');
        });
    });
});

//POPUP WINDOW CLOSE
$(document).ready(function () {
    $("#close-popup").click(function () {
        $("#bg-popup").hide();
        $("body").css('overflow', 'auto');
    });
});


//PASSWORD CHECKER

$(document).ready(function () {
    $(".pass").keyup(function () {
        var isOneDigit = false;
        var isLowerCaseLetter = false;
        var isUpperCaseLetter = false;
        var isSpecialChar = false;
        var isMinChars = false;
        var pass = $(".pass").val();
        if(/\d/.test(pass)){
            isOneDigit = true;
        }
        if(/[a-z]/.test(pass)) {
            isLowerCaseLetter = true;
        }
        if(/[A-Z]/.test(pass)) {
            isUpperCaseLetter = true;
        }
        if(/[#$@!%&*?]/.test(pass)) {
            isSpecialChar = true;
        }
        if(/^.{8,}$/.test(pass)) {
            isMinChars = true;
        }
        if(pass != "") {
            if(isOneDigit || isLowerCaseLetter || isUpperCaseLetter || isMinChars || isSpecialChar) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'lightgrey');
                $(".strong").css('background-color', 'lightgrey');
                $(".weak-pass").html("Weak Password.");
                $(".weak-pass").css('display', 'block');
            }
            if(isOneDigit && isLowerCaseLetter && isUpperCaseLetter && isMinChars) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'orange');
                $(".strong").css('background-color', 'lightgrey');
                $(".weak-pass").html("Good Password.");
                $(".weak-pass").css('display', 'block');

            }
            if(isOneDigit && isLowerCaseLetter && isUpperCaseLetter && isMinChars && isSpecialChar) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'orange');
                $(".strong").css('background-color', 'green');
                $(".weak-pass").html("Strong Password.");
                $(".weak-pass").css('display', 'block');
            }
        }
        else {
            $(".weak").css('background-color', 'lightgrey');
            $(".medium").css('background-color', 'lightgrey');
            $(".strong").css('background-color', 'lightgrey');
            $(".weak-pass").css('display', 'none');
        }
    });
})

//CONFIRM PASSWORD CHECKER
$(document).ready(function () {
    $(".confirm-pass").keyup(function () {
        var cpass = $(".confirm-pass").val();
        var pass = $(".pass").val();
        if(cpass != pass || cpass == "") {
            $(".signup").attr('disabled', 'disabled');

            $(".weak").css('background-color', 'red');
            $(".medium").css('background-color', 'red');
            $(".strong").css('background-color', 'red');
            $(".weak-pass").html("Password not match!");
            $(".weak-pass").css('display', 'block');
        }
        else {
            $(".signup").removeAttr('disabled', 'disabled');

            $(".weak").css('background-color', 'green');
            $(".medium").css('background-color', 'green');
            $(".strong").css('background-color', 'green');
            $(".weak-pass").html("Password match.");
            $(".weak-pass").css('display', 'block');
        }

    })
})



