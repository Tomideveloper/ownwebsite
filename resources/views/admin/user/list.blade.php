@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">User</a></li>
                <li class="breadcrumb-item active">list</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="card ">
                        <div class="card-header">
                        <h5 class="bg-dark p-3 text-center"><strong>User List</strong></h5>

                            <a href="{{url('user/create')}}" class="btn btn-info btn-lg"> Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            
                                            
                                            <th>Name:</th>
                                            <th>email:</th>
                                            <th>phone:</th>
                                            <th>password:</th>
                                            <th>role:</th>
                                            <th>status:</th>
                                            <th>Date:</th>
                                           
                                            <th>image:</th>
                                            <th>Action:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        @php
                                       $image="";
                                       if($user->image !=""){
                                        $image='public/admin/userpic/'.$user->image;
                                       }
                                       else{
                                         $image ='public/dummy.jpg';
                                       }
                                     @endphp

                                        <tr>
                                          
                                           <td>{{$user->name}}</td>
                                           <td>{{$user->email}}</td>
                                           <td>{{$user->phone}}</td>
                                           <td>{{$user->password}}</td>
                                           <td>{{$user->role}}</td>
                                          
                                           
                                           <td>
                                               @if($user->status===0)
                                               <a href="{{url('user/status/' .$user->id .'?status=1')}}" class="btn btn-warning">enable</a>
                                               @else
                                               <a href="{{url('user/status/' .$user->id. '?status=0')}}" class="btn btn-danger">disable</a>
                                               @endif
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                           <td>
                                               <img src="{{url($image)}}" alt="" class="img-fluid" width="50">
                                            </td>
                                            <td>
                                                <a href="{{url('user/edite', $user->id)}}" class="btn btn-warning btn-sm">E</a>
                                                <a href="{{url('user/delete', $user->id)}}" class="btn btn-danger btn-sm mt-2">X</a>
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->
        </div>
    </section>
</main><!-- End #main -->
@endsection