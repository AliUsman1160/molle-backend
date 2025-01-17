@extends('layouts/layoutMaster')

@section('title', 'Cards Statistics- UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-statistics.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/cards-statistics.js')}}"></script>
@endsection

@section('content')

<h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Statistics</h4>
<div class="row gy-4">
  <!-- Cards with few info -->
  <div class="col-lg-3 col-sm-6">
    <div class="card transparent-card bg-transparent shadow-none border-1">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-1">
            <div class="avatar-initial rounded shadow-sm">
              <i class="mdi mdi-account-outline text-primary mdi-24px"></i>
            </div>
          </div>
          <div class="card-info">
            <small>New Customers</small>
            <div class="d-flex align-items-center">
              <h5 class="mb-0">2,856</h5>
              <i class="mdi mdi-chevron-down text-danger mdi-24px"></i>
              <small class="text-danger">10.2%</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card transparent-card bg-transparent shadow-none border-1">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-1">
            <div class="avatar-initial rounded shadow-sm">
              <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
            </div>
          </div>
          <div class="card-info">
            <small>Total Revenue</small>
            <div class="d-flex align-items-center">
              <h5 class="mb-0">28.6K</h5>
              <i class="mdi mdi-chevron-up text-success mdi-24px"></i>
              <small class="text-success">25.8%</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card transparent-card bg-transparent shadow-none border-1">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-1">
            <div class="avatar-initial rounded shadow-sm">
              <i class="mdi mdi-trending-up text-info mdi-24px"></i>
            </div>
          </div>
          <div class="card-info">
            <small>New Transactions</small>
            <div class="d-flex align-items-center">
              <h5 class="mb-0">16.6k</h5>
              <i class="mdi mdi-chevron-down text-danger mdi-24px"></i>
              <small class="text-danger">12.1%</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="card transparent-card bg-transparent shadow-none border-1">
      <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2">
          <div class="avatar me-1">
            <div class="avatar-initial rounded shadow-sm">
              <i class="mdi mdi-poll text-warning mdi-24px"></i>
            </div>
          </div>
          <div class="card-info">
            <small>Total Profit</small>
            <div class="d-flex align-items-center">
              <h5 class="mb-0">2,856</h5>
              <i class="mdi mdi-chevron-up text-success mdi-24px"></i>
              <small class="text-success">54.6%</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Cards with few info -->

  <!-- Cards with separator -->
  <div class="col-12">
    <div class="card">
      <div class="card-widget-separator-wrapper">
        <div class="card-body card-widget-separator">
          <div class="row gy-4 gy-sm-1">
            <div class="col-sm-6 col-lg-3">
              <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                <div>
                  <h3 class="mb-1">24</h3>
                  <p class="mb-0">Clients</p>
                </div>
                <div class="avatar me-sm-4">
                  <span class="avatar-initial rounded bg-label-secondary">
                    <i class="mdi mdi-account-outline text-heading mdi-20px"></i>
                  </span>
                </div>
              </div>
              <hr class="d-none d-sm-block d-lg-none me-4">
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                <div>
                  <h3 class="mb-1">165</h3>
                  <p class="mb-0">Invoices</p>
                </div>
                <div class="avatar  me-lg-4">
                  <span class="avatar-initial rounded bg-label-secondary">
                    <i class="mdi mdi-content-paste text-heading mdi-20px"></i>
                  </span>
                </div>
              </div>
              <hr class="d-none d-sm-block d-lg-none">
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                <div>
                  <h3 class="mb-1">$2.46k</h3>
                  <p class="mb-0">Paid</p>
                </div>
                <div class="avatar me-sm-4">
                  <span class="avatar-initial rounded bg-label-secondary">
                    <i class="mdi mdi-currency-usd text-heading mdi-20px"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h3 class="mb-1">$876</h3>
                  <p class="mb-0">Unpaid</p>
                </div>
                <div class="avatar">
                  <span class="avatar-initial rounded bg-label-secondary">
                    <i class="mdi mdi-currency-usd-off text-heading mdi-20px"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Cards with separator -->

  <!-- Card Border Shadow -->
  <div class="col-sm-6 col-lg-3">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary"><i class="mdi mdi-bus-school mdi-20px"></i></span>
          </div>
          <h4 class="ms-1 mb-0 display-6">42</h4>
        </div>
        <p class="mb-0 text-heading">On route vehicles</p>
        <p class="mb-0">
          <span class="me-1">+18.2%</span>
          <small class="text-muted">than last week</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card card-border-shadow-warning h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning">
              <i class='mdi mdi-alert mdi-20px'></i></span>
          </div>
          <h4 class="ms-1 mb-0 display-6">8</h4>
        </div>
        <p class="mb-0 text-heading">Vehicles with errors</p>
        <p class="mb-0">
          <span class="me-1">-8.7%</span>
          <small class="text-muted">than last week</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card card-border-shadow-danger h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-danger">
              <i class='mdi mdi-source-fork mdi-20px'></i>
            </span>
          </div>
          <h4 class="ms-1 mb-0 display-6">27</h4>
        </div>
        <p class="mb-0 text-heading">Deviated from route</p>
        <p class="mb-0">
          <span class="me-1">+4.3%</span>
          <small class="text-muted">than last week</small>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card card-border-shadow-info h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-info"><i class='mdi mdi-timer-outline mdi-20px'></i></span>
          </div>
          <h4 class="ms-1 mb-0 display-6">13</h4>
        </div>
        <p class="mb-0 text-heading">Late vehicles</p>
        <p class="mb-0">
          <span class="me-1">-2.5%</span>
          <small class="text-muted">than last week</small>
        </p>
      </div>
    </div>
  </div>
  <!--/ Card Border Shadow -->

  <!-- Transactions -->
  <div class="col-xl-8">
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
        <div class="row g-3">
          <div class="col-md-3 col-6">
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
          <div class="col-md-3 col-6">
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
          <div class="col-md-3 col-6">
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
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-info rounded shadow">
                  <i class="mdi mdi-currency-usd mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Revenue</div>
                <h5 class="mb-0">$88k</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->

  <!-- Total Sales -->
  <div class="col-xl-4 col-lg-6">
    <div class="card h-100">
      <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
        <div class="me-3">
          <h5 class="mb-4">Total Sales</h5>
          <div class="small mb-1">Calculated in last 7 days</div>
          <div class="d-flex align-items-end">
            <h4 class="mb-0 me-2">$25,980</h4>
            <small class="text-success">+15.6%</small>
          </div>
        </div>
        <div id="totalSalesDonutChart" class="mt-3 mt-md-0"></div>
      </div>
    </div>
  </div>
  <!--/ Total Sales -->

  <!-- Cards with icon profit and loss info -->
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
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
      <div class="card-body pt-0">
        <h6 class="mb-2">New Project</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">862</h4>
          <small class="text-danger lh-sm">-18%</small>
        </div>
        <small>Yearly Project</small>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="avatar">
          <div class="avatar-initial bg-secondary rounded-circle shadow">
            <i class="mdi mdi-poll mdi-24px"></i>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="totalProfitID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfitID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <h6 class="mb-2">Total Profit</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">$25.6k</h4>
          <small class="text-success lh-sm">+42%</small>
        </div>
        <small>Weekly Project</small>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="avatar">
          <div class="avatar-initial bg-success rounded-circle shadow">
            <i class="mdi mdi-currency-usd mdi-24px"></i>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="revenueID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="revenueID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <h6 class="mb-2">Revenue</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">$95.2k</h4>
          <small class="text-success lh-sm">+12%</small>
        </div>
        <small>Revenue Increase</small>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="avatar">
          <div class="avatar-initial bg-danger rounded-circle shadow">
            <i class="mdi mdi-star-outline mdi-24px"></i>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="logisticsID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="logisticsID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <h6 class="mb-2">Logistics</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">44.10k</h4>
          <small class="text-success lh-sm">+42%</small>
        </div>
        <small>Regional Logistics</small>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="avatar">
          <div class="avatar-initial bg-warning rounded-circle shadow">
            <i class="mdi mdi-check mdi-24px"></i>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="reportsID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="reportsID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <h6 class="mb-2">Reports</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">268</h4>
          <small class="text-danger lh-sm">-28%</small>
        </div>
        <small>System Bugs</small>
      </div>
    </div>
  </div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="avatar">
          <div class="avatar-initial bg-info rounded-circle shadow">
            <i class="mdi mdi-trending-up mdi-24px"></i>
          </div>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="transactionsID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionsID">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
            <a class="dropdown-item" href="javascript:void(0);">Update</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <h6 class="mb-2">Transactions</h6>
        <div class="d-flex flex-wrap mb-2 pb-1 align-items-center">
          <h4 class="mb-0 me-2">1.2k</h4>
          <small class="text-success lh-sm">+38%</small>
        </div>
        <small>Daily Transactions</small>
      </div>
    </div>
  </div>
  <!--/ Cards with icon profit and loss info -->

  <!-- Ratings -->
  <div class="col-xl-3 col-lg-6 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Ratings</h6>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-2">13k</h4>
                <small class="text-success lh-sm">+15.6%</small>
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
  <div class="col-xl-3 col-lg-6 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Sessions</h6>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-2">24.5k</h4>
                <small class="text-danger lh-sm">-20%</small>
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

  <!-- Customers -->
  <div class="col-xl-3 col-lg-6 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Customers</h6>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-2">2,856</h4>
                <small class="text-success lh-sm">+59%</small>
              </div>
              <div class="badge bg-label-info rounded-pill">Daily Customers</div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="h-100 position-relative">
            <img src="{{asset('assets/img/illustrations/illustration-3.png')}}" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="84">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Customers -->

  <!-- Total Orders -->
  <div class="col-xl-3 col-lg-6 col-sm-6 mt-5">
    <div class="card">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Total Orders</h6>
              <div class="d-flex align-items-center mb-3">
                <h4 class="mb-0 me-2">42.5k</h4>
                <small class="text-success lh-sm">+26%</small>
              </div>
              <div class="badge bg-label-warning rounded-pill">Last Month</div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="h-100 position-relative">
            <img src="{{asset('assets/img/illustrations/illustration-4.png')}}" alt="Ratings" class="position-absolute card-img-position scaleX-n1-rtl bottom-0 w-auto end-0 me-3 me-xl-0 me-xxl-3 pe-1" width="78">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Orders -->

  <!-- Total Revenue chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="mb-0">$35.4k</h4>
      </div>
      <div class="card-body">
        <div id="totalRevenueChart" class="mb-3"></div>
        <h6 class="text-center mb-0">Total Revenue</h6>
      </div>
    </div>
  </div>
  <!--/ Total Revenue chart -->

  <!-- Sessions group chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="mb-0">4,350</h4>
      </div>
      <div class="card-body">
        <div id="SessionsGroupChart" class="mb-3"></div>
        <h6 class="text-center mb-0">Sessions</h6>
      </div>
    </div>
  </div>
  <!--/ Sessions group chart -->

  <!-- Total Growth chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
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

  <!-- Total Sales chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="mb-0">135k</h4>
      </div>
      <div class="card-body">
        <div id="totalSalesSemiDonutChart" class="mb-4"></div>
        <h6 class="text-center mb-0">Total Sales</h6>
      </div>
    </div>
  </div>
  <!--/ Total Sales chart -->

  <!-- Sessions chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="mb-0">2,856</h4>
      </div>
      <div class="card-body">
        <div id="sessionsColumnChart" class="mb-3"></div>
        <h6 class="text-center mb-0">Sessions</h6>
      </div>
    </div>
  </div>
  <!--/ Sessions chart -->

  <!-- Total Profit line chart -->
  <div class="col-xl-2 col-md-4 col-sm-6">
    <div class="card">
      <div class="card-header pb-0">
        <h4 class="mb-0">$86.4k</h4>
      </div>
      <div class="card-body">
        <div id="totalProfitLineChart" class="mb-3"></div>
        <h6 class="text-center mb-0">Total Profit</h6>
      </div>
    </div>
  </div>
  <!--/ Total Profit line chart -->
</div>
@endsection
