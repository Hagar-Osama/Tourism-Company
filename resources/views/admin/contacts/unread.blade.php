@extends('admin.layouts.master')

@section('title')
    Contacts | Dashboard
@endsection
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>All Messages</h3>
                </div>
            </div>

            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            @include('partials.session')
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Message</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($messages)
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>
                                                @if($message->status == 0)
                                                    <button class="btn btn-light-warning">Not Approve</button>
                                                @else
                                                    Approve
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex my-xl-auto right-content">
                                                    <form method="post" action="{{route('admin.contact.update')}}">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="message_id" value="{{$message->id}}">
                                                        <div class="pr-1 mb-3 mb-xl-0">
                                                            <button type="submit" class="btn btn-danger btn-icon mr-2 delete" data-id="" data-placement="top" data-toggle="tooltip" title="Approve">Approve</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/div-->

    <!-- main-content closed -->
@endsection

@section('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assetsAdmin/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
