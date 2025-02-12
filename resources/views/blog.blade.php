@extends('layouts.app') 

@section('content')
@include('partials.header', ['header' => $header])
@include('partials.blog_card', ['blogsData' => $blogsData])
@include('partials.footer', ['footerData' => $footerData])
@endsection
