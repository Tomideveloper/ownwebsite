@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row bg-dark">

                    <div class="card mt-4">
                        <div class="card-header text-center">
                            <h3> <strong>Profile list</strong></h3>
                            <p>
                               <a href="{{url('profile/create')}}" class="btn btn-block btn-success">+Add</a>
                            </p>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive table-striped table-bordered">
                                <tr>
                                    <th>Name:</th>
                                    <th>profession:</th>
                                    <th>FB_link:</th>
                                    <th>TK_link:</th>
                                    <th>Linkedin:</th>
                                    <th>Status:</th>
                                    <th>image:</th>
                                    <th>Action:</th>
                                </tr>
                                <tbody>
                                    @foreach($profiles as $profile)
                                    @php
                                    $image="";
                                    if($profile->image !=""){
                                    $image='public/profilepic/'.$profile->image;
                                    }
                                    else{
                                    $image ='public/dummy.jpg';
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{$profile->name}}</td>
                                        <td>{{$profile->profession}}</td>
                                        <td>
                                            <textarea>{{$profile->description}}</textarea>
                                        </td>
                                        <td>{{$profile->fb_link}}</td>
                                        <td>{{$profile->tk_link}}</td>
                                        <td>
                                            @if($profile->status===0)
                                            <a href="{{url('profile/status/' .$profile->id .'?status=1')}}" class="btn btn-warning">enable</a>
                                            @else
                                            <a href="{{url('profile/status/' .$profile->id. '?status=0')}}" class="btn btn-danger">disable</a>
                                            @endif
                                        </td>

                                        <td>
                                            <img src="{{url($image)}}" alt="" class="img-fluid" width="50">
                                        </td>
                                        <td>
                                            <a href="{{url('profile/delete', $profile->id)}}" class="btn btn-danger btn-sm">X</a>
                                            <a href="{{url('profile/edite', $profile->id)}}" class="btn btn-warning btn-sm">Edite</a>
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