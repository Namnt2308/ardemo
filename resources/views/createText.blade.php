<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" >
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Enter text</label>
          <input type="text" class="form-control"name="text"placeholder="Enter text">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>