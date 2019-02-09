<!DOCTYPE html>
<html lang="en">
<head>
  <title>Do Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
</head>
<body >
    <div class = "myDiv" >
        <div class="container" align = "center">
            <h2 class = "display-2">Do-Me</h2>
            <!-- Button to Open the Modal -->
            <div class = "container" align = "right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add New Task
                </button>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal" align = "center">
                <div class="modal-dialog">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header" >
                            <h4 class="modal-title">Add Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body" >
                            <form align = "left" id = "form-insert" method = "post" action = "{{url('/store')}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Task</label>
                                    <input type="text" class="form-control" name = "task" aria-describedby="emailHelp">
                                </div>
                                <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <table class="table table-striped table-light" align = "center">
                <thead >
                    <tr align = "center">
                    <th scope="col">Mark As Done</th>
                    <th scope="col">Task</th>
                    <th scope="col">Created-Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody align = "center">
                    @foreach($tasks as $task)
                    <tr>
                        <th scope="row">
                            <a class = "btn btn-primary">Done</a>
                        </th>
                        <td>{{$task->task}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>
                        <a class = "btn btn-success">Edit</a><span>  </span><a class = "btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body" >
                            <form align = "left" id = "form-insert" method = "post" action = "{{url('/store')}}">
                                <div class="form-group">
                                    <label for="addtask">Task</label>
                                    <input type="text" class="form-control" id = "task" name = "task" aria-describedby="addtask">
                                </div>
                                
                                <input id="addtask-token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>   
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $("#form-insert").on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var task = $('#task').val();
            var url = $(this).attr('action');
            var method = $(this).attr('method');

            $.ajax({
                type : method,
                url : url,
                data : data,
                success:function(response){
                    $(function () {
                        $('#myModal').modal('toggle');
                        
                    });
                    if(response>0){
                        alert(response)
                    }
                    else{
                        alert("no res")
                    }
                }
            });
        });
    </script>
</body>
</html>
