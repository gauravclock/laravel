<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body><br><br>
<div class="container text-right">
<a href="list" class="btn btn-info">Back</a>
</div>
@if(Session::has('msg'))
  <div dir="col-md-12">
       <div class="alert alert-success text-center">{{Session::get('msg')}}</div>
  </div>     
  @endif
<div class="container">
  <h2>Edit User</h2>
  <form action="edt={{$data->id}}" method="post" enctype="multipart/form-data">
       @csrf
    <div class="form-group">
      <input type="hidden" name="edit_id" id="edit_id">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$data->name}}">
      @if($errors->any())
      <p class="text-danger">{{old('name',$errors->first('name'))}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass" value="{{old('name',$data->pass)}}">
      @if($errors->any())
      <p class="text-danger">{{$errors->first('pass')}}</p>
      @endif
    </div>
     <div class="form-group">
      <label for="pwd">photo:</label>
      <input type="file" class="form-control" id="photo" placeholder="Enter password" name="photo">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>