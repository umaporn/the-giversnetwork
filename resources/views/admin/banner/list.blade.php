@forelse( $banners as $banner )
    <tr>
        <td>{{ $banner->id }}</td>
        <td>{{ $banner->title }}</td>
        <td>
            @if( $banner->image_path )
                <img src="{{ $banner->image_path }}" width="100" alt="{{ $banner->title }}">
            @endif
        </td>
        <td>
            @if($banner->status === 'public')
                <i class="far fa-check-square"></i>
            @else
                <i class="far fa-square"></i>
            @endif
        </td>
        <td><a href="{{ route('admin.banner.edit', [ 'banner' =>  $banner->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="banner-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $banner->id }}"
                  data-deletion-confirmation-message="@lang('banner_admin.banner_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.banner.destroy', ['banner' => $banner->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $banner->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('banner_admin.banner_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('banner_admin.banner_management.not_found_banner')</td>
    </tr>
@endforelse