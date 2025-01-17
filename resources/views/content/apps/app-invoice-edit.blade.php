@extends('layouts/layoutMaster')

@section('title', 'Edit - Invoice')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/offcanvas-add-payment.js')}}"></script>
<script src="{{asset('assets/js/offcanvas-send-invoice.js')}}"></script>
<script src="{{asset('assets/js/app-invoice-edit.js')}}"></script>
@endsection

@section('content')
<div class="row invoice-edit">
  <!-- Invoice Edit-->
  <div class="col-lg-9 col-12 mb-lg-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="row mx-0">
          <div class="col-md-7 mb-md-0 mb-4 ps-0">
            <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
              <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>''])</span>
              <span class="h4 mb-0 app-brand-text fw-semibold">{{ config('variables.templateName') }}</span>
            </div>
            <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
            <p class="mb-1">San Diego County, CA 91905, USA</p>
            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
          </div>
          <div class="col-md-5 pe-0 ps-0 ps-md-2">
            <dl class="row mb-2 g-2">
              <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                <span class="h4 text-capitalize mb-0 text-nowrap">Invoice</span>
              </dt>
              <dd class="col-sm-6">
                <div class="input-group input-group-merge disabled">
                  <span class="input-group-text">#</span>
                  <input type="text" class="form-control" disabled placeholder="74909" value="74909" id="invoiceId" />
                </div>
              </dd>
              <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                <span class="fw-normal">Date Issued:</span>
              </dt>
              <dd class="col-sm-6">
                <input type="text" class="form-control invoice-date" placeholder="YYYY-MM-DD" />
              </dd>
              <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                <span class="fw-normal">Due Date:</span>
              </dt>
              <dd class="col-sm-6">
                <input type="text" class="form-control due-date" placeholder="YYYY-MM-DD" />
              </dd>
            </dl>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="my-3 me-3">
            <h6>Invoice To:</h6>
            <p class="mb-1">Thomas shelby</p>
            <p class="mb-1">Shelby Company Limited</p>
            <p class="mb-1">Small Heath, B10 0HF, UK</p>
            <p class="mb-1">718-986-6062</p>
            <p class="mb-0">peakyFBlinders@gmail.com</p>
          </div>
          <div class="my-3">
            <h6>Bill To:</h6>
            <table>
              <tbody>
                <tr>
                  <td class="pe-3">Total Due:</td>
                  <td>$12,110.55</td>
                </tr>
                <tr>
                  <td class="pe-3">Bank name:</td>
                  <td>American Bank</td>
                </tr>
                <tr>
                  <td class="pe-3">Country:</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td class="pe-3">IBAN:</td>
                  <td>ETD95476213874685</td>
                </tr>
                <tr>
                  <td class="pe-3">SWIFT code:</td>
                  <td>BR91905</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <form class="source-item pt-1">
          <div class="mb-3" data-repeater-list="group-a">
            <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
              <div class="d-flex border rounded position-relative pe-0">
                <div class="row w-100 p-3">
                  <div class="col-md-6 col-12 mb-md-0 mb-3">
                    <h6 class="mb-2 repeater-title">Item</h6>
                    <select class="form-select item-details mb-3">
                      <option value="App Design">App Design</option>
                      <option value="App Customization" selected>App Customization</option>
                      <option value="ABC Template">ABC Template</option>
                      <option value="App Development">App Development</option>
                    </select>
                    <textarea class="form-control" rows="2">The most developer friendly & highly customizable HTML5 Admin</textarea>
                  </div>
                  <div class="col-md-3 col-12 mb-md-0 mb-3">
                    <h6 class="mb-2 repeater-title">Cost</h6>
                    <input type="text" class="form-control invoice-item-price mb-3" value="24" placeholder="24" min="12" />
                    <div class="d-flex flex-column gap-2">
                      <span>Discount:</span>
                      <span>
                        <span class="discount me-2">0%</span>
                        <span class="tax-1 me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 1">0%</span>
                        <span class="tax-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 2">0%</span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-2 col-12 mb-md-0 mb-3">
                    <h6 class="mb-2 repeater-title">Qty</h6>
                    <input type="text" class="form-control invoice-item-qty" value="1" placeholder="1" min="1" max="50" />
                  </div>
                  <div class="col-md-1 col-12 pe-0">
                    <h6 class="mb-2 repeater-title">Price</h6>
                    <p class="mb-0">$24.00</p>
                  </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                  <i class="mdi mdi-close cursor-pointer" data-repeater-delete></i>
                  <div class="dropdown">
                    <i class="mdi mdi-cog-outline cursor-pointer more-options-dropdown" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    </i>
                    <div class="dropdown-menu dropdown-menu-end w-px-300 p-3" aria-labelledby="dropdownMenuButton">

                      <div class="row g-3">
                        <div class="col-12">
                          <label for="discountInput" class="form-label">Discount(%)</label>
                          <input type="number" class="form-control" id="discountInput" min="0" max="100" />
                        </div>
                        <div class="col-md-6">
                          <label for="taxInput1" class="form-label">Tax 1</label>
                          <select name="tax-1-input" id="taxInput1" class="form-select tax-select">
                            <option value="0%" selected>0%</option>
                            <option value="1%">1%</option>
                            <option value="10%">10%</option>
                            <option value="18%">18%</option>
                            <option value="40%">40%</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="taxInput2" class="form-label">Tax 2</label>
                          <select name="tax-2-input" id="taxInput2" class="form-select tax-select">
                            <option value="0%" selected>0%</option>
                            <option value="1%">1%</option>
                            <option value="10%">10%</option>
                            <option value="18%">18%</option>
                            <option value="40%">40%</option>
                          </select>
                        </div>
                      </div>
                      <div class="dropdown-divider my-3"></div>
                      <button type="button" class="btn btn-outline-primary btn-apply-changes">Apply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="button" class="btn btn-primary btn-sm" data-repeater-create><i class="mdi mdi-plus me-1"></i> Add Item</button>
            </div>
          </div>
        </form>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-md-0 mb-3">
            <div class="d-flex align-items-center gap-2 mb-3 mt-2">
              <label for="salesperson" class="text-heading">Salesperson: </label>
              <input type="text" class="form-control w-50" id="salesperson" placeholder="Edward Crowley" value="Edward Crowley">
            </div>
            <div class="mb-4">
              <input type="text" class="form-control w-50" id="invoiceMsg" placeholder="Thanks for your business" value="Thanks for your business" />
              <label for="invoiceMsg" class="d-none">Customer Notes</label>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-md-end mt-2">
            <div class="invoice-calculations">
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Subtotal:</span>
                <h6 class="mb-0 pt-1">$5000.25</h6>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Discount:</span>
                <h6 class="mb-0 pt-1">$00.00</h6>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span class="w-px-100">Tax:</span>
                <h6 class="mb-0 pt-1">$100.00</h6>
              </div>
              <hr />
              <div class="d-flex justify-content-between">
                <span class="w-px-100">Total:</span>
                <h6 class="mb-0 pt-1">$5100.25</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="note" class="form-label fw-medium">Note:</label>
              <textarea class="form-control" rows="2" id="note">It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice Edit-->

  <!-- Invoice Actions -->
  <div class="col-lg-3 col-12 invoice-actions">
    <div class="card mb-4">
      <div class="card-body">
        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-send-outline scaleX-n1-rtl me-2"></i>Send Invoice</span>
        </button>
        <div class="d-flex">
          <a href="{{url('app/invoice/preview')}}" class="btn btn-outline-secondary w-50 me-2 mb-3">Preview</a>
          <button type="button" class="btn btn-outline-secondary w-50 mb-3">Save</button>
        </div>
        <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="mdi mdi-currency-usd me-1"></i>Add Payment</span>
        </button>
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- Offcanvas -->
@include('_partials/_offcanvas/offcanvas-send-invoice')
@include('_partials/_offcanvas/offcanvas-add-payment')
<!-- /Offcanvas -->
@endsection
