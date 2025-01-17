@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Cards Gamifications- UI elements')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-gamifications.css')}}" />
@endsection

@section('content')

<h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Gamifications
</h4>

<div class="row gy-4 align-items-end mt-3">
  <div class="col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body text-nowrap">
        <h4 class="card-title display-6 mb-1 d-flex gap-2 flex-wrap text-nowrap">Congratulations Norris! 🎉</h4>
        <p class="pb-0">Best seller of the month</p>
        <h4 class="text-primary mb-1">$42.8k</h4>
        <p class="mb-2 pb-1">78% of target 🤟🏻</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
      </div>
      <img src="{{asset('assets/img/icons/misc/triangle-'.$configData['style'].'.png') }}" class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background" data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
      <img src="{{asset('assets/img/illustrations/trophy.png')}}" class="position-absolute bottom-0 end-0 me-4 mb-4" width="83" alt="view sales">
    </div>
  </div>

  <div class="col-lg-8 col-12 py-0 py-md-5 py-lg-0">
    <div class="card">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="card-body">
            <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Congratulations John!🎉</h4>
            <p class="mb-0">You have done <span class="fw-semibold">68%</span>😎 more sales today.</p>
            <p class="mb-0">Check your new badge in your profile.</p>
          </div>
        </div>
        <div class="col-12 col-md-6 position-relative text-center">
          <img src="{{asset('assets/img/illustrations/illustration-john-2.png')}}" class="card-img-position bottom-0 w-auto end-0 scaleX-n1-rtl" alt="View Profile">
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-8 col-12">
    <div class="card">
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">
            <h4 class="card-title display-6 text-truncate mb-4 lh-sm">Congratulations Daisy!🎉</h4>
            <p class="mb-0">You have done 84% 😍 more task today.</p>
            <p class="mb-0">Check your new badge in your profile.</p>
          </div>
        </div>
        <div class="col-md-6 position-relative text-center">
          <img src="{{asset('assets/img/illustrations/illustration-john.png')}}" class="card-img-position bottom-0 w-auto end-0 scaleX-n1-rtl" alt="View Profile">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title display-6 mb-1 d-flex gap-2 flex-wrap">Upgrade Account 😀</h4>
        <p class="pb-1">Add 15 team members</p>
        <h4 class="text-primary mb-1">$199</h4>
        <p class="mb-2 pb-1">40% OFF 😍</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">Upgrade Plan</a>
      </div>
      <img src="{{asset('assets/img/icons/misc/triangle-'.$configData['style'].'.png') }}" class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background" data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
      <img src="{{asset('assets/img/illustrations/illustration-upgrade-account-2.png')}}" class="position-absolute bottom-0 end-0 me-5 mb-3" height="176" alt="Upgrade Account">
    </div>
  </div>
</div>
@endsection
