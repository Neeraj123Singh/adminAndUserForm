<html>
    <head>
    </head>
    <body>
        <form action='delete' method='POST' enctype="multipart/form-data">
            @csrf
        <label>Enter  name to delete</label><br>
        <input type='text' name='name'><br>
        <input type='submit'>
        </form>
    </body>   
</html>