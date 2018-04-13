<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
       <?php if($cartDetail->type == 1): ?>
      Căn hộ
      <?php else: ?>
      Nền
      <?php endif; ?>
      của
      <span style="color:red"><?php echo e($cartDetail->name); ?></span>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('cart-product.index', ['cart_id' => $cart_id])); ?>">
      <?php if($cartDetail->type == 1): ?>
      Căn hộ
      <?php else: ?>
      Nền
      <?php endif; ?></a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm " href="<?php echo e(route('cart-product.index', ['cart_id' => $cart_id])); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('cart-product.store')); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>                
                 <!-- text input -->
                <div class="form-group col-md-6">
                  <label>Tên <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Diện tích </label>
                  <input type="text" class="form-control" name="area" id="area" value="<?php echo e(old('area')); ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Giá </label>
                  <input type="text" class="form-control" name="price" id="price" value="<?php echo e(old('price')); ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Hướng </label>
                  <input type="text" class="form-control" name="direction" id="direction" value="<?php echo e(old('direction')); ?>">
                </div>
                <input type="hidden" name="cart_id" value="<?php echo e($cart_id); ?>" >
                <input type="hidden" name="type" value="<?php echo e($cartDetail->type); ?>">
                <?php if($cartDetail->type == 1): ?>
                <div class="form-group col-md-6">
                  <label>Lầu </label>
                  <input type="text" class="form-control" name="floor" id="floor" value="<?php echo e(old('floor')); ?>">
                </div>

                <div class="form-group col-md-6">
                  <label>Số phòng </label>
                  <input type="text" class="form-control" name="no_room" id="no_room" value="<?php echo e(old('no_room')); ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Số WC </label>
                  <input type="text" class="form-control" name="no_wc" id="no_wc" value="<?php echo e(old('no_wc')); ?>">
                </div>               
                <?php endif; ?>
                <div class="form-group col-md-6">
                  <label>Hoa hồng </label>
                  <input type="text" class="form-control" name="hoa_hong" id="hoa_hong" value="<?php echo e(old('hoa_hong')); ?>">
                </div> 
                <div class="form-group col-md-12">
                  <label for="email">Trạng thái </label>
                  <select class="form-control" name="status" id="status">                                
                    <option value="1" <?php echo e(1 ==  old('status') ? "selected" : ""); ?>>Chưa bán</option>
                    <option value="2" <?php echo e(2 ==  old('status') ? "selected" : ""); ?>>Đã bán</option>
                    <option value="3" <?php echo e(3 ==  old('status') ? "selected" : ""); ?>>Đã cọc</option>
                  </select>
                </div>
                <!-- textarea -->
                <div class="form-group col-md-12">
                  <label>Ghi chú</label>
                  <textarea class="form-control" rows="3" name="notes" id="notes"><?php echo e(old('notes')); ?></textarea>
                </div>            
                <div class="clearfix"></div>    
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('cart-product.index', ['cart_id' => $cart_id])); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
       
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>