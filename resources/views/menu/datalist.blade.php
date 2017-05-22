<table class="data-table">
    <thead>
    <tr>
        <th class="width-60">@lang('menu.key')</th>
        <th class="width-60">@lang('menu.language')</th>
        <th class="width-10 sortable" data-sortby="type">{{ trans('button.edit') }}</th>
        <th class="width-10 sortable" data-sortby="type">{{ trans('button.delete') }}</th>
    </tr>
    </thead>
    <tbody id="data" class="row column small-up-2 medium-up-3">
    <tr>
    @foreach( $translation_key as $translation_keys )
        <tr>
            <td> {{ $translation_keys['key'] }} </td>
            <td> {{ $translation_keys['value'] }} </td>
            <td>
                <a href="{{ route('menu.edit', [ 'key' =>  $translation_keys['key'] ]) }}" title="{{ trans('button.edit') }}">
                    {{ trans('button.edit') }}
                </a>
            </td>
            <td>
                <a href="" title="{{ trans('button.delete') }}">
                    {{ trans('button.delete') }}
                </a>
            </td>
        </tr>
        @endforeach
        </tr>
    </tbody>
</table>