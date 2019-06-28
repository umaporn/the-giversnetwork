@extends('admin.layouts.app')

@section('page-title', __('user_admin.page_title.index'))
@section('page-description', __('user_admin.page_description.index'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">Admin</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Users
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-3 xxlarge-2 show-for-large">
                        @include('admin.layouts.side_menu')
                    </div>
                    <div class="cell small-12 large-9 xxlarge-10">
                        <article class="user-content">
                            <div class="grid-x">
                                <div class="cell small-12">
                                    <div class="grid-x user-form-space admin-search">
                                        <h2 class="cell shrink user-head">All Users</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                            <div class="margin-left-1">
                                                <div class="input-group input-search">
                                                    <input class="input-group-field form-fill" type="text">
                                                    <div class="input-group-button">
                                                        <input type="button" class="button btn-blue" value="Search">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <section class="table-scroll table-admin">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="width-10">@lang('user.id')</th>
                                                <th class="width-40">@lang('user.email')</th>
                                                <th class="width-50">@lang('user.fullname')</th>
                                                <th class="width-50">@lang('user.username')</th>
                                                <th class="width-5 text-center">@lang('user.user_management.delete')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse( $users as $user )
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                                                    <td>{{ $user->username }}</td>
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
                                    </section>
                                    <nav aria-label="Pagination">
                                        {{ $users->links('admin.pagination.normal') }}
                                    </nav>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{ $users->links('admin.pagination.normal') }}



@endsection
