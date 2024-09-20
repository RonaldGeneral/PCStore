@extends('admin.layouts.default')


@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
@stop

@section('content')
     <div class="page-path"> Profile</div>
 <div class="col-12 col-xl-6">
     <div class="card card-plain h-100 shadow-sm">
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
                 <img alt="profile-image" src="{{ URL::asset('res/man1.jpg') }}" class="m-2 person-icon shadow-xl">
                 <div class="py-3 mx-3">
                     <p class="h4 text-dark">Alex Thompson</p>
                     <p class="my-1 h6 text-secondary">CEO / Founder</p>
                 </div>


             </div>

             <hr class="horizontal gray-light my-4">
             <ul class="list-group">
                 <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                     <span class="col-2"><strong class="text-dark">Name</strong></span>
                     <span class="col-10">: Alex Thompson</span>
                 </li>
                 <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                     <span class="col-2"><strong class="text-dark">Userame</strong></span>
                     <span class="col-10">: alexthompson</span>
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
                     <span class="col-2"><strong class="text-dark">Role</strong></span>
                     <span class="col-10">: Admin</span>
                 </li>
                 <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                     <span class="col-2"><strong class="text-dark">Joined on</strong></span>
                     <span class="col-10">: 1 April 2024</span>
                 </li>

             </ul>
         </div>
     </div>
 </div>
@stop

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
                        <input type="email" class="form-control fs-09" TextMode="Email" id="txtEmail" placeholder="John">
                        <label for="txtEmail" class="col-form-label">Email:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="tel" class="form-control fs-09" TextMode="Phone" id="txtMobile" placeholder="John">
                        <label for="txtMobile" class="col-form-label">Mobile:</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="date" class="form-control fs-09" TextMode="Date" id="txtBirthdate" placeholder="John">
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

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    </script>
@stop