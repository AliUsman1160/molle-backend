(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
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
  var dt_user_table = $('.datatables-events'),
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
             url: baseUrl + 'event-list'
      },
      columns: [
        { data: '' },  
        { data: '#' }, 
        { data: 'name' }, 
        { data: 'event_type_id' },  
        { data: 'created_by_user_id' },  
        { data: 'image' }, 
        { data: 'start_time' }, 
        { data: 'end_time' }, 
        { data: 'location' },  
        { data: 'start_date' }, 
        { data: 'end_date' },  
        { data: 'description' },  
        { data: 'paid' },  
        { data: 'amount' },  
        { data: 'seat_limit' },  
        // { data: 'created_at' },  
        { data: 'action' }
        ],
        columnDefs: [
            {
                className: 'control',
                searchable: false,
                orderable: false,
                responsivePriority: 2,
                targets: 0,
                render: function(data, type, full, meta) {
                    return '';  // Placeholder for extra controls
                }
            },
            {
                searchable: false,
                orderable: false,
                targets: 1,
                render: function(data, type, full, meta) {
                    return "<span>" + (meta.row + 1) + "</span>";
                }
            },
            {
                targets: 2,
                responsivePriority: 4,
                render: function(data, type, full, meta) {
                    var name = full['name'];
                    var stateNum = Math.floor(Math.random() * 6);
                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                    var state = states[stateNum];
                    var initials = (name.match(/\b\w/g) || []).slice(0, 2).join('').toUpperCase();
                    var output = '<span class="avatar-initial rounded-circle bg-label-' + state + '">' + initials + '</span>';
                    return '<span class="name">' + name + '</span>';
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return '<span class="event_type_id">' + (full['event_type_id'] || 'N/A') + '</span>';
                }
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    return '<span class="created_by_user_id">' + (full['created_by_user_id'] || 'N/A') + '</span>';
                }
            },
            {
                targets: 5,
                render: function(data, type, full, meta) {
                    return '<span class="image">' + (full['image']) + '</span>';
                }
            },
            {
                targets: 6,
                render: function(data, type, full, meta) {
                    return '<span class="start_time">' + (full['start_time']) + '</span>';
                }
            },
            {
                targets: 7,
                render: function(data, type, full, meta) {
                    return '<span class="end_time">' + (full['end_time']) + '</span>';
                }
            },
            {
                targets: 8,
                render: function(data, type, full, meta) {
                    return '<span class="location">' + (full['location']) + '</span>';
                }
            },

            {
                targets: 9,
                render: function(data, type, full, meta) {
                    return '<span class="start_date">' + moment(full['start_date']).format('YYYY-MM-DD') + '</span>';
                }
            },

            {
                targets: 10,
                render: function(data, type, full, meta) {
                    return '<span class="end_date">' + moment(full['end_date']).format('YYYY-MM-DD') + '</span>';
                }
            },

            {
                targets: 11,
                render: function(data, type, full, meta) {
                    return '<span class="description">' + (full['description'])+ '</span>';
                }
            },

            
            {
                targets: 12,
                render: function(data, type, full, meta) {
                    return '<span class="paid">' + (full['paid'])+ '</span>';
                }
            },

            {
                targets: 13,
                render: function(data, type, full, meta) {
                    return '<span class="amount">' + (full['amount'])+ '</span>';
                }
            },

            {
                targets: 14,
                render: function(data, type, full, meta) {
                    return '<span class="seat_limit">' + (full['seat_limit'])+ '</span>';
                }
            },

            // {
            //     targets: 15,
            //     render: function(data, type, full, meta) {
            //         return '<span class="created_at">' + moment(full['created_at']).format('YYYY-MM-DD') + '</span>';
            //     }
            // },
            {
                targets: -1,
                title: 'Actions',
                searchable: false,
                orderable: false,
                render: function(data, type, full, meta) {
                    return '<div class="d-inline-block text-nowrap">' +
                        '<button class="btn btn-sm btn-icon edit-record" data-id="' + full['id'] + '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i class="mdi mdi-pencil-outline mdi-20px"></i></button>' +
                        '<button class="btn btn-sm btn-icon delete-record" data-id="' + full['id'] + '"><i class="mdi mdi-delete-outline mdi-20px"></i></button>' +
                        '</div>';
                }
            }
        ],
      order: [[2, 'desc']],
      dom: '<"row mx-2"' + '<"col-md-2"<"me-3"l>>' + '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' + '>t' + '<"row mx-2"' + '<"col-sm-12 col-md-6"i>' + '<"col-sm-12 col-md-6"p>' + '>',
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [{
        extend: 'collection',
        className: 'btn btn-label-secondary dropdown-toggle ms-3 me-2 waves-effect waves-light',
        text: '<i class="mdi mdi-export-variant me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
        buttons: [{
          extend: 'print',
          title: 'Users',
          text: '<i class="mdi mdi-printer-outline me-1" ></i>Print',
          className: 'dropdown-item',
          exportOptions: {
            columns: [1, 2, 3],
            // prevent avatar to be print
            format: {
              body: function body(inner, coldex, rowdex) {
                if (inner.length <= 0) return inner;
                var el = $.parseHTML(inner);
                var result = '';
                $.each(el, function (index, item) {
                  if (item.classList !== undefined && item.classList.contains('user-name')) {
                    result = result + item.lastChild.textContent;
                  } else result = result + item.innerText;
                });
                return result;
              }
            }
          },
          customize: function customize(win) {
            //customize print view for dark
            $(win.document.body).css('color', config.colors.headingColor).css('border-color', config.colors.borderColor).css('background-color', config.colors.body);
            $(win.document.body).find('table').addClass('compact').css('color', 'inherit').css('border-color', 'inherit').css('background-color', 'inherit');
          }
        }, {
          extend: 'csv',
          title: 'Users',
          text: '<i class="mdi mdi-file-document-outline me-1" ></i>Csv',
          className: 'dropdown-item',
          exportOptions: {
            columns: [1, 2, 3],
            // prevent avatar to be print
            format: {
              body: function body(inner, coldex, rowdex) {
                if (inner.length <= 0) return inner;
                var el = $.parseHTML(inner);
                var result = '';
                $.each(el, function (index, item) {
                  if (item.classList.contains('user-name')) {
                    result = result + item.lastChild.textContent;
                  } else result = result + item.innerText;
                });
                return result;
              }
            }
          }
        }, {
          extend: 'excel',
          title: 'Users',
          text: 'Excel',
          className: 'dropdown-item',
          exportOptions: {
            columns: [1, 2, 3],
            // prevent avatar to be display
            format: {
              body: function body(inner, coldex, rowdex) {
                if (inner.length <= 0) return inner;
                var el = $.parseHTML(inner);
                var result = '';
                $.each(el, function (index, item) {
                  if (item.classList.contains('user-name')) {
                    result = result + item.lastChild.textContent;
                  } else result = result + item.innerText;
                });
                return result;
              }
            }
          }
        }, {
          extend: 'pdf',
          title: 'Users',
          text: '<i class="mdi mdi-file-pdf-box me-1"></i>Pdf',
          className: 'dropdown-item',
          exportOptions: {
            columns: [1, 2, 3],
            // prevent avatar to be display
            format: {
              body: function body(inner, coldex, rowdex) {
                if (inner.length <= 0) return inner;
                var el = $.parseHTML(inner);
                var result = '';
                $.each(el, function (index, item) {
                  if (item.classList.contains('user-name')) {
                    result = result + item.lastChild.textContent;
                  } else result = result + item.innerText;
                });
                return result;
              }
            }
          }
        }, {
          extend: 'copy',
          title: 'Users',
          text: '<i class="mdi mdi-content-copy me-1" ></i>Copy',
          className: 'dropdown-item',
          exportOptions: {
            columns: [1, 2, 3],
            // prevent avatar to be copy
            format: {
              body: function body(inner, coldex, rowdex) {
                if (inner.length <= 0) return inner;
                var el = $.parseHTML(inner);
                var result = '';
                $.each(el, function (index, item) {
                  if (item.classList.contains('user-name')) {
                    result = result + item.lastChild.textContent;
                  } else result = result + item.innerText;
                });
                return result;
              }
            }
          }
        }]
      }, ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function header(row) {
              var data = row.data();
              return 'Details of ' + data['name'];
            }
          }),
          type: 'column',
          renderer: function renderer(api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
              ? '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' + '<td>' + col.title + ':' + '</td> ' + '<td>' + col.data + '</td>' + '</tr>' : '';
            }).join('');
            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  // Delete Record
  $(document).on('click', '.delete-record', function () {
    var eventtype_id = $(this).data('id'),
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
          url: "".concat(baseUrl, "eventtype-list/").concat(eventtype_id),
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
    var eventtype_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // changing the title of offcanvas
    $('#offcanvasAddUserLabel').html('Edit Event Type');

    // get data
    var id = $(this).data('id');
    $.get(baseUrl + 'eventtype-list/' + id, function (data) {
        if (data) {
            $('#eventtype_id').val(data.id);
            $('#eventtype_name').val(data.name);
            $('#offcanvasAddUserLabel').html('Edit Event Type');
            offCanvasForm.offcanvas('show');
        }
    });
  });

  // changing the title
  $('.add-new').on('click', function () {
    $('#eventtype_id').val(''); //reseting input field
    $('#offcanvasAddUserLabel').html('Add Event Type');
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(function () {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);

  // validating form and updating user's data
// Form submission
var addNewEventForm = document.getElementById('addNewEventForm');

// user form validation
var fv = FormValidation.formValidation(addNewEventForm, {
  fields: {
    name: {
      validators: {
        notEmpty: {
          message: 'Please enter the event name'
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
  var eventtype_id = $('#eventtype_id').val();
  var method = eventtype_id ? 'PUT' : 'POST'; // Determine if it's an update or create
  var url = eventtype_id ? baseUrl + 'eventtype-list/' + eventtype_id : baseUrl + 'eventtype-list';

  $.ajax({
    data: $('#addNewEventForm').serialize(),
    url: url,
    type: method,
    success: function (status) {
      dt_user.draw();
      offCanvasForm.offcanvas('hide');

      // sweetalert
      Swal.fire({
        icon: 'success',
        title: "Successfully " + (eventtype_id ? 'Updated' : 'Created') + "!",
        text: "Event Type " + (eventtype_id ? 'Updated' : 'Created') + " Successfully.",
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    },
    error: function (err) {
      offCanvasForm.offcanvas('hide');
      Swal.fire({
        title: 'Error!',
        text: 'There was an error with your submission.',
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
/******/ })()
;
});