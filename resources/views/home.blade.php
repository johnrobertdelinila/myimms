@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    {{ __('You are logged in!') }}
                </div> -->

                @if (ISSET(Auth::user()->name) AND Auth::user()->name != NULL)
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Data</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Data</span></a>
                                    <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th> -->
                                    <th>Application Number</th>
                                    <th>Identification</th>
                                    <th>Employee</th>
                                    <th>Document Number</th>
                                    <th>Application Date</th>
                                    <th>Citizen</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($praStatuses))
                                    @foreach($praStatuses as $praStatus)
                                    <tr id="{{ $praStatus->id }}_row">
                                        <!-- <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td> -->
                                        <td>{{ $praStatus->application_number }}</td>
                                        <td>{{ $praStatus->identification }}</td>
                                        <td>{{ $praStatus->employee }}</td>
                                        <td>{{ $praStatus->document_number }}</td>
                                        <td>{{ $praStatus->date_of_application }}</td>
                                        <td>{{ $praStatus->citizens }}</td>
                                        <td>{{ $praStatus->status }}</td>
                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete delete_button" id="{{ $praStatus->id }}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Add Modal HTML -->
                <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="add-form">
                                <div class="modal-header">						
                                    <h4 class="modal-title">Add Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">					
                                    <div class="form-group">
                                        <label>Application Number</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Identification</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Employee</label>
                                        <input class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Document Number</label>
                                        <input type="text" class="form-control" required>
                                    </div>	
                                    <div class="form-group">
                                        <label>Application Date</label>
                                        <input type="text" class="form-control" required>
                                    </div>	
                                    <div class="form-group">
                                        <label>Citizen</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" required>
                                    </div>			
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-success add-button" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal HTML -->
                <div id="editEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Edit Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">					
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" required>
                                    </div>					
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-info" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Delete Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">					
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger delete-data" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        const table = new DataTable('#table');

        $.fn.serializeObject = function(){
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        

        $(document).on('click', '.delete_button', function() {
            const id = $(this).attr("id");
            $(".delete-data").attr("id", id);
        });

        $('.add-button').click(function() {
            const form_value = $('#add-form').serializeJSON();
            console.log(form_value);
            
        });

        $('#add-form').submit(function() {
            console.log(JSON.stringify($('#add-form').serializeObject()));
            return false;
        });

        $(".delete-data").click(function(){
            
            var id = $(this).attr("id");
            var token = $("meta[name='csrf-token']").attr("content");
        
            $.ajax(
            {
                url: "data/"+id,
                method: 'GET',
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (response){
                    alert(response.success);
                    table.row("#" + id + "_row").remove().draw();
                }
            });
        
        });
    });
</script>
@endsection
