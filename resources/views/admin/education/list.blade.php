@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Education</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Education</li>
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
                            <h3> <strong>Education list</strong></h3>
                            <p>
                               <a href="{{url('education/create')}}" class="btn btn-block btn-success btn-lg">+Add</a>
                            </p>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive table-striped table-bordered">
                                <tr>
                                    <th>id:</th>
                                    <th>Education:</th>
                                    <th>time:</th>
                                    <th>description:</th>
                                    <th>Status:</th>
                                
                                    <th>Action:</th>
                                </tr>
                                <tbody>
                                    @foreach($educations as $educ)
                                 
                                    <tr>
                                        <td>{{$educ->id}}</td>
                                        <td>{{$educ->time}}</td>
                                        <td>{{$educ->title}}</td>
                                        <td>
                                            <textarea>{{$educ->description}}</textarea>
                                        </td>
                                      
                                        <td>
                                            @if($educ->status===0)
                                            <a href="{{url('education/status/' .$educ->id .'?status=1')}}" class="btn btn-warning">enable</a>
                                            @else
                                            <a href="{{url('education/status/' .$educ->id. '?status=0')}}" class="btn btn-danger">disable</a>
                                            @endif
                                        </td>

                                      
                                        <td>
                                            <a href="{{url('education/delete', $educ->id)}}" class="btn btn-danger btn-sm">X</a>
                                            <a href="{{url('education/edite', $educ->id)}}" class="btn btn-warning btn-sm">Edite</a>
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