@extends('frontend.layout')

@section('header')
@endsection
@include('frontend.partials.meta')
@section('content')
<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>            
        <li class="active">Về chúng tôi</li>
    </ul>
</article>
<section class="main" id="site-main">

    <section class="container">
        <section class="row">
            

            <section class="block-sitemain">
                <article class="block-post-news">
                    <div class="block-title-common">
                        <h3>
                            <span class="icon-tile"><i class="fa fa-star"></i></span>
                            Về chúng tôi
                        </h3>
                    </div>
                    <div class="block-contents">
                   
                        <div class="block-post-news">
                            {!! $detail->content !!}
                            
                        </div>
                    </div>
                </article><!-- /block-news-sidebar -->
            </section><!-- /block-site-left -->
        </section>
    </section>
</section><!-- /main -->

@endsection
