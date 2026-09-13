<?php if($paginator->hasPages()): ?>
    <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="prev disabled"><a>Prev</a></li>
        <?php else: ?>
            <li class="prev"><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">Prev</a></li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active"><a><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="next"><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next</a></li>
        <?php else: ?>
            <li class="next disabled"><span>Next</span></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH D:\laravel_project\gatewaybooks\resources\views/pagination/default.blade.php ENDPATH**/ ?>