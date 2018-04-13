 
  

<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  

<?php $__env->startSection('content'); ?>
<section class="col-sm-8 col-xs-12 block-sitemain">
<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>            
        <li class="active"><?php echo e($cateDetail->name); ?></li>
    </ul>
</article>
    <article class="block block-breadcrumb">
      <div class="block-contents">
        <ul>
          <li class="active"><h2><a href="<?php echo e(route('news-list', $cateDetail->slug)); ?>"><?php echo e($cateDetail->name); ?></a></h2></li>
        </ul>
      </div>
    </article><!-- /block-breadcrumb -->    

    <article class="block block-article-list clearfix">
      <div class="col-sm-12 col-xs-12">
        <div class="row">
          <div class="block-contents">
            <ul class="article-list-news">
              <?php foreach( $articlesArr as $articles ): ?>
              <li class="article-news-item">
                <div class="article-news-item-head">
                  <a id="" href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>"><img title="<?php echo $articles->title; ?>" src="<?php echo e(Helper::showImageThumb($articles->image_url, 2)); ?>" alt="<?php echo $articles->title; ?>"></a>
                </div>
                <div class="article-news-item-description">
                  <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>"><?php echo $articles->title; ?></a>
                  <div class="nd-time"><?php echo e(date('d-m-Y', strtotime($articles->created_at))); ?>  <small><?php echo e(date('H:i', strtotime($articles->created_at))); ?> </small></div>
                  <p><?php echo $articles->description; ?></p>
                </div>
              </li>
              <?php endforeach; ?>
             
            </ul>
            <div style="text-align:center">
            <?php echo e($articlesArr->links()); ?>

            </div>
            </nav>
          </div>
        </div>
      </div>
    </article><!-- /block-news-new -->

  </section><!-- /block-site-left -->
<?php $__env->stopSection(); ?>
  <?php $__env->startSection('javascript_page'); ?>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>