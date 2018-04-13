 
  
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section class="block-page-article-1" style="padding:10px 5px">
  <article class="page-article-1-content">
    <div class="block-title-common">
      <h3><span class="icon-tile"><i class="fa fa-user"></i></span> <?php echo $detailPage->title; ?></h3>
    </div>
    <div class="block-content">
        <?php echo $detailPage->content; ?>
    </div>
  </article>
</section>
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>