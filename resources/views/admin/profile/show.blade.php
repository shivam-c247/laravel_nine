@extends('layouts.admin')

@section('content')
            <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
       <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Profile | &nbsp;<a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a></h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Profile
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
                    <div class="col-md-12">

                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table user-view-table m-0">
                                    <tbody>
                                        <tr>
                                                <td>Name:</td>
                                                <td>{{ Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>E-mail:</td>
                                                <td>{{ Auth::user()->email}}</td>
                                            </tr>
                                           {{--  <tr>
                                                <td>Address:</td>
                                                @if(!empty( Auth::user()->address))
                                                 <td>{{ Auth::user()->address}}</td>
                                                @else
                                                 <td>Not Available</td>
                                                @endif 
                                            </tr>
                                            <tr>
                                                <td>Pin Code:</td>
                                                @if(!empty( Auth::user()->pin_code))
                                                 <td>{{ Auth::user()->pin_code}}</td>
                                                @else
                                                 <td>Not Available</td>
                                                @endif 
                                            </tr>
                                                             
                                            <tr>
                                                <td>Contact Number:</td>
                                                @if(!empty( Auth::user()->mobile))
                                                 <td>{{ Auth::user()->mobile}}</td>
                                                @else
                                                 <td>Not Available</td>
                                                @endif 
                                            </tr>
                                            <tr>
                                                <td>Alternate Contact Number:</td>
                                                @if(!empty( Auth::user()->mobile2))
                                                 <td>{{ Auth::user()->mobile2}}</td>
                                                @else
                                                 <td>Not Available</td>
                                                @endif 
                                            </tr>
                                            <tr> --}}
                                            <td>Registered:</td>
                                            <td>{{ Auth::user()->created_at->format('d-m-Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Last Updated Profile:</td>
                                             @if(!empty( Auth::user()->updated_at))
                                                 <td>{{ Auth::user()->updated_at->format('d-m-Y')}}</td>
                                                @else
                                                 <td>Not Available</td>
                                                @endif 
                                        </tr>
                             
                                  
                             {{--            <tr>
                                            <td>Status:</td>
                                            <td>
                                                @if(Auth::user()->status == '1')
                                                <span class="badge badge-outline-success">Active</span>
                                                @else
                                                 <span class="badge badge-outline-danger">Deactive</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        {{-- 
                                        <tr>
                                            <td>Mobile  Verified:</td>
                                            <td>
                                                @if(Auth::user()->mobile_verified == '1')
                                                <span class="badge badge-outline-success">Verified</span>
                                                @else
                                                 <span class="badge badge-outline-danger">Not Verified</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                             {{--  <tr>
                                            <td>Role Type:</td>
                                            @if(Auth::user()->getRoleNames())
                                            @foreach(Auth::user()->getRoleNames() as $value)
                                            <td><span class="badge badge-outline-warning">{{ $value }}</span></td>
                                            @endforeach
                                            @endif
                                        </tr> --}}

                          {{--               <tr>
                                            <td>Email  Verified:</td>
                                            <td>
                                                @if(Auth::user()-> email_verified_at !== null)
                                                <span class="badge badge-outline-success">Verified</span>
                                                @else
                                                 <span class="badge badge-outline-danger">Not Verified</span>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        
                                       
                                        </tbody>
                                </table>
                            </div>
                       
                        
                             
                        </div>
                   </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection