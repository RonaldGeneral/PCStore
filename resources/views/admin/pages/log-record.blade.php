@extends('admin.layouts.default')


@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
@stop

@section('content')
        <div class="page-path">Log Record Page</div>
        <div class="card ">
    
            <div class="p-3 table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3 py-3">ID</th>
                            <th class="py-3">User</th>
                            <th class="py-3">Title</th>
                            <th class="py-3">Description</th>
                            <th class="py-3">Page</th>
                            <th class="py-3">Created at</th>
                            
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-primary">
                    @foreach($logactivitys as $logactivity)    
                        <tr>
                            <td class="ps-3">
                            {{$logactivity->id}}
                            </td>
                            <td>
                            {{$logactivity->admin->username}}
                            </td>
                            <td>
                            {{$logactivity->title}}
                            </td>
                            <td>
                            {{$logactivity->description}}
                            </td>
                            <td>
                            {{$logactivity->page}}
                            </td>
                            <td>
                            {{$logactivity->created_on}}
                            </td>
                        </tr>
    
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('admin.download-log') }}" method="POST">
                    @csrf
                <button type="submit" name="action" class="btn btn-secondary mx-2" value="download_xml">Download Log as XML</button>
                </form>
            </div>
        </div>
@stop
