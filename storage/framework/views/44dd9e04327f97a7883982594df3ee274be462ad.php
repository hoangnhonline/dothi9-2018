<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tài khoản
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'account.index' )); ?>">Tài khoản</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if(Session::has('message')): ?>
      <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
      <a href="<?php echo e(route('account.create')); ?>" class="btn btn-info btn-sm" style="margin-bottom:5px">Tạo mới</a>
      <?php if(Auth::user()->role == 3): ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>            
      <div class="panel-body">
        <form class="form-inline" role="form" method="GET" action="<?php echo e(route('account.index')); ?>">
        <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role" id="role">      
              <option value="" >--Tất cả--</option>                       
              <option value="1" <?php echo e($role == 1 ? "selected" : ""); ?>>Editor</option>
              <option value="2" <?php echo e($role == 2 ? "selected" : ""); ?>>Mod</option> 
              <option value="3" <?php echo e($role == 3 ? "selected" : ""); ?>>Admin</option>
            </select>
          </div>
          <?php if($role == 1): ?>
          <div class="form-group">
              <label>Mod</label>
              <select class="form-control" name="leader_id" id="leader_id">
                <option value="">--Tất cả--</option>
                <?php if($modList): ?>
                  <?php foreach($modList as $mod): ?>
                <option value="<?php echo e($mod->id); ?>" <?php echo e($leader_id == $mod->id ? "selected" : ""); ?>><?php echo e($mod->full_name); ?></option> 
                  <?php endforeach; ?>
                <?php endif; ?>                                
              </select>
            </div> 
            <?php endif; ?>
          </form>
      </div>
      </div>
      <?php endif; ?>

      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>              
              <th>Họ Tên</th>
              <th>Email</th>
              <th>Role</th>
              <th>Trạng thái</th>
              <th width="1%" style="white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            <?php if( $items->count() > 0 ): ?>
              <?php $i = 0; ?>
              <?php foreach( $items as $item ): ?>
                <?php $i ++; ?>
                <tr id="row-<?php echo e($item->id); ?>">
                  <td><span class="order"><?php echo e($i); ?></span></td>
                 
                  <td>                  
                    <a href="<?php echo e(route( 'account.edit', [ 'id' => $item->id ])); ?>"><?php echo e($item->full_name); ?></a>                                
                  </td>
                  <td><?php echo e($item->email); ?></td>
                  <td><?php echo e($item->role == 1 ? "Editor"  : ($item->role == 2 ? "Mod" : "Admin" )); ?></td>
                  <td><?php echo e($item->status == 1 ? "Mở"  : "Khóa"); ?></td>
                  <td style="white-space:nowrap">  
                    <a href="<?php echo e(route( 'account.update-status', ['status' => $item->status == 1 ? 2 : 1 , 'id' => $item->id ])); ?>" class="btn btn-sm <?php echo e($item->status == 1 ? "btn-warning" : "btn-info"); ?>" 
                    <?php if( $item->status == 2): ?>
                    onclick="return confirm('Bạn chắc chắn muốn MỞ khóa tài khoản này? '); "
                    <?php else: ?>
                    onclick="return confirm('Bạn chắc chắn muốn KHÓA tài khoản này? '); "
                    <?php endif; ?>
                    ><?php echo e($item->status == 1 ? "Khóa TK" : "Mở khóa TK"); ?></a>                
                    <a href="<?php echo e(route( 'account.edit', [ 'id' => $item->id ])); ?>" class="btn-sm btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>                 
                    
                    <a onclick="return callDelete('<?php echo e($item->name); ?>','<?php echo e(route( 'account.destroy', [ 'id' => $item->id ])); ?>');" class="btn-sm btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                    
                  </td>
                </tr> 
              <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="9">Không có dữ liệu.</td>
            </tr>
            <?php endif; ?>

          </tbody>
          </table>
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
function callDelete(name, url){  
  swal({
    title: 'Bạn muốn xóa "' + name +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
$(document).ready(function(){
  $('#role, #leader_id').change(function(){
    $(this).parents('form').submit();
  });
  $('#table-list-data tbody').sortable({
        placeholder: 'placeholder',
        handle: ".move",
        start: function (event, ui) {
                ui.item.toggleClass("highlight");
        },
        stop: function (event, ui) {
                ui.item.toggleClass("highlight");
        },          
        axis: "y",
        update: function() {
            var rows = $('#table-list-data tbody tr');
            var strOrder = '';
            var strTemp = '';
            for (var i=0; i<rows.length; i++) {
                strTemp = rows[i].id;
                strOrder += strTemp.replace('row-','') + ";";
            }     
            updateOrder("loai_sp", strOrder);
        }
    });
});
function updateOrder(table, strOrder){
  $.ajax({
      url: $('#route_update_order').val(),
      type: "POST",
      async: false,
      data: {          
          str_order : strOrder,
          table : table
      },
      success: function(data){
          var countRow = $('#table-list-data tbody tr span.order').length;
          for(var i = 0 ; i < countRow ; i ++ ){
              $('span.order').eq(i).html(i+1);
          }                        
      }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>