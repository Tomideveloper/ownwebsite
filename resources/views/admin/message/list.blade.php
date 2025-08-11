@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>message</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">message</li>
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
                            <h3> <strong>Messages list</strong></h3>
                           
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive table-striped table-bordered">
                                <tr>
                                    <th>id:</th>
                                    <th>name:</th>
                                    <th>email:</th>
                                    <th>Message:</th>
                                    
                                
                                    <th>Action:</th>
                                </tr>
                                <tbody>
                                    @foreach($messages as $message)
                                 
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>
                                            <textarea>{{$message->message}}</textarea>
                                        </td>
                                      

                                      
                                        <td>
                                            <a href="{{url('message/delete', $message->id)}}" class="btn btn-danger btn-sm">X</a>
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