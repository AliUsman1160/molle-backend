@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pricing - Front Pages')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-pricing.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/front-page-pricing.js')}}"></script>
@endsection


@section('content')
<!-- Pricing Plans -->
<section class="section-py first-section-pt">
  <div class="container">
    <h2 class="text-center mb-2">Pricing Plans</h2>
    <p class="text-center text-muted px-sm-5"> <span>All plans include 40+ advanced tools and features to boost your product.</span><br>Choose the best plan to fit your needs.</p>
    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 py-5 mb-0 mb-md-4">
      <label class="switch switch-primary ms-sm-5 ps-sm-5 me-0">
        <span class="switch-label">Monthly</span>
        <input type="checkbox" class="switch-input price-duration-toggler" />
        <span class="switch-toggle-slider">
          <span class="switch-on"></span>
          <span class="switch-off"></span>
        </span>
        <span class="switch-label">Annually</span>
      </label>
      <div class="mt-n5 ms-n5 ml-2 mb-2 d-none d-sm-flex align-items-center gap-2">
        <i class="mdi mdi-arrow-down-left mdi-24px text-muted scaleX-n1-rtl"></i>
        <span class="badge badge-sm bg-label-primary rounded-pill mb-2 ">Get 2 months free</span>
      </div>
    </div>

    <div class="pricing-plans row mx-0 gap-4">
      <!-- Basic -->
      <div class="col-lg mb-md-0 mb-4 px-0">
        <div class="card border rounded shadow-none">
          <div class="card-body">
            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/pricing-basic.png')}}" alt="Basic Image" height="100">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Basic</h3>
            <p class="text-center pb-2">A simple start for everyone</p>
            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-body fw-normal">$</sup>
                <h1 class="display-3 mb-0 text-primary">0</h1>
                <sub class="h6 pricing-duration mt-auto mb-2 text-body fw-normal">/month</sub>
              </div>
            </div>

            <ul class="list-group ms-4 my-4 pt-2">
              <li class="mb-1">100 responses a month</li>
              <li class="mb-1">Unlimited forms and surveys</li>
              <li class="mb-1">Unlimited fields</li>
              <li class="mb-1">Basic form creation tools</li>
              <li class="mb-0">Up to 2 subdomains</li>
            </ul>
            <a href="{{ url('front-pages/payment') }}" class="btn btn-outline-success d-grid w-100">Your Current Plan</a>
          </div>
        </div>
      </div>

      <!-- Standard -->
      <div class="col-lg mb-md-0 mb-4 px-0">
        <div class="card border-primary border shadow-none">
          <div class="card-body position-relative">
            <div class="position-absolute end-0 me-4 top-0 mt-4">
              <span class="badge bg-label-primary rounded-pill">Popular</span>
            </div>
            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/pricing-standard.png')}}" alt="Standard Image" height="100">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Standard</h3>
            <p class="text-center">For small to medium businesses</p>
            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-body fw-normal">$</sup>
                <h1 class="price-toggle price-yearly display-3 text-primary mb-0">7</h1>
                <h1 class="price-toggle price-monthly display-3 text-primary mb-0 d-none">9</h1>
                <sub class="h6 text-body pricing-duration mt-auto mb-2 fw-normal">/month</sub>
              </div>
              <small class="price-yearly price-yearly-toggle text-body">$ 90 / year</small>
            </div>

            <ul class="list-group ms-4 my-4 pt-3">
              <li class="mb-1">Unlimited responses</li>
              <li class="mb-1">Unlimited forms and surveys</li>
              <li class="mb-1">Instagram profile page</li>
              <li class="mb-1">Google Docs integration</li>
              <li class="mb-0">Custom “Thank you” page</li>
            </ul>
            <a href="{{ url('front-pages/payment') }}" class="btn btn-primary d-grid w-100">Upgrade</a>
          </div>
        </div>
      </div>

      <!-- Enterprise -->
      <div class="col-lg px-0">
        <div class="card border rounded shadow-none">
          <div class="card-body">

            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/pricing-enterprise.png')}}" alt="Enterprise Image" height="100">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Enterprise</h3>
            <p class="text-center">Solution for big organizations</p>

            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-body fw-normal">$</sup>
                <h1 class="price-toggle price-yearly display-3 text-primary mb-0">16</h1>
                <h1 class="price-toggle price-monthly display-3 text-primary mb-0 d-none">19</h1>
                <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-body">/month</sub>
              </div>
              <small class="price-yearly price-yearly-toggle text-body">$ 190 / year</small>
            </div>

            <ul class="list-group ms-4 my-4 pt-3">
              <li class="mb-1">PayPal payments</li>
              <li class="mb-1">Logic Jumps</li>
              <li class="mb-1">File upload with 5GB storage</li>
              <li class="mb-1">Custom domain support</li>
              <li class="mb-0">Stripe integration</li>
            </ul>
            <a href="{{ url('front-pages/payment') }}" class="btn btn-outline-primary d-grid w-100">Upgrade</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Pricing Plans -->
<!-- Pricing Free Trial -->
<section class="pricing-free-trial bg-label-primary">
  <div class="container">
    <div class="position-relative">
      <div class="d-flex justify-content-between flex-column-reverse flex-lg-row align-items-center py-5">
        <div class="text-center text-lg-start">
          <h3 class="text-primary mb-1">Still not convinced? Start with a 14-day FREE trial!</h3>
          <p class="text-body mb-1">You will get full access to with all the features for 14 days.</p>
          <a href="{{ url('front-pages/payment') }}" class="btn btn-primary mt-4">Start 14-day free trial</a>
        </div>
        <!-- image -->
        <div class="text-center">
          <img src="{{asset('assets/img/illustrations/sitting-girl-with-laptop.png')}}" class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0" alt="Api Key Image" width="265">
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Pricing Free Trial -->
<!-- Plans Comparison -->
<section class="section-py pricing-plans-comparison">
  <div class="container">
    <div class="col-12 text-center mb-5">
      <h2 class="mb-2">Pick a plan that works best for you</h2>
      <p>Stay cool, we have a 48-hour money back guarantee!</p>
    </div>
    <div class="table-responsive border rounded">
      <table class="table table-striped text-center mb-0">
        <thead>
          <tr>
            <th scope="col">
              <p class="mb-1">Features</p>
              <p class="text-muted fw-normal text-capitalize mb-0">Native front features</p>
            </th>
            <th scope="col">
              <p class="mb-1">Starter</p>
              <p class="text-muted fw-normal mb-0">Free</p>
            </th>
            <th scope="col">
              <div class="d-flex d-flex justify-content-center align-items-center">
                <p class="mb-0 me-1">Pro</p>
                <i class="mdi mdi-star-circle text-primary"></i>
              </div>
              <p class="text-muted fw-normal text-capitalize mb-0">$7.5/month</p>
            </th>
            <th scope="col">
              <p class="mb-1">Enterprise</p>
              <small class="text-muted fw-normal text-capitalize">$16/month</small>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>14-days free trial</td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>No user limit</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Product Support</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Email Support</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <span class="badge bg-label-primary badge-sm rounded-pill text-uppercase">Add-on Available</span>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Integrations</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Removal of Front branding</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <span class="badge bg-label-primary badge-sm rounded-pill text-uppercase">Add-on Available</span>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Active maintenance & support</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td>Data storage for 365 days</td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-close-circle text-light"></i>
            </td>
            <td>
              <i class="mdi mdi-check-circle text-primary"></i>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-outline-primary">Choose Plan</a>
            </td>
            <td>
              <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-primary">Choose Plan</a>
            </td>
            <td>
              <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-outline-primary">Choose Plan</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!--/ Plans Comparison -->
<!-- FAQS -->
<section class="section-py pricing-faqs rounded-bottom bg-body">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-2">FAQ's</h2>
      <p>Let us help answer the most common questions.</p>
    </div>
    <div id="faq" class="accordion">
      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#faq-1" aria-controls="faq-1">
            What counts towards the 100 responses limit?
          </button>
        </h6>

        <div id="faq-1" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            We count all responses submitted through all your forms in a month.
            If you already received 100 responses this month, you won’t be able to receive any more of them until next
            month when the counter resets.
          </div>
        </div>
      </div>

      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
            How do you process payments?
          </button>
        </h6>
        <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            We accept Visa®, MasterCard®, American Express®, and PayPal®.
            So you can be confident that your credit card information will be kept
            safe and secure.
          </div>
        </div>
      </div>

      <div class="card accordion-item active">
        <h6 class="accordion-header">
          <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
            What payment methods do you accept?
          </button>
        </h6>
        <div id="faq-3" class="accordion-collapse collapse show" data-bs-parent="#faq">
          <div class="accordion-body">
            2Checkout accepts all types of credit and debit cards.
          </div>
        </div>
      </div>

      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-4" aria-expanded="false" aria-controls="faq-4">
            Do you have a money-back guarantee?
          </button>
        </h6>
        <div id="faq-4" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            Yes. You may request a refund within 30 days of your purchase without any additional explanations.
          </div>
        </div>
      </div>

      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-5" aria-expanded="false" aria-controls="faq-5">
            I have more questions. Where can I get help?
          </button>
        </h6>
        <div id="faq-5" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            Please <a href="javascript:void(0);">contact</a> us if you have any other questions or concerns. We’re
            here to help!
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ FAQS -->

@endsection
