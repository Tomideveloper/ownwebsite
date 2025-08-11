@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">User</a></li>
                <li class="breadcrumb-item active">Edite</li>
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
                            <form action="{{url('user/update', $users->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{$users->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="">email:</label>
                                    <input type="text" name="email" id="" class="form-control" value="{{$users->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="">phone:</label>
                                    <input type="text" name="phone" id="" class="form-control" value="{{$users->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="">password:</label>
                                    <input type="password" name="password" id="" class="form-control" value="{{$users->password}}">
                                </div>
                              
                                    <div class="form-group">
                                        <label for=""> Role:</label>
                                        <input type="text" class="form-control" name="role" placeholder="Enter role" value="{{$users->role}}">
                                    </div>
                             
                                <div class="form-group">
                                    <label for="">image:</label>
                                    <input type="file" name="file" id="" class="form-control">
                                    <input type="hidden" name="old_file" id="" class="form-control" value="{{$users->image}}">
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