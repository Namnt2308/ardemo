<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    .<div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li>
                        <a href="{{ url('/upload_file') }}">Upload File</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 content">
                <div class="row">
                    <div class="col-md-8">
                        <div id="generate" style="padding:20px;margin-top:0px"
                            class="main-content panel panel-default">
                            <h3 style="color:#000;font-size:21px">
                                <center><i class="glyphicon glyphicon-qrcode"></i> Create an AR Code</center>
                            </h3>
                            <hr>
                            <form action="/createText" method="POST" >
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Enter text</label>
                                  <input type="text" class="form-control"name="text"placeholder="Enter text">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="main-content panel panel-default">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-12"><h2>List text</h2></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            {{-- <th>Name <i class="fa fa-sort"></i></th> --}}
                                            <th>Text</th>
                                            <th>Scan</th>
                                            <th>QR</th>
                                            <th>CreateAt</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($texts as $item)
                                        @php
                                        $qrcode_url= url('viewText/'.$item->id);
                                        @endphp
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->content}}</td>
                                            <td>{{$item->viewer}}</td>
                                            <td><p class="qrcode_style">{{QrCode::size(50)->generate($qrcode_url)}}</p></td>
                                            <td>{{$item->created_at}}</td>
                                            
                                            <td>
                                                <a href="/deleteText/{{$item->id}}" class="btn btn-danger">DELETE</a>
                                                <a href="/editText/{{$item->id}}"class="btn btn-primary"> Edit</a> 
                                                <a href="viewText/{{$item->id}}"class="btn btn-info">View</a> 
                                            </td>
                                        </tr>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                   
                    
                <footer class="main">
                    <div class="col-md-5"></div>
                    <div class="col-md-7 text-right"></div>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
