@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Verify Email Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
            <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->

        <!-- Verify Email -->
        <div class="card-body mt-2">
          <h4 class="mb-2">Verify your email ✉️</h4>
          <p class="text-start mb-2">
            Account activation link sent to your email address: hello@example.com Please follow the link inside to continue.
          </p>
          <a class="btn btn-primary w-100 my-3" href="{{url('/')}}">
            Skip for now
          </a>
          <p class="text-center mb-0">Didn't get the mail?
            <a href="javascript:void(0);">
              Resend
            </a>
          </p>
        </div>
      </div>
      <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-'.$configData['style'].'.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg" data-app-light-img="illustrations/auth-basic-mask-light.png" data-app-dark-img="illustrations/auth-basic-mask-dark.png">
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
      <!-- /Verify Email -->
    </div>
  </div>
</div>
@endsection
