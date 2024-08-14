@extends('layouts/layoutMaster')

@section('title', 'User Documents')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">User Documents</span>
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4 mt-4">
      <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-lg-0 mx-auto">
          <img src="{{asset('/assets/source/' . $user->image)}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="border-radius: 50%;">
        </div>
        <div class="flex-grow-1 mt-3 mt-lg-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4>{{ $user->fullname }}</h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item">
                  <i class='mdi mdi-email-outline me-1 mdi-20px'></i><span class="fw-medium">{{ $user->email }}</span>
                </li>
                <li class="list-inline-item">
                  <i class='mdi mdi-phone me-1 mdi-20px'></i> <span class="fw-medium">{{ $user->phone_number }}</span>
                </li>
                <li class="list-inline-item">
                  <i class='mdi mdi-calendar-blank-outline me-1 mdi-20px'></i> 
                  <span class="fw-medium">Joined {{ $user->created_at ? $user->created_at->format('F Y') : 'N/A' }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTable with Documents -->
<div class="card">
  <div class="card-datatable table-responsive pt-0">
    <table class="datatables-basic table table-bordered">
      <thead>
        <tr>
          <th>Document Front</th>
          <th>Document Back</th>
          <th>Status</th>
          <th>Date and Time</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($documents as $document)
        <tr id="document-{{ $document->id }}">
          <td><img src="{{ asset('/assets/source/' .$document->document_front) }}" alt="Document Front" width="100"></td>
          <td><img src="{{ asset('/assets/source/' .$document->document_back) }}" alt="Document Back" width="100"></td>
          <td class="status-column">{{ $document->is_reject ? 'Rejected' : 'Approved' }}</td>
          <td>{{ $document->created_at->format('Y-m-d H:i:s') }}</td>
          <td>
            <button class="btn btn-success btn-sm" onclick="updateStatus({{ $document->id }}, 0)">Approve</button>
            <button class="btn btn-danger btn-sm" onclick="updateStatus({{ $document->id }}, 1)">Reject</button>
        </td>
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function updateStatus(documentId, isReject) {
      // Confirmation SweetAlert before proceeding
      Swal.fire({
          title: 'Are you sure?',
          text: isReject ? "You are about to reject this document." : "You are about to approve this document.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, proceed!'
      }).then((result) => {
          if (result.isConfirmed) {
              // Make the AJAX request to update the document status
              $.ajax({
                  url: '/document/update-status/' + documentId,
                  method: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      is_reject: isReject
                  },
                  success: function(response) {
                      // Find the table row and update the status text
                      var row = $('#document-' + documentId);
                      var statusText = isReject ? 'Rejected' : 'Approved';
                      row.find('.status-column').text(statusText);
                      
                      // Show success SweetAlert
                      Swal.fire(
                          'Updated!',
                          response.message,
                          'success'
                      );
                  },
                  error: function() {
                      // Show error SweetAlert
                      Swal.fire(
                          'Error!',
                          'An error occurred while updating the document.',
                          'error'
                      );
                  }
              });
          }
      });
  }
</script>
