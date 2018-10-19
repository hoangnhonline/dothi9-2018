@extends('frontend.layout') 
@include('frontend.partials.meta') 
@section('content')

<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>           
        <li class="active">Liên hệ</li>
    </ul>
</article>
<div class="container contact">
  <div class="row">
    <div class="col-md-4" style="margin-bottom: 20px;">
      <div class="widget-item info-contact in-fo-page-content">
        <h1 class="title-head">Thông tin liên hệ</h1>
        <!-- End .widget-title -->
        
        <address>
            {!! $settingArr['cty_info'] !!}
        </address>
        <!-- End .widget-menu -->
      </div>
      
    </div>
    <div class="col-md-8">
      <div class="page-login">
        <div id="login">
          <h3 class="title-head">Gửi thông tin</h3>         
          <div id="showmess" class="clearfix"></div>
                @if(Session::has('message'))
                
                <p class="alert alert-info" >{{ Session::get('message') }}</p>
                
                @endif
                @if (count($errors) > 0)                        
                  <div class="alert alert-danger ">
                    <ul>                           
                        <li>Vui lòng nhập đầy đủ thông tin.</li>                            
                    </ul>
                  </div>                        
                @endif  
                <form class="block-form" action="{{ route('send-contact') }}" method="POST">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ tên khách hàng" value="{{ old('fullname') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <textarea name="content" id="content" rowspan="300" class="form-control" placeholder="Ghi chú">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" id="btnSave" class="btn btn-prmary btn-view">Gửi liên hệ</button>
                        </div>
                    </div>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
