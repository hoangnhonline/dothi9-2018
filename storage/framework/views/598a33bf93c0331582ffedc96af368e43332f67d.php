<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Giỏ hàng</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('cart.index')); ?>">Giỏ hàng</a></li>
      <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm " href="<?php echo e(route('cart.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            Chỉnh sửa
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?php echo e(route('cart.update')); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
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
              <div class="form-group">
                <label for="email">Loại </label>
                <select class="form-control" name="type" id="type">                                
                  <option value="1" <?php echo e(1 ==  old('type', $detail->type) ? "selected" : ""); ?>>Chung cư</option>
                  <option value="2" <?php echo e(2 ==  old('type', $detail->type) ? "selected" : ""); ?>>Đất nền</option>
                </select>
              </div>
              
               <!-- text input -->
              <div class="form-group">
                <label>Tên <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($detail->name); ?>">
              </div>
           
               <?php if($editorList && Auth::user()->role > 1): ?>
                <div class="form-group">
                    <label>Nhân viên<span class="red-star">*</span></label>
                    <div class="clearfix"></div>
                    <?php $i = 0; ?>
                    <?php foreach($editorList as $edi): ?>
                    <div class="col-md-3">
                      <input type="checkbox" name="user_id[]" value="<?php echo e($edi->id); ?>" id="user_id_<?php echo e($i); ?>"
                      <?php echo e(in_array($edi->id, $cartUser) ? "checked" : ""); ?>

                      ><label for="user_id_<?php echo e($i); ?>"><?php echo e($edi->full_name); ?></label>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>               
                <?php endif; ?>           
            </div>                    
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('cart.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#type').change(function(){
      var type = $(this).val();
      if(type != 3){
        $('#div_tien_ich').hide();
      }else{
        $('#div_tien_ich').show();
      }
    });
    $('#name').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' && $('#slug').val() == ''){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      });
  });
</script>>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>