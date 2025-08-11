@extends('admin.adminmaster')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Profile</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                            <form action="{{url('profile/update', $profiles->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{$profiles->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="">profession:</label>
                                    <input type="text" name="profession" class="form-control" value="{{$profiles->profession}}">
                                </div>
                                <div class="form-group">
                                    <label for="">description:</label>
                                    <textarea type="text" name="description" class="form-control"  
                                    value="{{$profiles->description}}">{{$profiles->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for=""> FB_link:</label>
                                    <input type="text" class="form-control" name="fb_link" placeholder="Enter fb_link" value="{{$profiles->fb_link}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> tk_link:</label>
                                    <input type="text" class="form-control" name="tk_link" placeholder="Enter tk_link"  value="{{$profiles->tk_link}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> linkdin_link:</label>
                                    <input type="text" class="form-control" name="linkedin_link" placeholder="Enter linkdin_link"  value="{{$profiles->linkedin_link}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> insta_link:</label>
                                    <input type="text" class="form-control" name="insta_link" placeholder="Enter insta_link"  value="{{$profiles->insta_link}}">
                                </div>


                                <div class="form-group">
                                    <label for="">image:</label>
                                    <input type="file" name="file" class="form-control">
                                    <input type="hidden" name="old_file" class="form-control"  value="{{$profiles->image}}">
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