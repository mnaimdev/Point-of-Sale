<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mt-5">

            <ul class="metismenu mt-5" id="side-menu">

                <li>
                    <a href="index.html">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-person"></i><span> Employee Manage </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('employee') }}">Employee</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Employee Salary </span> <span
                            class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('advance.salary') }}">Advance Salary</a></li>
                        <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                        <li><a href="{{ route('month.salary') }}">Last Month Salary</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-cart-shopping"></i></i> <span> Customer Manage
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('customer') }}">Customer</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-car"></i><span> Supplier Manage
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('supplier') }}">Supplier</a></li>

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i><span> Employee
                            Attendence </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('attendence') }}">Attendence</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Category Manage
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('category') }}">Category</a></li>

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Product Manage
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('product') }}">Product</a></li>
                        <li><a href="{{ route('product.import') }}">Import Product</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);"><i class="fi-marquee-plus"></i><span
                            class="badge badge-success pull-right">Hot</span> <span> POS </span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="extras-timeline.html">Timeline</a></li>
                        <li><a href="extras-profile.html">Profile</a></li>

                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
