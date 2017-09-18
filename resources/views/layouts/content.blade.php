<div class="grid-container">
    <div class="callout primary">
        <div class="page-title">
            <span>
                <i class="page-icon @yield('page-icon')"></i>
                <strong>@yield('page-title')</strong>
            </span>
            <span class="label primary view-id">
                @lang('app.view_id'): {{ kebab_case( config('app.name') ) }}-@yield('view-id')
            </span>
        </div>
        <div class="callout">
            @yield('content')
        </div>
    </div>
</div>