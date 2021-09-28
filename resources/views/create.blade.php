<html>
    <head>
    </head>
    <body>
        <form action='save' method='POST' enctype="multipart/form-data">
            @csrf
        <label>Enter  name</label><br>
        <input type='text' name='name'><br>
        <label>Enter  age</label><br>
        <input type='number' name='age'><br>
        <label>Select gender</label><br>
        <input type='radio' name='gender' value="Male">Male<br>
        <input type='radio' name='gender' value="Male">Female<br>
        <select name='willing'>
            <label>Willing To Work</label><br>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <label>Select Image</label><br>
        <input type='file' name='image'><br>
        <input type='submit'>
        </form>
    </body>   
</html>