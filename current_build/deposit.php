<html>
    <head>
        <meta charset="utf-8">
        <title>Deposit</title>
        <link rel='stylesheet' href='css/style.css'/>
        <link rel="stylesheet" type="text/css"
        href="styles.css">
</head>
<body>
        <form action='up_bal.php' method='get'>
            <!-- using get method as it will display everything in 
            the url and is less secure, would use post in any other 
            situation where security matters more-->
            Deposit Amount: <input type='number' name='amount'><br>
            <input type='submit'>
        </form>
</body>
</html>
    

