<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-sms-12">
                <a href="{{ url('/front/') }}">

                    <div id="logo">
                        <img src="{{ URL::asset('img/terrabyte.png') }}" alt="TerraByte" itemprop="logo" class="img-responsive" />
                    </div>
                </a>

            </div>
            <div class="col-md-9 col-sm-9 col-sms-12 py-4">
                <!--Search Form-->
                <div id="search-by-category" class="ms-3">
                    <div class="search-container d-flex">
                        <input id="textSearch" class="col form-control border-0 p-2 ps-3 br-50" placeholder="Search entire store here ..." />
                        <div id="sp-btn-search" class="col-1">
                            <button id="btnSearch" class="btn btn-primary btn-lg br-50"></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex d-flex-gap justify-content-end">
                    <a href="{{ url("/front/cart");}}">
                        <div id="cart" class="my-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                width="30">
                                <path
                                    d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM208-800h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Z" />
                            </svg>
                        </div>
                    </a>
                    @if (Auth::guard('customer')->check())
                        <a href="{{ route('front.profile') }}">
                            <div id="account" class="my-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                                    width="30">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z" />
                                </svg>
                            </div>
                        </a>
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                            <div id="signOut" class="my-3">
                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                    <i class='fa fa-sign-out' style="color: black; font-size: 30px;"></i>
                                </button>
                            </div>
                        </form>
                    @else
                        <a href="{{ route('front.login') }}">
                            <div id="signIn" class="my-3">
                                <i class='fa fa-sign-in' style="color: black; font-size: 30px;"></i>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<div class="nav-container visible-lg visible-md">
    <div role="menu" id="pt_custommenu" class="pt_custommenu">
        <div class="container">
            <div class="col-12">
                <ul class="nav d-flex justify-content-between">
                    <li class="nav-item col text-center"><a runat="server"
                            href="{{ url("/front/");}}">Home</a></li>
                    <li class="nav-item col text-center"><a runat="server"
                            href="{{ url("/front/shop");}}">Shop</a></li>
                    <li class="nav-item col text-center"><a runat="server"
                            href="{{ url("/front/support");}}">Support</a></li>
                    <li class="nav-item col text-center"><a runat="server"
                            href="{{ url("/front/contact");}}">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>