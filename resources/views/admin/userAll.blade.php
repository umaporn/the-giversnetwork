
@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

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
                    @include('admin.menu_admin')
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
                                                <th>No</th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>00019</td>
                                                <td>Susan Young</td>
                                                <td>Young97@^</td>
                                                <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>00019</td>
                                                <td>Jacob Taylor</td>
                                                <td>Taylor83*}</td>
                                                <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>00019</td>
                                                <td>Tammy Soto</td>
                                                <td>TammyWow</td>
                                                <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>00019</td>
                                                <td>Emily Walker</td>
                                                <td>EmilyW</td>
                                                <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                                <nav aria-label="Pagination">
                                    <ul class="pagination text-center">
                                        <li class="pagination-previous disabled">Previous</li>
                                        <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                                        <li><a href="#" aria-label="Page 2">2</a></li>
                                        <li><a href="#" aria-label="Page 3">3</a></li>
                                        <li><a href="#" aria-label="Page 4">4</a></li>
                                        <li class="ellipsis"></li>
                                        <li><a href="#" aria-label="Page 12">12</a></li>
                                        <li><a href="#" aria-label="Page 13">13</a></li>
                                        <li class="pagination-next"><a href="#" aria-label="Next page">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection