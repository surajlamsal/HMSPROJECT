<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <!-- <b>Version</b> 3.1.0 -->
    </div>
    <a href="https://lict.edu.np/">Lumbini ICT Campus </a>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
@php
    $base_tables = ""
@endphp
@isset($base_table)
    {{$base_tables=$base_table}}
@endisset
<script>
    function checkOutThis(id, ele) {
        let base_table = "{{$base_tables}}";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to reverse this operation!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            allowOutsideClick: false,
            allowEscapeKey: false,
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Chcecked out successfully',
                    text: "Guest has been successfully checked out!!!",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: 'Done'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax
                        ({
                            url: '{{ url('checkOutThis') }}',
                            data: {
                                "base_table": base_table,
                                "base_table_id": id,
                                "_token": "{{ csrf_token() }}",
                            },
                            type: 'post',
                            success: function (result) {
                                location.reload();
                            }
                        });
                    }
                })
            }
        })
    }

    function deleteRecord(id, ele) {
        let base_table = "{{$base_tables}}";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to delete this record!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            allowOutsideClick: false,
            allowEscapeKey: false,
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted',
                    text: "Record has been deleted successfully",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: 'Done'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax
                        ({
                            url: '{{ url('deleteRecord') }}',
                            data: {
                                "base_table": base_table,
                                "base_table_id": id,
                                "_token": "{{ csrf_token() }}",
                            },
                            type: 'post',
                            success: function (result) {
                                location.reload();
                            }
                        });
                    }
                })
            }
        })
    }

    jQuery(function () {
        let toastMessage = "{{Session::get('operationMessage')}}";
        let Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        if ((toastMessage === "insertSuccess") || (toastMessage === "updateSuccess")) {
            if (toastMessage === "insertSuccess") {
                Swal.fire({
                    title: 'Success',
                    text: "Successfully inserted record.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Done'
                });
            } else if (toastMessage === "updateSuccess") {
                Swal.fire({
                    title: 'Success',
                    text: "Successfully updated record.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Done'
                });
            }
        } else if ((toastMessage === "insertFail") || (toastMessage === "updateFail")) {
            if (toastMessage === "insertFail") {
                Toast.fire({
                    icon: 'error',
                    title: 'Error on inserting record.'
                })
            } else if (toastMessage === "updateFail") {
                Toast.fire({
                    icon: 'error',
                    title: 'Error on updating record.'
                })
            }
        } else if ((toastMessage === "deleteSuccess") || (toastMessage === "deleteFail")) {
            if (toastMessage === "deleteSuccess") {
            } else if (toastMessage === "deleteFail") {
            }
        } else if ((toastMessage === "editSuccess") || (toastMessage === "editFail")) {
            if (toastMessage === "editSuccess") {
            } else if (toastMessage === "editFail") {
            }
        }
    });
    let toastMessage = "{{Session::put('operationMessage', '')}}";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        let SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/fullcalender",
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                let title = prompt('Event Title:');
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + "/fullcalenderAjax",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event Created Successfully");
                            calendar.fullCalendar('renderEvent',
                                {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                }, true);
                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                let deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    jQuery.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event Deleted Successfully");
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script>
</body>
</html>
