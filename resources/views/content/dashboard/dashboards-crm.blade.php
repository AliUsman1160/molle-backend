@extends('layouts/layoutMaster')

@section('title', 'Dashboard - CRM')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/dashboards-crm.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-crm.js')}}"></script>
@endsection

@section('content')
<div class="row gy-4">
  <!-- Ratings -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Ratings</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">13k</h4>
                <small class="text-success">+15.6%</small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Year of 2021</div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="h-100 position-relative">
            <img src="{{asset('assets/img/illustrations/illustration-1.png')}}" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="95">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Ratings -->
  <!-- Sessions -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Sessions</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">24.5k</h4>
                <small class="text-danger">-20%</small>
              </div>
              <div class="badge bg-label-secondary rounded-pill">Last Week</div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="h-100 position-relative">
            <img src="{{asset('assets/img/illustrations/illustration-2.png')}}" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="81">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Sessions -->
  <!-- Transactions -->
  <div class="col-xl-6 align-self-end">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Transactions</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row g-3 mb-xl-2">
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-trending-up mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Sales</div>
                <h5 class="mb-0">245k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-account-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Customers</div>
                <h5 class="mb-0">12.5k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow">
                  <i class="mdi mdi-cellphone-link mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Product</div>
                <h5 class="mb-0">1.54k</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
  <!-- Total Sales Chart-->
  <div class="col-xl-3 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-2">Total Sales</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="totalSalesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalSalesDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <h6 class="fw-normal mb-0">$21,845</h6>
      </div>
      <div class="card-body">
        <div id="totalSalesChart"></div>
      </div>
    </div>
  </div>
  <!--/ Total Sales Chart-->
  <!-- Revenue Report Chart-->
  <div class="col-xl-3 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Revenue Report</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="revenueReportDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="revenueReportDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="revenueReportChart"></div>
      </div>
    </div>
  </div>
  <!--/ Revenue Report Chart-->
  <!-- Sales Overview Chart -->
  <div class="col-xl-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Sales Overview</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="salesOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesOverviewDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-lg-4 mt-lg-1">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div id="salesOverviewChart"></div>
          </div>
          <div class="col-md-6 mt-3 mt-md-0">
            <div class="d-flex align-items-center mb-3">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-currency-usd mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <p class="mb-1">Number of Sales</p>
                <h5 class="mb-1">$86,400</h5>
              </div>
            </div>
            <hr>
            <div class="row g-4">
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="text-heading mb-0">Apparel</p>
                </div>
                <p class="fw-medium mb-0">$12,150</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="text-heading mb-0">Electronic</p>
                </div>
                <p class="fw-medium mb-0">$24,900</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="text-heading mb-0">FMCG</p>
                </div>
                <p class="fw-medium mb-0">$12,750</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="text-heading mb-0">Other Sales</p>
                </div>
                <p class="fw-medium mb-0">$50,200</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Sales Overview Chart -->
  <!-- Activity Timeline -->
  <div class="col-xl-6 col-lg-8">
    <div class="card card-action">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0">Activity Timeline</h5>
      </div>
      <div class="card-body pt-3 pb-0">
        <ul class="timeline card-timeline mb-0">
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-danger"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-2 pb-1">
                <h6 class="mb-0">8 Invoices have been paid</h6>
                <small class="text-muted">Wednesday</small>
              </div>
              <p class="mb-2">Invoices have been paid to the company</p>
              <div class="d-flex">
                <a href="javascript:void(0)" class="me-3">
                  <img src="{{asset('assets/img/icons/misc/pdf.png')}}" alt="PDF image" width="20" class="me-1">
                  <span class="fw-medium text-body">invoices.pdf</span>
                </a>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-2 pb-1">
                <h6 class="mb-0">Create a new project for client 😎
                </h6>
                <small class="text-muted">April, 18</small>
              </div>
              <p class="mb-2">Invoices have been paid to the company.</p>
              <div class="d-flex flex-wrap align-items-center">
                <div class="avatar avatar-xs me-2">
                  <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                </div>
                <h6 class="mb-0 text-body">John Doe (Client)</h6>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-info"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-2 pb-1">
                <h6 class="mb-0">Order #37745 from September</h6>
                <small class="text-muted">January, 10</small>
              </div>
              <p class="mb-0">Invoices have been paid to the company.</p>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent border-transparent">
            <span class="timeline-point timeline-point-warning"></span>
            <div class="timeline-event pb-1 mb-n4">
              <div class="timeline-header">
                <h6 class="mb-0">Public Meeting</h6>
                <small class="text-muted">September, 30</small>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Activity Timeline -->
  <!-- Weekly Sales Chart -->
  <div class="col-lg-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Weekly Sales</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="weeklySalesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklySalesDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <p class="text-body mb-0">Total 85.4k Sales</p>
      </div>
      <div class="card-body">
        <div id="weeklySalesChart"></div>
        <div class="d-flex align-items-center justify-content-around mt-3">
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-trending-up mdi-24px"></i>
              </div>
            </div>
            <div class="ms-3 d-flex flex-column">
              <h6 class="mb-1">34.6k</h6>
              <small>Sales</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-success rounded">
                <i class="mdi mdi-currency-usd mdi-24px"></i>
              </div>
            </div>
            <div class="ms-3 d-flex flex-column">
              <h6 class="mb-1">$482k</h6>
              <small>Total Profit</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Weekly Sales Chart -->
  <div class="col-xl-2 col-lg-4 col-sm-6">
    <div class="row gy-4">
      <!-- Total Growth chart -->
      <div class="col-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-0">42.5k</h4>
          </div>
          <div class="card-body">
            <div id="totalGrowthAreaChart" class="mb-3"></div>
            <h6 class="text-center mb-0">Total Growth</h6>
          </div>
        </div>
      </div>
      <!--/ Total Growth chart -->
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="avatar">
              <div class="avatar-initial bg-primary rounded-circle shadow-sm">
                <i class="mdi mdi-wallet-travel mdi-24px"></i>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="newProjectID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical mdi-24px"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="newProjectID">
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                <a class="dropdown-item" href="javascript:void(0);">Update</a>
              </div>
            </div>
          </div>
          <div class="card-body pt-0 mb-md-2">
            <h6 class="mb-2">New Project</h6>
            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
              <h4 class="mb-0 me-2">862</h4>
              <small class="text-danger">-18%</small>
            </div>
            <small>Yearly Project</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Upgrade Plan -->
  <div class="col-xl-4 col-lg-8 col-md-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Upgrade Your Plan</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="upgradePlanCard" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="upgradePlanCard">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <small>Please make the payment to start enjoying all the features of our premium plan as soon as possible.</small>
        <div class="bg-label-primary p-2 border rounded my-3">
          <div class="d-flex px-1">
            <div class="avatar flex-shrink-0 me-3">
              <div class="avatar-initial bg-label-primary rounded">
                <div>
                  <img src="{{asset('assets/img/icons/unicons/briefcase.png')}}" alt="paypal">
                </div>
              </div>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Platinum</h6>
                <a href="javascript:void(0)" class="small" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</a>
              </div>
              <div class="user-progress">
                <div class="d-flex justify-content-center">
                  <sup class="mt-3 mb-0 text-heading small">$</sup>
                  <h3 class="fw-medium mb-0">2,124</h3>
                  <sub class="mt-auto mb-2 pb-1 text-heading small"> /Year</sub>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form id="paymentDetailsForm" onsubmit="return false">
          <h6 class="mb-3 pb-1">Payment Details</h6>
          <div class="d-flex mb-3">
            <div class="me-3">
              <img src="{{asset('assets/img/icons/payments/logo-mastercard-small.png')}}" alt="credit card" height="30">
            </div>
            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
              <div>
                <h6 class="mb-0">Credit Card</h6>
                <small>5688 xxxx xxxx 2356</small>
              </div>
              <div class="w-px-75">
                <input type="text" class="form-control cvv-code-payment" maxlength="3" placeholder="CVV" />
              </div>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="me-3">
              <img src="{{asset('assets/img/icons/payments/logo-credit-card-2.png')}}" alt="credit card" height="30">
            </div>
            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
              <div>
                <h6 class="mb-0">Credit Card</h6>
                <small>8562 xxxx xxxx 4563</small>
              </div>
              <div class="w-px-75">
                <input type="text" class="form-control cvv-code-payment" maxlength="3" placeholder="CVV" />
              </div>
            </div>
          </div>
          <a href="javascript:;" class="d-block mt-2 mb-3 pb-1 small" data-bs-toggle="modal" data-bs-target="#addNewCCModal"> Add Payment Method </a>
          <div class="col-12 mb-2 pb-2">
            <input id="addEmail" name="addEmail" class="form-control" type="text" placeholder="Email Address" />
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary w-100">
              <span class="me-1">Process to payment</span>
              <i class="mdi mdi-arrow-right scaleX-n1-rtl"></i> </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/ Upgrade Plan -->
  <!-- Meeting Schedule -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Meeting Schedule</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="meetingSchedule" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meetingSchedule">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/4.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Call with Woods</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Business</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/8.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Call with hilda</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-success rounded-pill">Meditation</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/5.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Conference call</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-warning rounded-pill">Dinner</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/3.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting with Mark</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-secondary rounded-pill">Meetup</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/2.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting in Oakland</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-danger rounded-pill">Dinner</div>
            </div>
          </li>
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/avatars/1.png')}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting with Carl</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Business</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Meeting Schedule -->
  <!-- Developer Meetup -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <img class="card-img-top" src="{{asset('assets/img/elements/laptop.png')}}" alt="laptop image cap" height="188" style="object-fit: cover;">
      <div class="card-body">
        <div class="d-flex border-bottom pb-3">
          <div class="badge bg-label-primary d-flex flex-column justify-content-center px-3 rounded-3 me-3">
            <h6 class="text-primary mb-2 fw-normal">Jan</h6>
            <h5 class="text-primary mb-0">24</h5>
          </div>
          <div class="w-75">
            <h6 class="card-title mb-1">Developer Meetup</h6>
            <small class="mb-0">The WordPress open source,free software project is the community behind the…</small>
          </div>
        </div>
        <div class="d-flex justify-content-between border-bottom mt-3">
          <div class="text-center">
            <span class="mdi mdi-star-outline mdi-24px"></span>
            <p>Interested</p>
          </div>
          <div class="text-center">
            <span class="mdi mdi-check-circle-outline mdi-24px"></span>
            <p>Joined</p>
          </div>
          <div class="text-center text-primary">
            <span class="mdi mdi-account-outline mdi-24px"></span>
            <p>Invited</p>
          </div>
          <div class="text-center">
            <span class="mdi mdi-dots-horizontal mdi-24px"></span>
            <p>More</p>
          </div>
        </div>
        <div>
          <div class="d-flex mt-3 gap-2">
            <span class="mdi mdi-clock-outline mdi-24px me-2"></span>
            <div>
              <p class="small mb-0">Tuesday, 24 january, 10:20 - 12:30</p>
              <p class="small mb-0">After 1 week</p>
            </div>
          </div>
          <div class="d-flex mt-3 gap-2">
            <span class="mdi mdi-map-marker-outline mdi-24px me-2"></span>
            <div>
              <p class="small mb-0">The Rochard NYC</p>
              <p class="small mb-0">1305 Lexington Ave, New York</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Developer Meetup -->
</div>

<!-- Modal -->
@include('_partials/_modals/modal-add-new-cc')
@include('_partials/_modals/modal-upgrade-plan')
<!--/ Modal -->

@endsection
