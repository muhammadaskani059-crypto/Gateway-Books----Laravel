<?php $__env->startSection('page-title'); ?>
    Manage Authors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <section class="content">
        <!-- /.row -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a id="active_all_status" class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                    <a id="deactive_all_status" class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                    <a id="delete_all" class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                    <a href="<?php echo e(Route('author.create')); ?>" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
                </h3>
                <div class="box-tools">
                    <form method="GET" action="/admin/author">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="s" class="form-control pull-right" placeholder="Search"
                                value="<?php echo e((request()->get('s')) ? request()->get('s') : null); ?>">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if($authors): ?>
                        <form name="formView" id="formView">
                            <table class="table table-bordered">
                                <thead style="background-color: #F8F8F8;">
                                    <tr>
                                        <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                                        <th width="20%">Title</th>
                                        <th width="20%">Designation</th>
                                        <th width="20%">Author Image</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Manage</th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll[]" value="<?php echo e($author->id); ?>" class="checkSingle"></td>
                                        <td><?php echo e($author->title); ?></td>
                                        <td><?php echo e($author->designation); ?></td>
                                        <td>
                                            <?php if($author->author_img == 'No image found'): ?>
                                                <img src="/uploads/no-img.png" width="100" height="100" class="img-thumbnail"
                                                    alt="No image found" />
                                            <?php else: ?>
                                                <img src="/uploads/<?php echo e($author->author_img); ?>" width="100" height="100" class="img-thumbnail"
                                                    alt="<?php echo e($author->title); ?>" />
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($author->status == 'DEACTIVE'): ?>
                                                <a href="<?php echo e(Route('author.status', $author->id)); ?>"
                                                    class="btn btn-danger btn-sm singleStatus"><i class="fa fa-thumbs-down"></i></a>
                                            <?php else: ?>
                                                <a href="<?php echo e(Route('author.status', $author->id)); ?>"
                                                    class="btn btn-info btn-sm singleStatus"><i class="fa fa-thumbs-up"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(Route('author.edit', $author->id)); ?>" class="btn btn-info btn-flat btn-sm"> <i
                                                    class="fa fa-edit"></i></a>
                                            <a href="<?php echo e(Route('author.delete', $author->id)); ?>"
                                                class="btn btn-danger btn-flat btn-sm singleDelete"> <i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                    Showing <?php echo e(($authors->currentpage() - 1) * $authors->perpage() + 1); ?> to
                                    <?php echo e($authors->currentpage() * (($authors->perpage() < $authors->total()) ? $authors->perpage() : $authors->total())); ?>

                                    of <?php echo e($authors->total()); ?> entries
                                </span>
                            </div>
                            <div class="col-sm-6 text-right">
                                <?php echo e($authors->links()); ?>

                            </div>
                        </div>
                    </div>
                <?php else: ?>
                <div class="alert alert-danger">No record found!</div>
            <?php endif; ?>
        </div>
        <!-- /.box-body -->
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            // single status via ajax.
            $(".singleStatus").on('click', function (event) {
                event.preventDefault(); //disable link functionality.
                var self = $(this);
                var href = self.closest('a').attr('href');

                self.html('<i class="fa fa-spinner fa-spin"></i>');

                $.get(href, function (response) {
                    if (response == 'ACTIVE') {
                        self.closest('a').removeClass('btn-danger');
                        self.closest('a').addClass('btn-info');
                        self.html('<i class="fa fa-thumbs-up"></i>');
                    } else {
                        self.closest('a').removeClass('btn-info');
                        self.closest('a').addClass('btn-danger');
                        self.html('<i class="fa fa-thumbs-down"></i>');
                    }
                });
            });

            // single delete via ajax.
            $(".singleDelete").on('click', function (event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this?')) {
                    var self = $(this);
                    var href = self.closest('a').attr('href');

                    self.html('<i class="fa fa-spinner fa-spin"></i>');

                    $.get(href, function (response) {
                        if (response == 'true') {
                            self.closest('tr').css('background-color', '#ff6666').fadeOut(1000);
                            self.remove();
                        }
                    });
                } else
                    return false;
            })

            // active all status via ajax.
            $("#active_all_status").on('click', function (event) {
                event.preventDefault();

                if ($(".checkSingle:checked").length > 0) {
                    var formSerials = $("#formView").serialize();
                    $.get('<?php echo e(Route('author.active.all')); ?>', formSerials, function (data) {
                        if (data > 0) {
                            window.location.href = '<?php echo e(Route('author.all')); ?>';
                        }
                    });
                } else {
                    alert("Check atleast one.");
                }
            });

            // deactive all status via ajax.
            $("#deactive_all_status").on('click', function (event) {
                event.preventDefault();

                if ($(".checkSingle:checked").length > 0) {
                    var formSerials = $("#formView").serialize();
                    $.get('<?php echo e(Route('author.deactive.all')); ?>', formSerials, function (data) {
                        if (data > 0) {
                            window.location.href = '<?php echo e(Route('author.all')); ?>';
                        }
                    });
                } else {
                    alert("Check atleast one.");
                }
            });

            // delte all record via ajax.
            $("#delete_all").on('click', function (event) {
                event.preventDefault();

                if ($(".checkSingle:checked").length > 0) {
                    if (confirm('Are you sure you want to Delete all records?')) {
                        var formSerials = $("#formView").serialize();
                        $.get('<?php echo e(Route('author.delete.all')); ?>', formSerials, function (data) {
                            if (data > 0) {
                                window.location.href = '<?php echo e(Route('author.all')); ?>';
                            }
                        });
                    } else {
                        return false;
                    }

                } else {
                    alert("Check atleast one.");
                }
            });

        }); //end document.ready














    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gatewaybooks\resources\views/admin/author/index.blade.php ENDPATH**/ ?>