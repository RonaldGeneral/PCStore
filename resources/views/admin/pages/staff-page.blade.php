@extends('admin.layouts.default')

@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
@stop

@section('content')
    <div class="page-path">Staffs</div>
    <div class="card ">
        <div class="row m-4">
            <div class="col-sm-9">
                <a href="{{ URL::asset('javascript:void(0);') }}" class="btn btn-primary mb-2 text-white fs-09" data-bs-toggle="modal" data-bs-target="#add-staff-modal">
                        <svg class="mb-1 svg-white" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960"
                            width="24">
                            <path
                                d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                        </svg>
                        Add Staff 
                    </a>
            </div>
            <div class="col-sm-3">
                <div class="text-sm-end">
                    <input type="search" class="form-control dropdown-toggle fs-09" placeholder="Search..."
                        id="top-search">
                </div>
            </div>
        </div>

        <div class="p-3 table-responsive text-nowrap">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3 py-3">ID</th>
                        <th class="py-3">Name</th>
                        <th class="py-3">IC Number</th>
                        <th class="py-3">Phone</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 text-primary">
                    <tr>
                        <td class="ps-3">
                            1
                        </td>
                        <td>
                            Mary Janes
                        </td>
                        <td>
                            010324-09-0211
                        </td>
                        <td>
                            014-235564323
                        </td>
                        <td>
                            johnwick@gmail.com
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                 
                            <a id="lbView" href="{{ URL::asset('~/view/admin/staff-details.blade.php') }}" class="btn btn-primary me-2" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">

                            </a>
                            <a class="btn p-0" data-bs-toggle="modal"  data-bs-target="#deleteModal">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                    width="24">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-3">
                            2
                        </td>
                        <td>
                            John Wick
                        </td>
                        <td>
                            010324-09-0211
                        </td>
                        <td>
                            014-235564323
                        </td>
                        <td>
                            johnwick@gmail.com
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            <a id="LinkButton1" href="{{ URL::asset('~/view/admin/staff-details.blade.php') }}" class="btn btn-primary me-2" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">

                            </a>
                            <a href="{{ URL::asset('javascript:void(0);') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/></svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            3
                        </td>
                        <td>
                            John Wick
                        </td>
                        <td>
                            010324-09-0211
                        </td>
                        <td>
                            014-235564323
                        </td>
                        <td>
                            johnwick@gmail.com
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            <a id="LinkButton2" href="{{ URL::asset('~/view/admin/staff-details.blade.php') }}" class="btn btn-primary me-2" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">

                            </a>
                            <a href="{{ URL::asset('javascript:void(0);') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/></svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            4
                        </td>
                        <td>
                            John Wick
                        </td>
                        <td>
                            010324-09-0211
                        </td>
                        <td>
                            014-235564323
                        </td>
                        <td>
                            johnwick@gmail.com
                        </td>
                        <td>
                            <span class="badge bg-danger">Blocked</span>
                        </td>
                        <td>
                            <a id="LinkButton3" href="{{ URL::asset('~/view/admin/staff-details.blade.php') }}" class="btn btn-primary me-2" Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>"></a>
                            <a href="{{ URL::asset('javascript:void(0);') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/></svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('modal')

    <!-- Add Modal -->
    <div class="modal fade" id="add-staff-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="txtName" placeholder="John">
                        <label for="txtName" class="col-form-label">Name:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="txtUsername" placeholder="John">
                        <label for="txtUsername" class="col-form-label">Username:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control fs-09" TextMode="Password" id="txtPass" placeholder="John">
                        <label for="txtPass" class="col-form-label">Password:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control fs-09" TextMode="Password" id="txtPassConfirm" placeholder="John">
                        <label for="txtPassConfirm" class="col-form-label">Confirm Password:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control fs-09" TextMode="Email" id="txtEmail" placeholder="John">
                        <label for="txtEmail" class="col-form-label">Email:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="tel" class="form-control fs-09" TextMode="Phone" id="txtMobile" placeholder="John">
                        <label for="txtMobile" class="col-form-label">Mobile:</label>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control fs-09" TextMode="Date" id="txtBirthdate" placeholder="John">
                                <label for="txtBirthdate" class="col-form-label">Birthdate:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select id="ddlStatus" class="form-select fs-09">
                                    <option Selected="True" Value="1">Active</option>
                                    <option Value="2">Blocked</option>
                                </select>
                                <label for="ddlStatus">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <div class=" form-floating">
                                <select id="ddlGender" class="form-select fs-09">
                                    <option Selected="True" Value="m">Male</option>
                                    <option Value="f">Female</option>
                                </select>
                                <label for="ddlGender">Gender</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select id="ddlPosition" class="form-select fs-09">
                                    <option Selected="True" Value="1">CEO</option>
                                    <option Value="2">Clerk</option>
                                    <option Value="3">Warehouse admin</option>
                                    <option Value="4">Sales admin</option>
                                    <option Value="5">Sales executive</option>
                                    <option Value="6">Logistics Manager</option>
                                </select>
                                <label for="ddlPosition">Position</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
                        changes</button>
                    <button type="button" Text="Save" class="btn btn-primary fs-09"></button>
                </div>
            </div>
        </div>
    </div>
    </div>

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
                    <button type="button" Text="Delete" class="btn btn-danger mx-4"></button>
                </div>
            </div>
        </div>
    </div>
@stop
