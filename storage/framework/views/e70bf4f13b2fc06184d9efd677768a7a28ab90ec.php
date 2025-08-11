
<?php $__env->startSection('content'); ?>
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
                               <a href="<?php echo e(url('profile/create')); ?>" class="btn btn-block btn-success">+Add</a>
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
                                    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $image="";
                                    if($profile->image !=""){
                                    $image='public/profilepic/'.$profile->image;
                                    }
                                    else{
                                    $image ='public/dummy.jpg';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo e($profile->name); ?></td>
                                        <td><?php echo e($profile->profession); ?></td>
                                        <td>
                                            <textarea><?php echo e($profile->description); ?></textarea>
                                        </td>
                                        <td><?php echo e($profile->fb_link); ?></td>
                                        <td><?php echo e($profile->tk_link); ?></td>
                                        <td>
                                            <?php if($profile->status===0): ?>
                                            <a href="<?php echo e(url('profile/status/' .$profile->id .'?status=1')); ?>" class="btn btn-warning">enable</a>
                                            <?php else: ?>
                                            <a href="<?php echo e(url('profile/status/' .$profile->id. '?status=0')); ?>" class="btn btn-danger">disable</a>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <img src="<?php echo e(url($image)); ?>" alt="" class="img-fluid" width="50">
                                        </td>
                                        <td>
                                            <a href="<?php echo e(url('profile/delete', $profile->id)); ?>" class="btn btn-danger btn-sm">X</a>
                                            <a href="<?php echo e(url('profile/edite', $profile->id)); ?>" class="btn btn-warning btn-sm">Edite</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\projects_no1\resources\views/admin/profile/list.blade.php ENDPATH**/ ?>