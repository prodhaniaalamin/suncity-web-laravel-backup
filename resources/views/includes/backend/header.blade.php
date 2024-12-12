<div id="kt_header" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-40px h-40px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2x mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="black" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('dashboard') }}" class="d-lg-none">
                <img alt="Logo" src="{{ image(dynamicData('logoFavicon')->getSetting('adminLogo')) }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1">
                            <a class="menu-link py-3" href="{{ route('/') }}">
                                <span class="menu-title">{{ isset($title) ? $title : 'Home' }}</span>
                            </a>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            @php
                $roles = [1 => 'Admin', 7 => 'Officer'];
                //$roles = [1 => 'Super Admin', 7 => 'Officer'];
            @endphp
            <h3 class="mt-7" style="color:#3F4254">
                {{ in_array(user()->role_id, [1, 7]) ? $roles[user()->role_id] : (user()->school ? user()->school->name : 'N/A') }}
            </h3>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::Notification icon dropdown buton-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu- wrapper-->
                        <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px position-relative"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">

                            <span class="svg-icon svg-icon-1">
                                <span class="svg-icon svg-icon-1">
                                    <i class="fas fa-bell" style="font-size: 25px;"></i>
                                </span>
                                <span style="display: none"
                                    class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink notification-bip"></span>
                            </span>
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                            style="">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                style="background-image:url('{{ assets('assets/backend/img/notification-background.jpg') }}');background-position: left">
                                @php
                                    use App\Models\RealtimeNotification;
                                    $unreadNotifications = user()->notifications ?: [];
                                    $notifications = RealtimeNotification::select(['id', 'title', 'content', 'created_at']);
                                    $notifications =
                                        role(1) === 1
                                            ? $notifications->where('send_type', 1)->get()
                                            : $notifications
                                                ->where(function ($query) {
                                                    $query->whereNull('send_type');
                                                })
                                                ->orWhere(function ($query) {
                                                    $query->where('send_type', role(1));
                                                })
                                                ->latest()
                                                ->take(5)
                                                ->get();
                                @endphp
                                <!--begin::Title-->
                                <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications
                                    <span class="fs-8 opacity-75 ps-3">{{ count($unreadNotifications) }}</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab panel-->
                                <div class="tab-pane fade show active" role="tabpanel">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column px-10">
                                        <div class="scroll-y mh-325px my-5" id="notifications">
                                            @foreach ($notifications as $row)
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack py-3">
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Title-->
                                                        <div class="mb-0 me-2">
                                                            <a href="{{ route('notifications.show', $row->id) }}"
                                                                class="fs-6 text-gray-800 text-{{ in_array($row->id, $unreadNotifications) ? 'hover-primary fw-bolder' : 'primary' }}">
                                                                {{ Str::length($row->title) > 15 ? Str::substr($row->title, 0, 15) . ' ...' : $row->title }}
                                                            </a>
                                                            {{-- <div class="text-gray-400 fs-7">{{ Str::length($row->content) > 20 ? Str::substr($row->content, 0, 20).' ...':$row->content }}</div> --}}
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Section-->
                                                    <span
                                                        class="badge badge-light fs-8">{{ $row->created_at->diffForHumans() }}</span>
                                                    <!--end::Label-->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="py-3 text-center border-top">
                                        <a href="{{ route('notifications.index') }}"
                                            class="btn btn-color-gray-600 btn-active-color-primary">View All
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13"
                                                        height="2" rx="1" transform="rotate(-180 18 13)"
                                                        fill="black"></rect>
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--End::notification icon button-->

                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            <img src="{{ image(user()->photo, 'user') }}" alt="user" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="user" src="{{ image(user()->photo, 'user') }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ user()->name }}
                                        </div>
                                        <a href="#"
                                            class="fw-bold text-muted text-hover-primary fs-7">{{ role()->name }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('profile') }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->


                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->


                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <form method="POST" action="{{ route('logout') }}">@csrf
                                    <a class="menu-link px-5" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Sign Out</a>
                                </form>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->

                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
