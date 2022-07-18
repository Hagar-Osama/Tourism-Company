@extends('admin.layouts.master')

@section('title')
    Booking | Dashboard
@endsection
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/custom_dt_custom.css')}}">
    <!-- END PAGE LEVEL STYLES -->
    <style>
        button{
            background-color: #545454;
            border: unset;
            border-radius: 30%;
        }
        button:hover{
            background-color: #eff6ff;
        }
        li{
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>All Booking</h3>
                </div>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Booking</h4>
                                </div>
                            </div>
                        </div>
                        @include('partials.session')
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-2" class="table style-2  table-hover">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record Id </th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Message</th>
                                        <th class="text-center">Package Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td class="checkbox-column">  </td>
                                                <td class="text-center">{{$data['name']}}</td>
                                                <td class="text-center">{{$data['email']}}</td>
                                                <td class="text-center">{{$data['phone']}}</td>
                                                <td class="text-center">{{$data['message']}}</td>
                                                <td class="text-center">{{$data->packageBook['title']}}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li>
                                                            <form method="post" action="{{route('admin.booking.update')}}">
                                                                @csrf
                                                                @method('Put')
                                                                <input type="hidden" name="booking_id" value="{{$data->id}}">

                                                                <div class="row row-xs">
                                                                    <div class="parsley-select col-md-12" id="slWrapper">
                                                                        <select name="status" class="form-control select2 @error('status') is-invalid fparsley-error parsley-error @enderror" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one"  id="status" required>
                                                                            <option value="open" {{($data->status == 'open') ? 'selected' : ''}}>Open</option>
                                                                            <option value="in_progress" {{($data->status == 'in_progress') ? 'selected' : ''}}>In_Progress</option>
                                                                            <option value="complete" {{($data->status == 'complete') ? 'selected' : ''}}>Complete</option>

                                                                        </select>
                                                                        @error('key')
                                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                          <p>{{ $message }}</p>
                                                                        </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                            </form>
                                                        </li>

                                                    </ul>

                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('js')
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script src="{{asset('assetsAdmin/plugins/table/datatable/datatables.js')}}"></script>

                <script>
                    // var e;
                    c1 = $('#style-1').DataTable({
                        headerCallback:function(e, a, t, n, s) {
                            e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                        },
                        columnDefs:[ {
                            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            }
                        }],
                        "oLanguage": {
                            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                            "sInfo": "Showing page _PAGE_ of _PAGES_",
                            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                        },
                        "lengthMenu": [5, 10, 20, 50],
                        "pageLength": 5
                    });
                    multiCheck(c1);
                    c2 = $('#style-2').DataTable({
                        headerCallback:function(e, a, t, n, s) {
                            e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                        },
                        columnDefs:[ {
                            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                                return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                            }
                        }],
                        "oLanguage": {
                            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                            "sInfo": "Showing page _PAGE_ of _PAGES_",
                            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                        },
                        "lengthMenu": [5, 10, 20, 50],
                        "pageLength": 5
                    });
                    multiCheck(c2);
                    c3 = $('#style-3').DataTable({
                        "oLanguage": {
                            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                            "sInfo": "Showing page _PAGE_ of _PAGES_",
                            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            "sSearchPlaceholder": "Search...",
                            "sLengthMenu": "Results :  _MENU_",
                        },
                        "stripeClasses": [],
                        "lengthMenu": [5, 10, 20, 50],
                        "pageLength": 5
                    });
                    multiCheck(c3);
                </script>
                <!-- END PAGE LEVEL SCRIPTS -->
                <script>
                    $(document).ready(function (){
                        $("#status").on('change', function (){
                            this.form.submit();
                        });
                    });
                </script>
@endsection

