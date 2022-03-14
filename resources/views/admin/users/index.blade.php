@extends('layouts.admin')

@section('content')
  
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Users | &nbsp;<a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a></h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Users
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title">Collspan Table Example</h5> --}}
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @isset($users)
                    @forelse($users as $user)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td> <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-cyan btn-sm text-white">
                          Edit
                        </a>
                            <form action="{{ route('admin.users.destroy', $user->id)}}" method="post" style="display: inline-block;"  onSubmit="return confirm('Do you want to Delete?') ">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm text-white">Delete</button>
                            </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No User's List</td>
                    </tr>
                    @endforelse
                    @endisset
                  </tbody>
                 
                </table>
                 {{$users->links()}}
              </div>
               </div>
           </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

@endsection