<html>
    <head>
    </head>
    <body>
    @foreach ($data as $dt)
    <lable>Name:{{$dt->name}}<label><br>
    Age:{{$dt->age}}<br>
    Gender:{{$dt->gender}}<br>
    Willing to Work :{{$dt->gender}}<br>
    Image :<br>
    <img src="{{url('storage/images/'.$dt->imagePath)}}" width="200" height="200">

    <br>
    <br>
    <a href ='/editUser/{{$dt->name}}'>edit User</a><br>
    <hr><hr>
    @endforeach    
    </form>
    </body>   
</html>