<table class="data-table">
    <thead>
    <tr>
        <th class="width-40">@lang('menu.key')</th>
        <th class="width-60">@lang('menu.language')</th>
        <th class="width-10 sortable" data-sortby="type">{{ trans('button.edit') }}</th>
    </tr>
    </thead>
    <tbody id="data" class="row column small-up-2 medium-up-3">
    <tr>
    @foreach( $translation as $translations )
        @foreach($translations as $key => $value)
            <tr>
                <td> {{ $key }} </td>
                <td> {{ $value }} </td>
                <td>
                    <a href="{{ route('menu.edit', [ 'key' =>  $key ]) }}" title="{{ trans('button.edit') }}">
                        {{ trans('button.edit') }}
                    </a>
                </td>
            </tr>
            @endforeach
            @endforeach
            </tr>
    </tbody>
</table>