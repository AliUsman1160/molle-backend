function toggleBlockStatus(element) {
  const userId = $(element).data('id');
  const isChecked = $(element).is(':checked');

  // Convert boolean value to integer for the server
  const blockedValue = isChecked ? 1 : 0;

  $.ajax({
    url: baseUrl + 'user-list/' + userId + '/update-status',
    type: 'POST',
    data: {
      is_blocked: blockedValue, // Send integer value
      _token: $('meta[name="csrf-token"]').attr('content') // Add CSRF token
    },
    success: function (response) {
      // Optionally, update UI to reflect successful update if needed
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: response.message,
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    },
    error: function (xhr) {
      // Revert the checkbox state on error
      $(element).prop('checked', !isChecked);

      Swal.fire({
        title: 'Error!',
        text: 'Failed to update user status.',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-danger'
        }
      });
    }
  });
}



(function webpackUniversalModuleDefinition(root, factory) {
  if (typeof exports === 'object' && typeof module === 'object')
    module.exports = factory();
  else if (typeof define === 'function' && define.amd)
    define([], factory);
  else {
    var a = factory();
    for (var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
  }
})(self, function () {
  return /******/ (function () { // webpackBootstrap
/******/ 	"use strict";
    var __webpack_exports__ = {};
    /*!*************************************************!*\
      !*** ./resources/js/laravel-user-management.js ***!
      \*************************************************/
    /**
     * Page User List
     */



    // Datatable (jquery)
    $(function () {
      // Variable declaration for table
      var dt_user_table = $('.datatables-users'),
        select2 = $('.select2'),
        userView = baseUrl + 'app/user/view/account',
        offCanvasForm = $('#offcanvasAddUser');
      if (select2.length) {
        var $this = select2;
        $this.wrap('<div class="position-relative"></div>').select2({
          placeholder: 'Select Country',
          dropdownParent: $this.parent()
        });
      }

      // ajax setup
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // Users datatable
      if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: baseUrl + 'user-list'
          },
          columns: [
            { data: '' },
            { data: 'id' },
            { data: 'fullname' },
            { data: 'email' },
            { data: 'email_verified_at' },
            { data: 'phone_number' },
            { data: 'gender' },
            { data: 'username' },
            { data: 'phone_verified' },
            { data: 'is_verified' },
            { data: 'image' },
            { data: 'Documents' },
            { data: 'Block' },
            // { data: 'action' }
          ],
          order: [[2, 'desc']],
          columnDefs: [
            {
              className: 'control',
              searchable: false,
              orderable: false,
              responsivePriority: 2,
              targets: 0,
              render: function render(data, type, full, meta) {
                return '';
              }
            },
            {
              searchable: false,
              orderable: false,
              targets: 1,
              render: function render(data, type, full, meta) {
                return "<span>".concat(full.fake_id, "</span>");
              }
            },
            {
              targets: 2,
              responsivePriority: 4,
              render: function render(data, type, full, meta) {
                var $name = full['fullname'] || 'Unknown';
                var stateNum = Math.floor(Math.random() * 6);
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $initials = $name.match(/\b\w/g) || [],
                  $output;
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

                var $row_output = '<div class="d-flex justify-content-start align-items-center user-name">' +
                  '<div class="avatar-wrapper">' +
                  '<div class="avatar avatar-sm me-3">' + $output + '</div>' +
                  '</div>' +
                  '<div class="d-flex flex-column">' +
                  '<a class="text-body text-truncate"><span class="fw-medium">' + $name + '</span></a>' +
                  '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            {
              targets: 3,
              render: function render(data, type, full, meta) {
                return '<span class="user-email">' + full['email'] + '</span>';
              }
            },
            {
              targets: 4,
              className: 'text-center',
              render: function render(data, type, full, meta) {
                var $verified = full['email_verified_at'];
                return $verified ? '<i class="mdi mdi-shield-check-outline fs-4 text-success"></i>' : '<i class="mdi mdi-shield-remove-outline fs-4 text-danger" ></i>';
              }
            },
            {
              targets: 5,
              render: function render(data, type, full, meta) {
                return '<span class="user-phone">' + full['phone_number'] + '</span>';
              }
            },
            {
              targets: 6,
              render: function render(data, type, full, meta) {
                return '<span class="user-gender">' + full['gender'] + '</span>';
              }
            },
            {
              targets: 7,
              render: function render(data, type, full, meta) {
                return '<span class="user-username">' + full['username'] + '</span>';
              }
            },
            {
              targets: 8,
              className: 'text-center',
              render: function render(data, type, full, meta) {
                return full['phone_verified'] ? '<i class="mdi mdi-check-circle-outline fs-4 text-success"></i>' : '<i class="mdi mdi-close-circle-outline fs-4 text-danger"></i>';
              }
            },
            {
              targets: 9,
              className: 'text-center',
              render: function render(data, type, full, meta) {
                return full['is_verified'] ? '<i class="mdi mdi-check-circle-outline fs-4 text-success"></i>' : '<i class="mdi mdi-close-circle-outline fs-4 text-danger"></i>';
              }
            },
            {
              targets: 10,
              render: function render(data, type, full, meta) {
                var imagePath = full['image'] ? baseUrl + 'assets/source/' + full['image'] : baseUrl + 'assets/source/aliusman.JFIF';
                return '<img  src="' + imagePath + '" alt="User Image" class="img-thumbnail" style="width: 50px; height: 50px; border-radius: 50%">';
              }
            },

            {
              targets: -2,
              title: 'Document',
              searchable: false,
              orderable: false,
              render: function render(data, type, full, meta) {
                return '<a href="/document/' + full['id'] + '" id="' + full['id'] + '">Document</a>';
              }
            },

            {
              targets: -1, // Assuming the switch button is in the second last column
              title: 'Block',
              searchable: false,
              orderable: false,
              render: function (data, type, full, meta) {
                const isChecked = full['is_blocked'] ? 'checked' : '';
                return `
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" ${isChecked} data-id="${full['id']}" onchange="toggleBlockStatus(this)" id="switch-${full['id']}">
                    <label class="form-check-label" for="switch-${full['id']}"></label>
                  </div>
                `;
              }
            },
            


           
          ],
          dom: '<"row mx-2" <"col-lg-4" l> <"col-lg-8 text-end" f> >t<"row mx-2" <"col-sm-12 col-md-5" i> <"col-sm-12 col-md-7" p> >',
          language: {
            sLengthMenu: '_MENU_',
            search: '',
            searchPlaceholder: 'Search user'
          },
          initComplete: function () {
            $(document).find('[data-bs-toggle="tooltip"]').tooltip();
          }
        });
      }


      // Delete Record
      $(document).on('click', '.delete-record', function () {
        var user_id = $(this).data('id'),
          dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
          dtrModal.modal('hide');
        }

        // sweetalert for confirmation of delete
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
            // delete the data
            $.ajax({
              type: 'DELETE',
              url: "".concat(baseUrl, "user-list/").concat(user_id),
              success: function success() {
                dt_user.draw();
              },
              error: function error(_error) {
                console.log(_error);
              }
            });

            // success sweetalert
            Swal.fire({
              icon: 'success',
              title: 'Deleted!',
              text: 'The user has been deleted!',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Cancelled',
              text: 'The User is not deleted!',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      });

      

      // edit record
      $(document).on('click', '.edit-record', function () {
        var user_id = $(this).data('id'),
          dtrModal = $('.dtr-bs-modal.show');

        // hide responsive modal in small screen
        if (dtrModal.length) {
          dtrModal.modal('hide');
        }

        // changing the title of offcanvas
        $('#offcanvasAddUserLabel').html('Edit User');

        // get data
        $.get("".concat(baseUrl, "user-list/").concat(user_id, "/edit"), function (data) {
          $('#user_id').val(data.id);
          $('#add-user-fullname').val(data.name);
          $('#add-user-email').val(data.email);
        });
      });

      // changing the title
      $('.add-new').on('click', function () {
        $('#user_id').val(''); //reseting input field
        $('#offcanvasAddUserLabel').html('Add User');
      });

      // Filter form control to default size
      // ? setTimeout used for multilingual table initialization
      setTimeout(function () {
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm');
      }, 300);

      // validating form and updating user's data
      var addNewUserForm = document.getElementById('addNewUserForm');

      // user form validation
      var fv = FormValidation.formValidation(addNewUserForm, {
        fields: {
          name: {
            validators: {
              notEmpty: {
                message: 'Please enter fullname'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Please enter your email'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          },
          userContact: {
            validators: {
              notEmpty: {
                message: 'Please enter your contact'
              }
            }
          },
          company: {
            validators: {
              notEmpty: {
                message: 'Please enter your company'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            eleValidClass: '',
            rowSelector: function rowSelector(field, ele) {
              // field is the field name & ele is the field element
              return '.mb-3';
            }
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          // Submit the form when all fields are valid
          // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        }
      }).on('core.form.valid', function () {
        // adding or updating user when form successfully validate
        $.ajax({
          data: $('#addNewUserForm').serialize(),
          url: "".concat(baseUrl, "user-list"),
          type: 'POST',
          success: function success(status) {
            dt_user.draw();
            offCanvasForm.offcanvas('hide');

            // sweetalert
            Swal.fire({
              icon: 'success',
              title: "Successfully ".concat(status, "!"),
              text: "User ".concat(status, " Successfully."),
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          },
          error: function error(err) {
            offCanvasForm.offcanvas('hide');
            Swal.fire({
              title: 'Duplicate Entry!',
              text: 'Your email should be unique.',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      });

      // clearing form data when offcanvas hidden
      offCanvasForm.on('hidden.bs.offcanvas', function () {
        fv.resetForm(true);
      });
      var phoneMaskList = document.querySelectorAll('.phone-mask');

      // Phone Number
      if (phoneMaskList) {
        phoneMaskList.forEach(function (phoneMask) {
          new Cleave(phoneMask, {
            phone: true,
            phoneRegionCode: 'US'
          });
        });
      }
    });
/******/ 	return __webpack_exports__;
    /******/
  })()
    ;
});

