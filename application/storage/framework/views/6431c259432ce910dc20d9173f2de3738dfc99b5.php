

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <?php echo $__env->make('template/admin/welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <button class="btn btn-primary" id="buttonShowFormPublish" onclick="showFormPublish()">Create New Warta <i class="icon-circle-plus"></i></button>
            <div class="card d-none" id="formPublish">
                <div class="card-body">
                    <form class="forms-sample" action="createPublish" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Judul" name="title">
                        </div>
                        <div class="form-group">
                            <label for="category">Kategory</label>
                            <select class="form-control" id="category" name="category">
                                <option>Warta</option>
                                <option>Galery</option>
                                <option>Hasil Rapat</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleSelectGender">Tags</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Notulen</option>
                                <option>Komisi</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="x">Content</label>
                            <input id="x" type="hidden" name="content">
                            <trix-editor input="x"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-light" onclick="cancelFormPublish()">Cancel</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo e(asset('adm/images/upload/'.$post->image->files)); ?>" alt="Gambar Ilustrasi">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($post->title); ?></h5>
                            <p class="card-text"><div><?php echo e($post->created_at); ?></div></p>
                            <a href="publish/<?php echo e($post->slug); ?>" class="btn btn-primary">Read More</a>
                            <form class="d-inline" action="deletePublish" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($post->id); ?>">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
  <!-- content-wrapper ends -->

<script>
function showFormPublish()
{
    $("#buttonShowFormPublish").addClass("d-none");
    $("#formPublish").removeClass("d-none");
}

function cancelFormPublish()
{
    $("#buttonShowFormPublish").removeClass("d-none");
    $("#formPublish").addClass("d-none");
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/admin/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SERVER\htdocs\dprd\application\resources\views/admin/v_warta.blade.php ENDPATH**/ ?>