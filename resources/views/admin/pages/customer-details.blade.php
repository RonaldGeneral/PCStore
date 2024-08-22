@extends('admin.layouts.default')

@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css'); }}" rel="stylesheet" />
@stop

@section('content')
            <div class="page-path">


            <a class="btn btn-primary me-2" href="~/views/admin/customer-page.blade.php">
                <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                </svg>
                Customer Details
            </a>
            
            
        

        </div>
        <div class="d-flex">
            <div class="col-6 col-xl-6">
                <div class="card card-plain mb-3 shadow-sm">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn" id="edit-profile-btn" data-bs-toggle="modal"
                                    data-bs-target="#edit-profile-modal">
                                    <svg data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"
                                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="d-flex">
                            <img alt="profile-image" src="res/man3.jpg" class="m-2 person-icon shadow-xl">
                            <div class="py-3 mx-3">
                                <p class="h4 text-dark">Nathan Lee</p>
                            </div>
                        </div>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Name</strong></span>
                                <span class="col-10">: Nathan Lee</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Userame</strong></span>
                                <span class="col-10">: nathanlee</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Mobile</strong></span>
                                <span class="col-10">: 012-34567953</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Email</strong></span>
                                <span class="col-10">: alexthompson@gmail.com</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Gender</strong></span>
                                <span class="col-10">: Male</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Birthdate</strong></span>
                                <span class="col-10">: 23 March 1998</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Status</strong></span>
                                <span class="col-10">: <span class="badge bg-success">Active</span></span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Joined on</strong></span>
                                <span class="col-10">: 1 April 2024</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card card-plain shadow-sm">
                    <div class="card-header pb-0 p-3 d-flex">
                        <h5 class="text-muted col-9 pt-2">Address Details</h5>
                        <button type="button" class="col text-end btn" id="edit-address-btn" data-bs-toggle="modal"
                            data-bs-target="#edit-address-modal">
                            <svg data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Address"
                                xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Address 1</strong></span>
                                <span class="col-10">: 13, Jalan Madani 73</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Address 2</strong></span>
                                <span class="col-10">: -</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">Postcode</strong></span>
                                <span class="col-10">: 12300</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">City</strong></span>
                                <span class="col-10">: Butterworth</span>
                            </li>
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                                <span class="col-2"><strong class="text-dark">State</strong></span>
                                <span class="col-10">: Penang</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title mb-3">Recent order</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mt-3 d-flex">
                                <strong class="">21 March 2024</strong>
                            </li>
                            <li class="list-group-item d-flex">
                                <img width="64" src="data:image/jpeg;base64,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">
                                <span class="ms-3 col">
                                    Lenove Ideapad 5i 
                                    
                                </span><small class="col text-muted">Color: Silver</small>
                                
                            </li>
                            <li class="list-group-item mt-3 d-flex">
                                <strong class="">19 March 2024</strong>
                            </li>
                            <li class="list-group-item d-flex">
                                <img width="64" src="data:image/jpeg;base64,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">
                                <span class="ms-3 col">
                                    Lenove Ideapad 5i 
                                    
                                </span><small class="col text-muted">Color: Silver</small>
                                
                            </li>
                            
                        </ul>
                    </div> <!-- end card-body-->
                </div>
            </div>
        </div>
stop

@section('modal')
        <div class="modal fade" id="edit-profile-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
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
                        <input type="email" class="form-control fs-09" id="txtEmail" placeholder="John">
                        <label for="txtEmail" class="col-form-label">Email:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="tel" class="form-control fs-09" id="txtMobile" placeholder="John">
                        <label for="txtMobile" class="col-form-label">Mobile:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="date" class="form-control fs-09" id="txtBirthdate" placeholder="John">
                        <label for="txtBirthdate" class="col-form-label">Birthdate:</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <select id="ddlGender" CssClass="form-select fs-09">
                            <option Selected="True" Value="m">Male</option>
                            <option Value="f">Female</option>
                        </select>
                        <label for="ddlGender">Gender</label>
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

    <div class="modal fade" id="edit-address-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="address1" placeholder="John">
                        <label for="address1" class="col-form-label">Address 1:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="address2" placeholder="john">
                        <label for="address2" class="col-form-label">Address 2:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="postcode" placeholder="john@mail.com">
                        <label for="postcode" class="col-form-label">Postcode:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="city" placeholder="012-34567890">
                        <label for="city" class="col-form-label">City:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control fs-09" id="state" placeholder="12-03-2001">
                        <label for="state" class="col-form-label">State:</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
                        changes</button>
                    <button type="button" Text="Save" CssClass="btn btn-primary fs-09"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    </script>
stop
