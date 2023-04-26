<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Al-Quhiedan family " name="description">
		<meta content="Spruko Private Limited" name="author">
		<meta name="keywords" content="laravel ui admin template, laravel admin template, laravel dashboard template,laravel ui template, laravel ui, livewire, laravel, laravel admin panel, laravel admin panel template, laravel blade, laravel bootstrap5, bootstrap admin template, admin, dashboard, admin template">

		<!-- Title -->
		<title>Al-Quhiedan family </title>

        @include('dashboard.layouts.horizontal.styles')

    </head>

	<body class="app">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>
		<!--- End Global-loader-->

		<!-- Page -->
		<div class="page">
			<div class="page-main">

                @include('dashboard.layouts.horizontal.app-header')

                @include('dashboard.layouts.horizontal.horizontal-main')

                <!-- App-Content -->
				<div class="hor-content main-content">
                    <div class="container">

                @yield('content')

                    </div>
                </div>
            </div>

            @include('dashboard.layouts.footer')

            @yield('modal')

        </div>

        @include('dashboard.layouts.horizontal.scripts')

    </body>
</html>
