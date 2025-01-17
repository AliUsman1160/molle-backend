@extends('layouts/layoutMaster')

@section('title', 'Cards Analytics- UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/cards-analytics.js')}}"></script>
@endsection

@section('content')

<h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Analytics
</h4>

<div class="row gy-4">
  <!-- Total Profit Chart & Last month balance -->
  <div class="col-xl-8">
    <div class="card h-100">
      <div class="row">
        <div class="col-md-7 pe-md-0">
          <div class="card-header">
            <h5 class="mb-0">Total Profit</h5>
          </div>
          <div class="card-body">
            <div id="totalProfitChart"></div>
          </div>
        </div>
        <div class="col-md-5 border-start ps-md-0">
          <hr class="d-block d-md-none my-0">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1 display-6">$482.85k</h5>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="totalProfit" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-dots-vertical mdi-24px"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfit">
                  <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                  <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                  <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                </div>
              </div>
            </div>
            <p class="text-body mb-0">Last month balance $234.40k</p>
          </div>
          <div class="card-body pt-3">
            <div class="d-flex align-items-center mb-3">
              <div class="avatar">
                <div class="avatar-initial bg-label-success rounded">
                  <i class="mdi mdi-trending-up mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">$48,568.20</h6>
                <small>Total Profit</small>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-account-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">$38,453.25</h6>
                <small>Total Income</small>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="avatar">
                <div class="avatar-initial bg-label-secondary rounded">
                  <i class="mdi mdi-cellphone-link mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">$2,453.45</h6>
                <small>Total Expense</small>
              </div>
            </div>
            <div>
              <button class="btn btn-primary w-100" type="button">View Report</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Profit Chart & Last month balance -->
  <!-- Total Visitors Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Total Visitors</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="totalVisitorsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalVisitorsDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="totalVisitorsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Total Visitors Chart -->
  <!-- Weekly Sales Chart -->
  <div class="col-xl-4 col-md-6">
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
  <!-- Total Revenue Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Total Revenue</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="totalRevenueDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenueDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="totalRevenueChart"></div>
        <div class="d-flex justify-content-around mt-3">
          <div>
            <div class="d-flex align-items-center">
              <div class="badge badge-dot bg-success me-2 mb-1"></div>
              <h6 class="mb-0">856</h6>
            </div>
            <small>New User</small>
          </div>
          <div class="vr bg-light"></div>
          <div>
            <div class="d-flex align-items-center">
              <div class="badge badge-dot bg-primary me-2 mb-1"></div>
              <h6 class="mb-0">345</h6>
            </div>
            <small>Returning</small>
          </div>
          <div class="vr bg-light"></div>
          <div>
            <div class="d-flex align-items-center">
              <div class="badge badge-dot bg-warning me-2 mb-1"></div>
              <h6 class="mb-0">258</h6>
            </div>
            <small>Referrals</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue Chart -->
  <!-- Weekly Overview Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Weekly Overview</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="weeklyOverviewChart"></div>
        <div class="mt-1">
          <div class="d-flex align-items-center gap-3">
            <h3 class="mb-0">45%</h3>
            <p class="mb-0">Your sales performance is 45% 😎 better compared to last month</p>
          </div>
          <div class="d-grid mt-3">
            <button class="btn btn-primary" type="button">Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Weekly Overview Chart -->
  <!-- Performance Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Performance</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="performanceDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performanceDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="performanceChart"></div>
      </div>
    </div>
  </div>
  <!--/ Performance Chart -->
  <!-- Analytics Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Analytics</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="AnalyticsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="AnalyticsDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <div id="AnalyticsChart"></div>
        <div class="d-flex align-items-center mt-3">
          <h6 class="mb-0">Revenue</h6>
          <div class="flex-grow-1"></div>
          <p class="me-4 mb-0">$845k</p>
          <h6 class="me-4 mb-0">82%</h6>
          <i class="mdi mdi-chevron-up text-success"></i>
        </div>
        <div class="d-flex align-items-center mt-3">
          <h6 class="mb-0">Transactions</h6>
          <div class="flex-grow-1"></div>
          <p class="me-4 mb-0">$12.5k</p>
          <h6 class="me-4 mb-0">52%</h6>
          <i class="mdi mdi-chevron-down text-danger"></i>
        </div>
        <div class="d-flex align-items-center mt-3">
          <h6 class="mb-0">Total Profit</h6>
          <div class="flex-grow-1"></div>
          <p class="me-4 mb-0">$27.6k</p>
          <h6 class="me-4 mb-0">42%</h6>
          <i class="mdi mdi-chevron-up text-success"></i>
        </div>
      </div>
    </div>
  </div>
  <!--/ Analytics Chart -->
  <!-- Sales State Chart-->
  <div class="col-xl-4 col-lg-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Sales State</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="salesStateDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesStateDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <p class="text-body mb-0">Total $42,580 Sales</p>
      </div>
      <div id="salesStateChart"></div>
    </div>
  </div>
  <!--/ Sales State Chart-->
  <!-- Total Profit Chart-->
  <div class="col-xl-3 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Total Profit</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="totalProfitDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfitDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Edit</a>
              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body d-flex flex-column justify-content-between">
        <div id="totalProfitRadialBarChart"></div>
        <div class="text-center">
          <p class="small mb-2">18k new sales</p>
          <div class="badge bg-label-primary rounded-pill">This Year</div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Profit Chart-->
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
  <!-- Total Visits Chart-->
  <div class="col-xl-3 col-md-6">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Total Visits</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="totalVisitsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalVisitsDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="totalVisitsChart"></div>
        <div class="text-center">
          <p class="small mb-2">42.2k new visits</p>
          <div class="badge bg-label-info rounded-pill">This Year</div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Visits Chart-->
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
  <!-- Activity Timeline -->
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-0">Activity Timeline</h5>
        </div>
      </div>
      <div class="card-body pt-4 pb-1">
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
                <div class="avatar avatar-sm me-3">
                  <img src="{{ asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                </div>
                <h6 class="mb-0 text-body">John Doe (Client)</h6>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent border-transparent">
            <span class="timeline-point timeline-point-info"></span>
            <div class="timeline-event pb-1">
              <div class="timeline-header mb-2 pb-1">
                <h6 class="mb-0">Order #37745 from September</h6>
                <small class="text-muted">January, 10</small>
              </div>
              <p class="mb-0">Invoices have been paid to the company.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Activity Timeline -->
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
      <div class="card-body pt-lg-5">
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
                  <p class="mb-0">Apparel</p>
                </div>
                <p class="fw-medium mb-0">$12,150</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="mb-0">Electronic</p>
                </div>
                <p class="fw-medium mb-0">$24,900</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="mb-0">FMCG</p>
                </div>
                <p class="fw-medium mb-0">$12,750</p>
              </div>
              <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                  <div class="badge badge-dot bg-primary me-2"></div>
                  <p class="mb-0">Other Sales</p>
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

  <!-- Topic and Instructors -->
  <div class="col-12 col-lg-6 col-xl-7">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Topic you are interested in</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="topic" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topic">
            <a class="dropdown-item" href="javascript:void(0);">Highest Views</a>
            <a class="dropdown-item" href="javascript:void(0);">See All</a>
          </div>
        </div>
      </div>
      <div class="card-body row g-3">
        <div class="col-md-6">
          <div id="horizontalBarChart"></div>
        </div>
        <div class="col-md-6 d-flex justify-content-around align-items-center">
          <div>
            <div class="d-flex align-items-baseline">
              <span class="text-primary me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">UI Design</p>
                <h5>35%</h5>
              </div>
            </div>
            <div class="d-flex align-items-baseline my-3">
              <span class="text-success me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">Music</p>
                <h5>14%</h5>
              </div>
            </div>
            <div class="d-flex align-items-baseline">
              <span class="text-danger me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">React</p>
                <h5>10%</h5>
              </div>
            </div>
          </div>

          <div>
            <div class="d-flex align-items-baseline">
              <span class="text-info me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">UX Design</p>
                <h5>20%</h5>
              </div>
            </div>
            <div class="d-flex align-items-baseline my-3">
              <span class="text-secondary me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">Animation</p>
                <h5>12%</h5>
              </div>
            </div>
            <div class="d-flex align-items-baseline">
              <span class="text-warning me-2"><i class='mdi mdi-circle'></i></span>
              <div>
                <p class="mb-2">SEO</p>
                <h5>9%</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  Topic and Instructors  End-->
  <!-- Shipment statistics-->
  <div class="col-lg-6 col-xl-5">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Shipment statistics</h5>
          <small class="text-muted">Total number of deliveries 23.8k</small>
        </div>
        <div class="dropdown">
          <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div id="shipmentStatisticsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Shipment statistics -->

  <!-- Reasons for delivery exceptions -->
  <div class="col-md-6 order-md-3 col-xxl-5">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Reasons for delivery exceptions</h5>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="deliveryExceptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryExceptions">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="deliveryExceptionsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Reasons for delivery exceptions -->

</div>

@endsection
