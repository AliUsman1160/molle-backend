@extends('layouts/layoutMaster')

@section('title', 'Event Management - Crud App')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/event.js')}}"></script>
@endsection

@section('content')
<!-- Events List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Search Filter</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-events table">
      <thead class="table-light">
        <tr>
          <th></th>
          <th>#</th>
          <th>Name</th>
          <th>Event Type</th>
          <th>Created By</th>
          <th>Image</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Location</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Description</th>
          <th>Paid</th>
          <th>Amount</th>
          <th>Seat Limit</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new event -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddEvent" aria-labelledby="offcanvasAddEventLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddEventLabel" class="offcanvas-title">Add New Event</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-event pt-0" id="addNewEventForm">
        <input type="hidden" name="id" id="event_id">
        <div class="mb-3">
          <label class="form-label" for="event_name">Event Name</label>
          <input type="text" class="form-control" id="event_name" placeholder="Event Name" name="name" aria-label="Event Name" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="event_type_id">Event Type</label>
          <select class="form-control" id="event_type_id" name="event_type_id">
            <!-- Options will be populated dynamically -->
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="created_by_user_id">Created By</label>
          <select class="form-control" id="created_by_user_id" name="created_by_user_id">
            <!-- Options will be populated dynamically -->
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="image">Image</label>
          <input type="text" class="form-control" id="image" placeholder="Image URL" name="image" aria-label="Image URL" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="start_time">Start Time</label>
          <input type="time" class="form-control" id="start_time" name="start_time" aria-label="Start Time" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="end_time">End Time</label>
          <input type="time" class="form-control" id="end_time" name="end_time" aria-label="End Time" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="location">Location</label>
          <input type="text" class="form-control" id="location" placeholder="Location" name="location" aria-label="Location" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="start_date">Start Date</label>
          <input type="date" class="form-control" id="start_date" name="start_date" aria-label="Start Date" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="end_date">End Date</label>
          <input type="date" class="form-control" id="end_date" name="end_date" aria-label="End Date" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="description">Description</label>
          <textarea class="form-control" id="description" placeholder="Description" name="description" aria-label="Description"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="paid">Paid</label>
          <select class="form-control" id="paid" name="paid">
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="amount">Amount</label>
          <input type="number" step="0.01" class="form-control" id="amount" placeholder="Amount" name="amount" aria-label="Amount" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="seat_limit">Seat Limit</label>
          <input type="number" class="form-control" id="seat_limit" placeholder="Seat Limit" name="seat_limit" aria-label="Seat Limit" />
        </div>
    
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </form>
    </div>
  </div>
</div>
@endsection
