<template>
    <div>
        <nav class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
					                        <span class="float-right">
					                          <a href="" class="text-dark">
					                            <small>Clear All</small>
					                          </a>
					                        </span>
                                    Notification
                                </h5>
                            </div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 497px;">
                                <div class="slimscroll noti-scroll" style="overflow: hidden; width: auto; height: 497px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="https://coderthemes.com/greeva/layouts/vertical/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="https://coderthemes.com/greeva/layouts/vertical/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>
                                <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 124.178px;">

                                </div>
                                <div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">

                                </div>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="https://coderthemes.com/greeva/layouts/vertical/assets/images/users/avatar-4.jpg" alt="user" class="rounded-circle">
                            <span class="ml-1">Dragus P. <i class="mdi mdi-chevron-down"></i>
                      </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-34px, 70px, 0px);">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <a href="/team" class="dropdown-item notify-item">
                                <i class="fas fa-sitemap"></i>
                                <span>Our team</span>
                            </a>
                            <!-- item-->
                            <a href="/profile" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="/settings" class="dropdown-item notify-item">
                                <i class="fas fa-cogs"></i>
                                <span>Settings</span>
                            </a>
                            <!-- item-->
                            <a href="/tickets" class="dropdown-item notify-item">
                                <i class="fas fa-headset"></i>
                                <span>Support FrontDesk</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fas fa-lock"></i>
                                <span>Lock Screen</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                            <i class="fas fa-cog"></i>
                        </a>
                    </li>
                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <a href="/" class="logo">
                    <span class="logo-lg">
                      <img src="https://coderthemes.com/greeva/layouts/vertical/assets/images/logo-light.png" alt="" height="20">
                    </span>
                            <span class="logo-sm">
                      <img src="https://coderthemes.com/greeva/horizontal/default/assets/images/logo_sm.png" alt="" height="28">
                    </span>
                        </a>
                    </li>

                    <li class="app-search">
                        <form>
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="sr-only"></button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="topbar-menu active">
            <div class="container-fluid in">
                <div id="navigation" class="">
                    <!-- Start navigation menu -->
                    <ul class="navigation-menu">
                        <li class="active">
                            <router-link to="/" class="active">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </router-link>
                        </li>

                        <li class="active">
                            <router-link to="/contacts">
                                <i class="far fa-user"></i>
                                Contacts
                            </router-link>
                        </li>

												<li>
                            <router-link to="/customers">
                                <i class="far fa-building"></i>
                                Customers
                            </router-link>
                        </li>

                        <li class="has-submenu">
                            <router-link to="/invoices" @mouseover="hover = true"
                                         @mouseleave="hover = false">
                                <i class="fas fa-hand-holding-usd"></i>
                                Financial
                            </router-link>

                            <ul class="submenu" v-if="hover" :class="{ active: hover }">
                                <li>
                                    <a href="layouts-topbar-light.html">Topbar Light</a>
                                </li>
                                <li>
                                    <a href="layouts-center-menu.html">Center Menu</a>
                                </li>
                                <li>
                                    <a href="layouts-normal-header.html">Unsticky Header</a>
                                </li>
                                <li>
                                    <a href="layouts-boxed.html">Boxed</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <router-link to="/projects">
                                <i class="fas fa-project-diagram"></i>
                                Projects
                            </router-link>
                        </li>

                        <li class="">
                            <router-link to="/quotes">
                                <i class="fas fa-file-invoice"></i>
                                Quotes
                            </router-link>
                        </li>

                        <li class="">
                            <router-link class="nav-link" to="/tasks">
                                <i class="fas fa-users"></i>
                                Tasks
                            </router-link>
                        </li>
                    </ul>
                    <!-- End navigation menu -->

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                hover: false,
            }
        },
        methods: {
            iconClass() {
                return this.showMenu ? 'icon-close' : 'icon-menu';
            }
        }
    }
</script>
