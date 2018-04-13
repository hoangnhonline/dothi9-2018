<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($name); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('custom-link.index', ['block_id' => $block_id])); ?>"><?php echo e($name); ?></a></li>
      <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('custom-link.index', ['block_id' => $block_id])); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('custom-link.update')); ?>">
    <div class="row">
      <!-- left column -->
      <input name="id" value="<?php echo e($detail->id); ?>" type="hidden">
      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            Chỉnh sửa
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(Session::has('message')): ?>
              <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>                
                               
                
                <div class="form-group" >
                  
                  <label>Text hiển thị<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="link_text" id="link_text" value="<?php echo e($detail->link_text); ?>">
                </div>
                <input type="hidden" name="block_id" value="<?php echo e($block_id); ?>">
                <span class=""></span>
                <div class="form-group">                  
                  <label>URL <span class="red-star">*</span></label>                  
                  <input type="text" class="form-control" name="link_url" id="link_url" value="<?php echo e($detail->link_url); ?>">
                </div>
                
                
            </div>          
           
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" href="<?php echo e(route('custom-link.index', ['block_id' => $block_id])); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- Modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>