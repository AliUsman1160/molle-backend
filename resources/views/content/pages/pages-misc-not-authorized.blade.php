@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Not Authorized - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Not Authorized -->
<div class="misc-wrapper">
  <h1 class="mb-2 mx-2" style="font-size: 6rem;">401</h1>
  <h4 class="mb-2">You are not authorized! 🔐</h4>
  <p class="mb-2 mx-2">You don’t have permission to access this page. Go Home!</p>
  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('assets/img/illustrations/tree-2.png')}}" alt="misc-tree" class="img-fluid misc-object d-none d-lg-inline-block" width="80">
    <img src="{{asset('assets/img/illustrations/misc-mask-'.$configData['style'].'.png')}}" alt="misc-error" class="scaleX-n1-rtl misc-bg d-none d-lg-inline-block" data-app-light-img="illustrations/misc-mask-light.png" data-app-dark-img="illustrations/misc-mask-dark.png">
    <div class="d-flex flex-column align-items-center">
      <img src="{{asset('assets/img/illustrations/401.png')}}" alt="misc-error" class="misc-model img-fluid z-1" width="780">
      <div>
        <a href="{{url('/')}}" class="btn btn-primary text-center my-4">Back to home</a>
      </div>
    </div>
  </div>
</div>
<!-- /Not Authorized -->
@endsection
