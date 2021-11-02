<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title" style="color: white">
            Better choice better life
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
             data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content" tabindex="0" style="right: -17px;">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li><a href="/home"><button>Move to User Home Page</button></a></li>
                </ul>
                <ul class="nav nav-main">
                    {{--                    <li class="nav-parent nav-active nav-expanded">--}}
                    <li class="nav-parent {{ request()->is('mobiles*') ? 'nav-expanded' : '' }}">
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Mobile</span>
                        </a>
                        <ul class="nav nav-children" style="">
                            <li class="{{ request()->is('mobiles/create') ? 'nav-active' : '' }}">
                                <a href="/mobiles/create">
                                    Create new mobile
                                </a>
                            </li>
                            <li class="{{ request()->is('mobiles/all') ? 'nav-active' : '' }}">
                                <a href="/mobiles/all">
                                    Show all product
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</aside>
