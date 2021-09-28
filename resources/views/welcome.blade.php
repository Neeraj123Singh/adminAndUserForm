<html>
    <head>
    </head>
    <body>
        <form action='/login' method='POST'>
            @csrf
        <label>Enter Your name</label><br>
        <input type='text' name='name'><br>
        <label>Enter Your password</label><br>
        <input type='password' name='password'>
        <input type='submit'>
        </form>
    </body>   
</html>