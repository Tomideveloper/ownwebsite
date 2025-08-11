@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Works</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Works</a></li>
                <li class="breadcrumb-item active">edite</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('work_experience/update', $works->id)}}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <label for="">Education</label>
                                    <input type="text" name="education" id="" class="form-control" value="{{$works->education}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Date :</label>
                                    <input type="text" name="date" class="form-control"value="{{$works->date}}">
                                </div>
                                <div class="form-group">
                                    <label for="">description:</label>
                                    <textarea type="text" name="description" class="form-control"value="{{$works->description}}">{{$works->description}}</textarea>
                                </div>

                                

                                <div class="form-group mt-4">
                                    <button type="sumbit" class="form-control btn btn-warning">submit</button>
                                </div>






                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->
        </div>
    </section>
</main><!-- End #main -->
@endsection