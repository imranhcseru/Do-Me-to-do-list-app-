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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class = "myDiv" id = "full_div">
        <div class="container" align = "center">
            <h2 class = "display-2">Do-Me</h2>
            <!-- Button to Open the Modal -->
            <div class = "container" align = "right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id = "add_modal">
                Add New Task
                </button>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal" align = "center">
                <div class="modal-dialog">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header" >
                            <h4 class="modal-title" id = "modal_title">Add Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body" >
                            <form align = "left" id = "form-insert" method = "post" action = "{{url('/store')}}">
                            <div class="text-right">
                            <button type="submit" class="btn btn-warning" id = "done">Completed</button>
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Task</label>
                                    <input type="text" class="form-control" name = "task" id = "input_task">
                                    <input id = "id" type = "hidden" name = "id">
                                </div>
                                <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-primary" id = "submit_task">Add</button>
                                <button type="submit" class="btn btn-primary" id = "change_task">Save Changes</button>
                                <button type="submit" class="btn btn-danger" id = "delete">Delete</button>
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
            
            <table class="table table-striped table-light" align = "center" id = "task_table">
                <thead >
                    <tr align = "center">
                        <th>#</th>
                        
                        <th scope="col">Task</th>
                        <th scope="col">Created-Date</th>
                        
                    </tr>
                </thead>
                <tbody align = "center">
                        @php
                            $count = 0;
                        @endphp
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{$count}}</td>
                        <td >
                            <a class = "btn btn-secondary item" data-toggle="modal" data-target="#myModal" id = "edit_modal"><input type="hidden" id = "task_id" value = {{$task->id}}>{{$task->task}}</a>
                        </td>
                        <td>{{$task->created_at}}</td>  
                    </tr>
                        @php
                            $count = $count + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $("#form-insert").on('submit',function(e){
                e.preventDefault();
                var message = "New Task Added Successfully";
                var data = $(this).serialize();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                send_data(message,data,url,method);
            });

            $('#delete').click(function(){
                var id = $('#id').val();
                var message = "Task Deleted Successfully";
                var url = 'delete';
                var data = $(this).serialize();
                var method = $(this).attr('method');
                send_data(message,data,url,method); 
            });
            
            $('#add_modal').click(function(){
                $('#change_task').hide();
                $('#delete').hide();
                $('#submit_task').show();
                $('#input_task').val(" ");
            });

            $(document).on('click','.item',function(event){
                $('#modal_title').text('Modify Task');
                $('#change_task').show();
                $('#delete').show();
                $('#submit_task').hide();
                var task_txt = $(this).text();
                var id = $(this).find('#task_id').val();
                $('#id').val(id);
                $('#input_task').val(task_txt);
            });
            
            function loadTable(){
                    $('#task_table').load(location.href + " #task_table");
            }

            function sweet_alert(message){
                swal({
                      title: "Task Added",
                      text: message,
                      icon: "success",
                      timer:2000
                    });
            }

            function send_data(message,data,url,method){
                $.ajax({
                    type : 'post',
                    url : url,
                    data : data,
                    success:function(response){
                        // $(function () {
                        //     $('#myModal').modal('toggle');
                        //     sweet_alert(message);
                        //     loadTable();
                        // }); 
                        console.log(url);
                         
                    }
                });  
            } 
        });
    </script>
</body>
</html>
