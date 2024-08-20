@extends('front.layouts.default')

@section('content')
<div id="content" class="contactUs_border m-5">

    <h1>Contact info</h1>
    <h3>Our Location</h3>
    <!--Map area start -->
    <div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.6822073234102!2d-83.71685604946924!3d42.30664594636449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883cac2c20114b69%3A0x96fe590afa21efb6!2s2300+Traverwood+Dr%2C+Ann+Arbor%2C+MI+48105!5e0!3m2!1sen!2s!4v1461260551915"
            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>

    </div>
    <!--Map area end -->
    <div class="form-horizontal">

            <h2 class="my-5">Leave a Message</h2>
            <div class="row mt-3">

                <div class="col-md-3">
                    <p class="h6">Name
                    </p>
                </div>

                <div class="col-md-8">
                    <div class="form-outline form-white shadow-sm">
                        <input id="name" class="form-control form-control-lg fs-6"
                            placeholder="Name">                    
                    </div>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-md-3">
                    <p class="h6">Email
                    </p>
                </div>

                <div class="col-md-8">
                    <div class="form-outline form-white shadow-sm">
                        <input id="email" class="form-control form-control-lg fs-6"
                            type="Email" placeholder="Email">
                    </div>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-md-3">
                    <p class="h6">Phone
                    </p>
                </div>

                <div class="col-md-8">
                    <div class="form-outline form-white shadow-sm">
                        <input id="phone" class="form-control form-control-lg fs-6" placeholder="Phone">
                    </div>
                </div>

            </div>

            <div class="row mt-3">

                <div class="col-md-3">
                    <p class="h6">Message
                    </p>
                </div>

                <div class="col-md-8">
                    <div class="form-outline form-white shadow-sm">
                        <textarea id="message" class="form-control form-control-lg fs-6"
                         placeholder="Message"></textarea>
                    </div>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col">
                    <button id="submit" class="btn btn-primary px-4 offset-md-10" >Submit</button> 
                </div>
            </div>


    </div>

</div>
@stop