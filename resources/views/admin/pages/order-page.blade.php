@extends('admin.layouts.default')

@section('content')
<div class="page-path">Orders</div>
<div class="card ">

    <div class="row m-4">
        <div class="col-sm-2">
            <div class="text-sm-end">
                <input placeholder="Search..." class="form-control dropdown-toggle fs-09" >
            </div>
        </div>
        <div class="col-sm-2">
            <div class="d-flex align-items-center">
                <label for="ddlStatus" class="me-2">Status</label>
                <select id="ddlStatus" class="form-select fs-0 text-muted9">
                    <option selected="true" value="">All</option>
                    <option value="1">To Ship</option>
                    <option value="2">Completed</option>
                    <option value="3">Cancelled</option>
                </select>
            </div>
        </div>

    </div>

    <div class="p-3 table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th class="ps-3 py-3">ID</th>
                    <th class="py-3">Date</th>
                    <th class="py-3">Order Status</th>
                    <th class="py-3">Total</th>
                    <th class="py-3">Payment Method</th>
                    <th class="py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0 text-primary">
                <tr>
                    <td class="ps-3">
                        0000001
                    </td>
                    <td>
                        04 April 2024
                        <small class="text-muted">09:40 PM</small>
                    </td>
                    <td>
                        <span class="badge bg-success">Completed</span>
                    </td>
                    <td>
                        RM 1,923.60
                    </td>
                    <td>
                        TNG eWallet
                    </td>
                    <td>
                        <a href="{{url('admin/order-details')}}" class="me-2">
                            <svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>
                        </a>
                        <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">
                        0000002
                    </td>
                    <td>
                        04 April 2024
                        <small class="text-muted">09:40 PM</small>
                    </td>
                    <td>
                        <span class="badge bg-success">Completed</span>
                    </td>
                    <td>
                        RM 1,923.60
                    </td>
                    <td>
                        TNG eWallet
                    </td>
                    <td>
                        <asp:LinkButton runat="server" ID="LinkButton1" PostBackUrl="~/view/admin/order_details.aspx"
                            CssClass="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">
                        0000003
                    </td>
                    <td>
                        04 April 2024
                        <small class="text-muted">09:40 PM</small>
                    </td>
                    <td>
                        <span class="badge bg-warning">To Ship</span>
                    </td>
                    <td>
                        RM 783.50
                    </td>
                    <td>
                        TNG eWallet
                    </td>
                    <td>
                        <asp:LinkButton runat="server" ID="LinkButton2" PostBackUrl="~/view/admin/order_details.aspx"
                            CssClass="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">
                        0000004
                    </td>
                    <td>
                        04 April 2024
                        <small class="text-muted">09:40 PM</small>
                    </td>
                    <td>
                        <span class="badge bg-success">Completed</span>
                    </td>
                    <td>
                        RM 1,923.60
                    </td>
                    <td>
                        TNG eWallet
                    </td>
                    <td>
                        <asp:LinkButton runat="server" ID="LinkButton3" PostBackUrl="~/view/admin/order_details.aspx"
                            CssClass="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">
                        0000005
                    </td>
                    <td>
                        04 April 2024
                        <small class="text-muted">09:40 PM</small>
                    </td>
                    <td>
                        <span class="badge bg-danger">Cancelled</span>
                    </td>
                    <td>
                        RM 4,003.00
                    </td>
                    <td>
                        FPX
                    </td>
                    <td>
                        <asp:LinkButton runat="server" ID="LinkButton4" PostBackUrl="~/view/admin/order_details.aspx"
                            CssClass="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link fs-09" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link fs-09" href="#">1</a></li>
                <li class="page-item " aria-current="page">
                    <a class="page-link fs-09" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link fs-09" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link fs-09" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@stop


@section('modal')
 <!-- Delete Modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <svg class="svg-red mb-4" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 -960 960 960" width="64"><path d="m330-288 150-150 150 150 42-42-150-150 150-150-42-42-150 150-150-150-42 42 150 150-150 150 42 42ZM480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg>
                <h2 class="h-3 mb-2">Are you sure?</h2>
                <p>Do you really want to delete the record? The process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-light mx-4" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger mx-4">Delete</button>
            </div>
        </div>
    </div>
</div>
@stop