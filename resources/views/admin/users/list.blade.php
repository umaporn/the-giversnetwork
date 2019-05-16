@extends('admin.layouts.app')

@section('page-title', __('user_admin.page_title.index'))
@section('page-description', __('user_admin.page_description.index'))

@section('content')
    <div class="hide-for-large"><br></div>
    <table class="hover stack">
        <thead>
        <tr>
            <th class="width-10">@lang('user.id')</th>
            <th class="width-40">@lang('user.email')</th>
            <th class="width-50">@lang('user.fullname')</th>
            <th class="width-5 text-center">@lang('user.user_management.delete')</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $users as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                <td class="text-center">
                        <form class="deletion" id="user-group-deletion-{{ $loop->iteration }}"
                              data-info="{{ $user->email }}"
                              data-deletion-confirmation-message="@lang('user.user_management.remove_confirmation')"
                              method="POST" action="{{ route('admin.user.destroy', ['user' => $user]) }}"
                        >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button type="submit" class="cursor-pointer" title="@lang('user.user_management.remove')">
                                <i class="fi-x-circle"></i>
                            </button>
                        </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="not-found" colspan="3">@lang('user.user_management.not_found_users')</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links('admin.pagination.normal') }}



@endsection
