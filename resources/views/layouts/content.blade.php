<div class="row columns">
    <div class="callout primary">
        <div class="page-title row columns">
            <span>
                @yield('page-icon')
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