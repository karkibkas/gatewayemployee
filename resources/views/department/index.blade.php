@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2 center">Department Management</h4>
    <div class="row">
        <!-- Show All Departments List as a Card -->
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
                    <h5 class="pl-15 grey-text text-darken-2">Department List</h5>
                    <!-- Table that shows Departments List -->
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are any departments to render in view -->
                            @if($departments->count())
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td>{{$department->dept_name}}</td>
                                        <td>{{$department->created_at}}</td>
                                        <td>{{$department->updated_at}}</td>
                                        <td>
                                            <div class="row">
                                              <div class="col">
                                                    <a href="{{route('departments.edit',$department->id)}}" class="btn btn-floating btn-small orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{route('departments.destroy',$department->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <!-- if there are no departments then show this message -->
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">No Departments have been created yet!</h6></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Departments Table END -->
                </div>
                <!-- Show Pagination Links -->
                <div class="center">
                  {{$departments->links('vendor.pagination.default',['paginator' => $departments])}}
                </div>
            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<!-- This is the button that is located at the right bottom, that navigates us to department.create view -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('departments.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection