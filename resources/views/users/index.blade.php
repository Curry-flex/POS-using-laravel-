@extends('layouts.app')


@section('content')
<div class="container">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
            <h4>ADD USER</h4>   <a href="" style="float:right" data-toggle="modal" data-target="#addmodal"  class="btn btn-dark"><i class="fa fa-plus"></i>Add New User</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-left">
                 <thead>
                    <tr>
                    <th>#</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Action</th>
                    </tr>
                 </thead>

                 <tbody>
                     @foreach($user as $users)
                     <tr>
                      <td>{{$users->id}}</td>
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>
                          @if($users->is_admin==1)Admin

                          @else Cashier

                          @endif
                      </td>
                      <td>
                          <div class="btn-group">
                           <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editmodal{{$users->id}}"><i class="fa fa-edit">Edit</i></a>
                           <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser{{$users->id}}"><i class="fa fa-trash">Delete</i></a>
                           
                          </div>
                      </td>
                      </tr>

 <div class="modal right fade" id="editmodal{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.update',$users->id)}}" method="POST">
            @csrf
            @method('put')
           
            <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$users->name}}" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email"  value="{{$users->email}}" class="form-control">
            </div>

    
            <div class="form-group">
            <label for="">Role</label>
            <select name="role" id=""  class="form-control">
               <option value="1" @if($users->is_admin==1) selected 
                   @endif>Admin</option>
               <option value="2" @if($users->is_admin==2) selected @endif>Cashier</option>
            </select>
            </div>
            <div class="modal-footer">
               <button class="btn btn-info btn-block">Save</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<div class="modal right fade" id="deleteuser{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.destroy',$users->id)}}" method="POST">
            @csrf
            @method('delete')
           
            <p>Are you sure you want to delete this {{$users->name}} ?</p>

           
    
            <div class="modal-footer">
            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
               <button class="btn btn-danger btn-block">Delete</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
                     @endforeach
                   

                 </tbody>
                </table>
            </div>
        </div>
          
        </div>
    

    </div>
</div>

<!-- Modal -->
<div class="modal right fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.store')}}" method="POST">
            @csrf
           
            <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="pass1" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="pass2" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Role</label>
            <select name="role" id=""  class="form-control">
               <option value="1">Admin</option>
               <option value="2">Cashier</option>
            </select>
            </div>
            <div class="modal-footer">
               <button class="btn btn-info btn-block">Save</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>




<style>
    .modal.right .modal-dialog{
        top:0;
        right:0;
        margin-right:0;
    }
</style>

@endsection