
@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css'); }}" rel="stylesheet" />
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
                            <th class="py-3">Error page</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-primary">
                        <tr>
                            <td class="ps-3">
                                S001
                            </td>
                            <td>
                                John_Wick
                            </td>
                            <td>
                                CEO
                            </td>
                            <td>
                                Edit product page
                            </td>
                            <td>
                                product_page
                            </td>
                            <td>
                                2023/05/23 15:40:07
                            </td>
                            <td>
                                28: Row(s) accepted in target table
                            </td>
                        </tr>
    
                        <tr>
                            <td class="ps-3">
                                S002
                            </td>
                            <td>
                                John_Wick2
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                Issuing CREATE and DROP TABLE for Product
                            </td>
                            <td>
                                product_page
                            </td>
                            <td>
                                2023/05/29 15:08:02
                            </td>
                            <td>
                                0: Row(s) accepted in target table
                            </td>
                        </tr>
    
                        <tr>
                            <td class="ps-3">
                                S003
                            </td>
                            <td>
                                John_Wick3
                            </td>
                            <td>
                                Staff
                            </td>
                            <td>
                                Edit customer info
                            </td>
                            <td>
                                customer_detail
                            </td>
                            <td>
                                2023/06/06 11:08:33
                            </td>
                            <td>
                                2: Row(s) accepted in target table
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@stop
