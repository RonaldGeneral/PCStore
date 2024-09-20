<header class="app-header header-shadow" id="app-header">
            <span class="icon toggle-menu" onclick="toggleNav()">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="48">
                    <path
                        d="M160-269.231V-300h640v30.769H160Zm0-195.384v-30.77h640v30.77H160ZM160-660v-30.769h640V-660H160Z" />
                </svg>
            </span>
            <div class="header-account">
                <img alt="profile-image" src="{{ URL::asset('res/man1.jpg') }}" class="m-2 person-icon shadow-xl">
                <div class="account-text">
                    <div class="account-name">John Smith</div>
                    <div class="account-pos">Manager</div>
                </div>
                
                <a class="icon logout" href="{{ URL::asset('~/view/admin/login.blade.php') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>

                </a>
                
            </div>
            <div id="mySidenav" class="sidenav">
                <a href="{{ url('admin/customer-page') }}" title="Customer page">
                    <svg xmlns='http://www.w3.org/2000/svg' height='35' viewBox='0 -960 960 960' width='35'>
                        <path
                            d='M480-492.719q-57.749 0-96.438-38.689-38.689-38.688-38.689-96.566 0-57.877 38.689-96.438 38.689-38.56 96.438-38.56t96.438 38.56q38.689 38.561 38.689 96.438 0 57.878-38.689 96.566-38.689 38.689-96.438 38.689ZM180.001-187.694v-80.255q0-31.282 16.705-55.576 16.705-24.295 43.808-37.346 61.871-28.41 121.056-42.744 59.184-14.333 118.422-14.333t118.225 14.539q58.987 14.538 120.692 42.72 27.813 13.028 44.451 37.243 16.639 24.215 16.639 55.497v80.255H180.001Zm50.255-50.255h499.488v-30q0-14.462-8.936-27.449-8.936-12.987-23.578-20.603-56.564-27.615-109.34-39.653-52.777-12.039-107.89-12.039t-108.428 12.039q-53.315 12.038-109.213 39.653-14.641 7.616-23.372 20.603-8.731 12.987-8.731 27.449v30ZM480-542.974q35.974 0 60.423-24.448 24.449-24.449 24.449-60.424 0-35.974-24.449-60.423-24.449-24.448-60.423-24.448-35.974 0-60.423 24.448-24.449 24.449-24.449 60.423 0 35.975 24.449 60.424 24.449 24.448 60.423 24.448Zm0-84.872Zm0 389.897Z' />
                    </svg>
                    <span class='menu-label'>Customer</span>
                </a>
                
                <a href="{{ route('admins.index') }}" title="Staff page">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M400-494.873q-57.749 0-96.438-38.56-38.689-38.561-38.689-96.566 0-57.75 38.689-96.439 38.689-38.688 96.438-38.688t96.438 38.688q38.689 38.689 38.689 96.439 0 58.005-38.689 96.566-38.689 38.56-96.438 38.56ZM100.001-189.592v-80.254q0-31.128 15.667-55.167 15.667-24.038 44.846-37.756 60.256-27.82 116.82-42.448Q333.898-419.845 400-419.845h10.538q5.18 0 10.128.154-4.999 12.256-7.807 23.973-2.808 11.718-4.756 26.128H400q-62.974 0-115.538 13.115t-102.103 38.577q-17.256 8.795-24.679 21.205-7.424 12.411-7.424 26.847v29.999h260.257q3.795 13.743 9.551 26.461 5.756 12.718 13.217 23.794h-333.28Zm557.358 31.512-7.846-56.051q-16.872-4.23-32.872-12.974t-27.795-20.949l-49.204 14.641-21.282-35.665 41.795-36q-4.051-12.974-4.051-29.949 0-16.974 4.051-30.205l-41.41-36.513 21.281-35.665 48.82 15.026q11.41-12.462 27.603-21.013 16.192-8.552 33.064-12.782l7.846-56.051h44.204l7.717 56.051q16.616 4.23 32.809 12.884 16.192 8.654 27.859 21.065l48.82-15.18 21.024 35.819-41.41 36.513q4.308 13.198 4.308 30.189t-4.308 29.811l41.795 36-21.025 35.665-49.204-14.641q-12.052 12.205-28.052 20.949-16 8.744-32.616 12.974l-7.717 56.051h-44.204Zm21.751-100.793q33.171 0 54.646-21.637 21.474-21.636 21.474-54.551 0-33.171-21.508-54.645-21.509-21.474-54.68-21.474-32.914 0-54.517 21.508-21.602 21.508-21.602 54.679 0 32.915 21.636 54.517 21.637 21.603 54.551 21.603ZM400-545.128q35.974 0 60.423-24.32 24.449-24.321 24.449-60.551 0-35.975-24.449-60.424-24.449-24.448-60.423-24.448-35.974 0-60.423 24.448-24.449 24.449-24.449 60.424 0 36.23 24.449 60.551 24.449 24.32 60.423 24.32Zm0-84.871Zm10.513 390.152Z" />
                    </svg>
                    <span class="menu-label">Staff</span>
                </a>
                <a href="{{ url('admin/product-page') }}" title="Product page">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M190.256-660.359v457.794q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462h554.87q5.385 0 8.847-3.462 3.462-3.462 3.462-8.847v-457.794H619.999v306.331L480-424.027l-139.999 69.999v-306.331H190.256Zm12.309 520.358q-25.705 0-44.134-18.43-18.43-18.429-18.43-44.134V-684.64q0-10.613 3.372-20.529 3.372-9.915 10.116-18.291l57.231-72.795q8.359-11.103 21.419-17.423 13.06-6.321 27.657-6.321h439.228q14.597 0 27.85 6.321 13.252 6.32 21.611 17.423l58.026 73.565q6.744 8.375 10.116 18.483t3.372 20.721v480.921q0 25.705-18.43 44.134-18.429 18.43-44.134 18.43h-554.87Zm3.717-570.613h546.385l-44.781-54.899q-1.923-1.923-4.424-3.077-2.5-1.154-5.192-1.154H260.591q-2.692 0-5.321 1.154-2.628 1.154-4.295 3.077l-44.693 54.899Zm183.974 50.255v224.744L480-480.487l89.744 44.872v-224.744H390.256Zm-200 0h579.488H190.256Z" />
                    </svg>
                    <span class="menu-label">Product</span>
                </a>
                <a href="{{ route('admin.reports') }}" title="Reports">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M130.001-130.001v-63.87l50.255-50.255v114.125h-50.255Zm162.564 0v-223.87l50.255-50.255v274.125h-50.255Zm162.308 0v-274.125l50.254 51.255v222.87h-50.254Zm162.564 0v-222.87l50.255-50.255v273.125h-50.255Zm162.307 0v-383.87l50.255-50.255v434.125h-50.255ZM130.001-365.438v-70.741L400-705.358l160 160 269.999-270.409v70.997L560-474.36l-160-160-269.999 268.922Z" />
                    </svg>
                    <span class="menu-label">Reports</span>
                </a>
                <a href="{{ route('orders.index') }}" title="Order page">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M480-581.001 445.001-616l78.924-78.873H334.873v-50.254h189.052L445.052-824 480-858.999 618.999-720 480-581.001ZM290.885-97.694q-27.647 0-46.855-19.349-19.208-19.35-19.208-46.997 0-27.268 19.349-46.537 19.35-19.269 46.997-19.269 27.646 0 46.854 19.411 19.208 19.41 19.208 46.807 0 27.396-19.349 46.665-19.35 19.27-46.996 19.27Zm389.588 0q-27.54 0-46.673-19.349-19.133-19.35-19.133-46.997 0-27.268 19.271-46.537t46.807-19.269q27.536 0 46.805 19.411 19.269 19.41 19.269 46.807 0 27.396-19.349 46.665-19.35 19.27-46.997 19.27ZM70.822-819.744v-50.255h107.024l166.923 354.204h276.512q3.462 0 6.155-1.731 2.692-1.73 4.615-4.808l150.051-265.768h56.665L681.845-499.591q-9.963 16.641-25.726 26.628-15.763 9.987-34.272 9.987H327.385l-52.001 96.257q-3.077 4.616-.32 10.001t8.783 5.385h462.972v50.255H288.052q-36.134 0-54.772-29.859-18.638-29.858-1.894-60.397l61.949-112.359-147.436-316.051H70.822Z" />
                    </svg>
                    <span class="menu-label">Sales order</span>
                </a>
                <a href="{{ route('admin.profile') }}" title="Profile page">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M162.565-100.001q-25.788 0-44.176-18.388t-18.388-44.176v-434.87q0-25.788 18.388-44.176t44.176-18.388h232.052v-149.745q0-20.403 14.933-35.329 14.933-14.926 35.62-14.926h69.732q20.687 0 35.584 14.926 14.897 14.926 14.897 35.329v149.745h232.052q25.788 0 44.176 18.388t18.388 44.176v434.87q0 25.788-18.388 44.176t-44.176 18.388h-634.87Zm0-50.255h634.87q5.385 0 8.847-3.462 3.462-3.462 3.462-8.847v-434.87q0-5.385-3.462-8.847-3.462-3.462-8.847-3.462H565.383v30.002q0 22.23-14.961 36.242-14.961 14.012-35.568 14.012h-69.708q-20.607 0-35.568-14.012-14.961-14.012-14.961-36.242v-30.002H162.565q-5.385 0-8.847 3.462-3.462 3.462-3.462 8.847v434.87q0 5.385 3.462 8.847 3.462 3.462 8.847 3.462Zm79.794-104.668h227.025v-9.948q0-15.872-8.205-28.628T439.384-312q-25.564-9.692-44.525-13.461-18.962-3.77-37.833-3.77-19.693 0-40.346 4.308-20.654 4.308-43.654 12.923-14.256 5.744-22.462 18.5-8.205 12.756-8.205 28.628v9.948Zm321.436-64.154h164.872v-42.819H563.795v42.819Zm-206.649-42.819q21.018 0 35.885-14.987 14.866-14.988 14.866-36.013t-14.866-36.012q-14.867-14.988-35.885-14.988-21.018 0-36.005 14.977-14.987 14.976-14.987 36.151 0 20.897 14.987 35.885 14.987 14.987 36.005 14.987Zm206.649-61.488h164.872v-42.819H563.795v42.819ZM444.872-579.742h70.256v-230.002h-70.256v230.002ZM480-380Z" />
                    </svg>
                    <span class="menu-label">Profile</span>
                </a>
                <a href="{{ url('log-record.blade.php') }}" title="Audit Log">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                        <path
                            d="M279.966-411.077q12.085 0 20.521-8.402t8.436-20.487q0-12.085-8.402-20.521t-20.487-8.436q-12.085 0-20.521 8.402t-8.436 20.487q0 12.085 8.402 20.521t20.487 8.436Zm0-160.001q12.085 0 20.521-8.401 8.436-8.402 8.436-20.487 0-12.085-8.402-20.521-8.402-8.435-20.487-8.435-12.085 0-20.521 8.401-8.436 8.402-8.436 20.487 0 12.085 8.402 20.521 8.402 8.435 20.487 8.435Zm82.342 156.205h347.691v-50.254H362.308v50.254Zm0-160h347.691v-50.254H362.308v50.254Zm-17.435 434.872v-80H162.565q-25.788 0-44.176-18.388t-18.388-44.176v-474.87q0-25.788 18.388-44.176t44.176-18.388h634.87q25.788 0 44.176 18.388t18.388 44.176v474.87q0 25.788-18.388 44.176t-44.176 18.388H615.127v80H344.873ZM162.565-270.256h634.87q4.616 0 8.462-3.847 3.847-3.846 3.847-8.462v-474.87q0-4.616-3.847-8.462-3.846-3.847-8.462-3.847h-634.87q-4.616 0-8.462 3.847-3.847 3.846-3.847 8.462v474.87q0 4.616 3.847 8.462 3.846 3.847 8.462 3.847Zm-12.309 0v-499.488 499.488Z" />
                    </svg>
                    <span class="menu-label">Audit Log</span>
                </a>

            </div>
        </header>

