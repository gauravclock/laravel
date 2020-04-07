<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Crud Operation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
  <div class="p-3 mb-2 bg-dark text-white"><br>
       <div class="container" style="background-color: #d1b5b5;">
            <div class="h3">Laravel Crud operation</div>
       </div>
  </div><br>
  <div class="container"> 
       <div class="col-md-12 text-right">
            <a href="add-user" class="btn btn-primary">Add User</a>
       </div><br><br><br><br>
         @if(Session::has('msg'))
  <div dir="col-md-12">
       <div class="alert alert-success text-center">{{Session::get('msg')}}</div>
  </div>     
  @endif

       <div class="row">
            <table class="table table-bordered table-responsive">
              <tr class="alert-info">
                   <td>Id</td>
                   <td>User Name</td>
                   <td>Password</td>
                   <td>Image</td>
                   <td>Edit</td>
                   <td>Delete</td>
              </tr>
            <?php
             $str = str_replace('\\', '/', storage_path());
            ?>
              @foreach($data as $i)
              <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->name}}</td>
                <td>{{$i->pass}}</td>
                <td><img height="50" src="{{url($i->photo)}}" /></td>
                <td><a href="edit_id={{$i->id}}" class="btn btn-primary">Edit</a></td>
                <td><button onclick="delete_data({{$i->id}});" class="btn btn-danger">Delete</button></td>
              </tr>
              @endforeach
            </table>
       </div>
       <div class="col-md-3">
          {{$data->links()}}
       </div>
  </div>

</body>
</html>
<script type="text/javascript">
    function delete_data(id){
      if(confirm("Are you Sure Want To You Delete It")){
          window.location.href='del_id='+id;
      }
    }
</script>