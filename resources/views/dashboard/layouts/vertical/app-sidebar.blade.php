    <!--aside open-->
    <aside class="app-sidebar">
        <div class="app-sidebar__logo">
            <a class="header-brand" href="{{ url('index') }}">

                <img src="{{ $appLogo ? $appLogo : asset('appLogo/family.png') }}" class="header-brand-img desktop-lgo"
                    alt="Azea logo" style="width: 200 ,height:200">

                <img src="{{ $appLogo ? $appLogo : asset('appLogo/family.png') }}" class="header-brand-img dark-logo"
                    alt="Azea logo" style="width: 200 ,height:200">

                {{-- <img src="{{ asset('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                    alt="Azea logo"> --}}
                {{-- <img src="{{ asset('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo"
                    alt="Azea logo"> --}}
            </a>
        </div>

        <ul class="side-menu app-sidebar3">

            <li class="side-item side-item-category">@lang('Main')</li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                    </svg>
                    <span class="side-menu__label">@lang('Main Page')</span></a>
            </li>

            <li class="side-item side-item-category">@lang('Categories')</li>

            {{-- <li class="side-item side-item-category">قسم المسؤلين</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M18,11.09V6.27L10.5,3L3,6.27v4.91c0,4.54,3.2,8.79,7.5,9.82 c0.55-0.13,1.08-0.32,1.6-0.55C13.18,21.99,14.97,23,17,23c3.31,0,6-2.69,6-6C23,14.03,20.84,11.57,18,11.09z M11,17 c0,0.56,0.08,1.11,0.23,1.62c-0.24,0.11-0.48,0.22-0.73,0.3c-3.17-1-5.5-4.24-5.5-7.74v-3.6l5.5-2.4l5.5,2.4v3.51 C13.16,11.57,11,14.03,11,17z M17,21c-2.21,0-4-1.79-4-4c0-2.21,1.79-4,4-4s4,1.79,4,4C21,19.21,19.21,21,17,21z"
                            fill-rule="evenodd" />
                    </svg>
                    <span class="side-menu__label">@lang('Admins')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">

                    @if (auth()->user()->hasPermission('admins-read'))
                        <li><a href="{{ route('admins.index') }}" class="slide-item">@lang('All Admins')</a></li>
                    @else
                        <li><a href="#" class="slide-item">@lang('All Admins')</a></li>
                    @endif

                    @if (auth()->user()->hasPermission('admins-create'))
                        <li><a href="{{ route('admins.create') }}" class="slide-item">@lang('Add new admin')</a></li>
                    @else
                        <li><a href="#" class="slide-item">@lang('Add new admin')</a></li>
                    @endif


                </ul>
            </li>

            {{-- <li class="side-item side-item-category">قسم الصلاحيات </li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
                    </svg>

                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                        <path
                            d="M 12 1 C 8.6761905 1 6 3.6761905 6 7 L 6 8 C 4.9069372 8 4 8.9069372 4 10 L 4 20 C 4 21.093063 4.9069372 22 6 22 L 18 22 C 19.093063 22 20 21.093063 20 20 L 20 10 C 20 8.9069372 19.093063 8 18 8 L 18 7 C 18 3.6761905 15.32381 1 12 1 z M 12 3 C 14.27619 3 16 4.7238095 16 7 L 16 8 L 8 8 L 8 7 C 8 4.7238095 9.7238095 3 12 3 z M 6 10 L 18 10 L 18 20 L 6 20 L 6 10 z M 12 13 C 10.9 13 10 13.9 10 15 C 10 16.1 10.9 17 12 17 C 13.1 17 14 16.1 14 15 C 14 13.9 13.1 13 12 13 z" />
                    </svg> --}}
                    <span class="side-menu__label">@lang('Permissions')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu">
                    @if (auth()->user()->hasPermission('roles-read'))
                        <li><a href="{{ route('roles.index') }}" class="slide-item">@lang('All permissions')</a></li>
                    @endif
                </ul>
            </li>

            {{-- <li class="side-item side-item-category">قسم المستخدمين</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.67,13.13C18.04,14.06,19,15.32,19,17v3h4v-3C23,14.82,19.43,13.53,16.67,13.13z" />
                            <path
                                d="M15,12c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4c-0.47,0-0.91,0.1-1.33,0.24C14.5,5.27,15,6.58,15,8s-0.5,2.73-1.33,3.76 C14.09,11.9,14.53,12,15,12z" />
                            <path
                                d="M9,12c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4S5,5.79,5,8C5,10.21,6.79,12,9,12z M9,6c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2 S7,9.1,7,8C7,6.9,7.9,6,9,6z" />
                            <path
                                d="M9,13c-2.67,0-8,1.34-8,4v3h16v-3C17,14.34,11.67,13,9,13z M15,18H3l0-0.99C3.2,16.29,6.3,15,9,15s5.8,1.29,6,2V18z" />
                        </g>
                    </svg>

                    {{-- <svg width="24" height="24" viewBox="0 0 24 24" class="side-menu__icon"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="User / User_02">
                            <path id="Vector"
                                d="M20 21C20 18.2386 16.4183 16 12 16C7.58172 16 4 18.2386 4 21M12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg> --}}

                    <span class="side-menu__label">@lang('Users')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">
                    @if (auth()->user()->hasPermission('users-read'))
                        <li><a href="{{ route('users.index') }}" class="slide-item">@lang('Users list')</a></li>
                    @endif
                    @if (auth()->user()->hasPermission('users-create'))
                        <li><a href="{{ route('users.create') }}" class="slide-item">@lang('Add new user')</a></li>
                    @endif
                </ul>
            </li>

            {{-- <li class="side-item side-item-category">قسم الأخبار</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22,3l-1.67,1.67L18.67,3L17,4.67L15.33,3l-1.66,1.67L12,3l-1.67,1.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3v16 c0,1.1,0.9,2,2,2l16,0c1.1,0,2-0.9,2-2V3z M11,19H4v-6h7V19z M20,19h-7v-2h7V19z M20,15h-7v-2h7V15z M20,11H4V8h16V11z" />
                        </g>
                    </svg>
                    <span class="side-menu__label">@lang('Reports management')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">

                    <li><a href="{{ route('reports.index') }}" class="slide-item">@lang('All Reports')</a>
                    </li>

                </ul>
            </li>


            {{-- <li class="side-item side-item-category">قسم ادارة الوثائق</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M20,6h-8l-2-2H4C2.9,4,2.01,4.9,2.01,6L2,18c0,1.1,0.9,2,2,2h16.77c0.68,0,1.23-0.56,1.23-1.23V8C22,6.9,21.1,6,20,6z M20,18L4,18V6h5.17l2,2H20V18z M18,12H6v-2h12V12z M14,16H6v-2h8V16z" />
                    </svg>
                    <span class="side-menu__label">@lang('Document management')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">

                    <li><a href="{{ route('documents.index') }}" class="slide-item">@lang('All Documents')</a></li>

                </ul>
            </li>

            {{-- <li class="side-item side-item-category">قسم ادارة الصور والألبومات</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M20 4v12H8V4h12m0-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 9.67l1.69 2.26 2.48-3.1L19 15H9zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z" />
                    </svg>
                    <span class="side-menu__label">@lang('Manage photos and albums')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">

                    <li><a href="{{ route('alpums.index') }}" class="slide-item">@lang('All Alpums')</a></li>

                </ul>
            </li>


            {{-- <li class="side-item side-item-category">قسم أفراد العائلة </li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <g xmlns="http://www.w3.org/2000/svg">
                            <rect fill="none" height="24" width="24" />
                            <path
                                d="M16,4c0-1.11,0.89-2,2-2s2,0.89,2,2s-0.89,2-2,2S16,5.11,16,4z M20,22v-6h2.5l-2.54-7.63C19.68,7.55,18.92,7,18.06,7h-0.12 c-0.86,0-1.63,0.55-1.9,1.37l-0.86,2.58C16.26,11.55,17,12.68,17,14v8H20z M12.5,11.5c0.83,0,1.5-0.67,1.5-1.5s-0.67-1.5-1.5-1.5 S11,9.17,11,10S11.67,11.5,12.5,11.5z M5.5,6c1.11,0,2-0.89,2-2s-0.89-2-2-2s-2,0.89-2,2S4.39,6,5.5,6z M7.5,22v-7H9V9 c0-1.1-0.9-2-2-2H4C2.9,7,2,7.9,2,9v6h1.5v7H7.5z M14,22v-4h1v-4c0-0.82-0.68-1.5-1.5-1.5h-2c-0.82,0-1.5,0.68-1.5,1.5v4h1v4H14z" />
                        </g>
                    </svg>
                    <span class="side-menu__label">@lang('Family Members')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu ">

                    <li><a href="{{ route('members.index') }}" class="slide-item">@lang('All Family Members')</a></li>

                </ul>
            </li>

            {{-- <li class="side-item side-item-category">الصفحاااات</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z" />
                    </svg>
                    <span class="side-menu__label">@lang('Pages')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ url('staticpage') }}" class="slide-item">@lang('Static Pages')</a>
                    </li>
                    <li><a href="{{ url('fqapage') }}" class="slide-item">@lang('FQA Page')</a>
                    </li>
                    @if (auth()->user()->hasPermission('sliders-read'))
                        <li><a href="{{ route('sliders') }}" class="slide-item">@lang('Sliders')</a>
                        </li>
                    @endif
                </ul>
            </li>

            {{-- <li class="side-item side-item-category">قسم التواصل</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('contact.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon " width="24" height="24"
                        viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M11 23.59v-3.6c-5.01-.26-9-4.42-9-9.49C2 5.26 6.26 1 11.5 1S21 5.26 21 10.5c0 4.95-3.44 9.93-8.57 12.4l-1.43.69zM11.5 3C7.36 3 4 6.36 4 10.5S7.36 18 11.5 18H13v2.3c3.64-2.3 6-6.08 6-9.8C19 6.36 15.64 3 11.5 3zm-1 11.5h2v2h-2zm2-1.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z" />
                    </svg>
                    <span class="side-menu__label">@lang('Contact Us')</span></a>
                {{-- <ul class="slide-menu">
                    <li><a href="{{ url('element-border') }}" class="slide-item">تواصل معنا</a>
                    </li>
                </ul> --}}
            </li>

            {{-- <li class="side-item side-item-category">الاعدادات</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg" d="M0 0h24v24H0V0z" fill="none" />
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                    </svg>
                    <span class="side-menu__label">@lang('Settings')</span><i
                        class="angle fe fe-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ url('publicSetting') }}" class="slide-item">@lang('Public Setting')</a>
                    </li>
                    <li><a href="{{ url('socialSetting') }}" class="slide-item">@lang('Social Setting')</a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>
    <!--aside closed-->
