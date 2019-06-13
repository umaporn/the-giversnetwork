@extends('layouts.app')

@section('page-title', __('news-article.page_title.index'))
@section('page-description', __('news-article.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="news detail">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">news</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> About us
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="article padding-content">
        <div class="grid-x grid-margin-x">
            <article class="cell">
                <div class="grid-x grid-margin-x grid-margin-y large-margin-collapse">
                    <div class="cell small-12 text-center">
                        <h2>THE GIVER NETWORK</h2>
                    </div>
                    <div class="cell small-12">
                        <figure class="text-center margin-bottom-2">
                            <img src="{{ asset(config('images.about.about_01' )) }}">
                        </figure>
                    </div>
                    <div class="cell small-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh arcu. Morbi
                            sollicitudin turpis id nisi fermentum mollis.
                            Praesent elementum vulputate nibh ac hendrerit. Integer a metus vitae mauris semper finibus
                            ac vel tortor. Ut id odio lobortis, lacinia purus pharetra,
                            cursus metus. Fusce ultricies fringilla mauris, sed condimentum massa feugiat non. Fusce
                            faucibus, magna at auctor cursus, ipsum velit sollicitudin magna,
                            a vulputate mauris lorem vitae nunc. Sed efficitur ultricies leo, sit amet venenatis orci
                            ultrices non. Nam viverra neque nec risus dignissim consequat.
                            Nunc placerat odio dui. Sed lacinia convallis neque ac suscipit. Sed vitae condimentum ante.
                            Aliquam fringilla iaculis placerat. Cras consectetur neque id
                        </p>
                        <p>rutrum condimentum. Pellentesque urna felis, congue ut eros et, sagittis consectetur eros.
                            Praesent sed pharetra magna. Vivamus maximus sed turpis non venenatis.
                            Suspendisse mollis elementum eros, in fermentum dolor luctus eget. Aliquam dignissim, tortor
                            interdum consectetur sollicitudin, felis metus sagittis ante,
                            iaculis egestas sapien nunc ac ipsum. Etiam venenatis est eu lacus placerat placerat. Nullam
                            tempor lectus ac eros mollis dapibus. Nunc non rutrum tellus.
                            Aenean molestie suscipit metus, sit amet luctus nisl euismod suscipit. Duis venenatis mi sed
                            eros suscipit mattis. Curabitur eu nisi massa. Nullam feugiat tellus massa.
                        </p>
                        <p> Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis, ac
                            elementum purus mattis. Vestibulum a nisl non leo porttitor
                            hendrerit id sed ex. Aenean metus velit, tincidunt id luctus faucibus, ullamcorper vitae
                            erat. Phasellus sed fringilla odio, in sodales nulla. Sed sodales
                            tincidunt luctus. Suspendisse eget convallis nisi. Mauris sagittis tincidunt efficitur.
                            Donec quis ligula ipsum. Nam egestas vel sapien at semper.
                            Pellentesque quis turpis sit amet justo sollicitudin condimentum in eu orci. Mauris aliquet
                            congue est, eget pulvinar metus lobortis eu.
                        </p>
                        <p> Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis, ac
                            elementum purus mattis. Vestibulum a nisl non leo porttitor
                            hendrerit id sed ex. Aenean metus velit, tincidunt id luctus faucibus, ullamcorper vitae
                            erat. Phasellus sed fringilla odio, in sodales nulla. Sed sodales
                            tincidunt luctus. Suspendisse eget convallis nisi. Mauris sagittis tincidunt efficitur.
                            Donec quis ligula ipsum. Nam egestas vel sapien at semper.
                            Pellentesque quis turpis sit amet justo sollicitudin condimentum in eu orci. Mauris aliquet
                            congue est, eget pulvinar metus lobortis eu.
                        </p>
                    </div>
                    <div class="grid-x cell small-12 margin-bottom-2 grid-margin-x grid-margin-y">
                        <div class="cell small-12 medium-6">
                            <figure>
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 100%;">
                            </figure>
                        </div>
                        <div class="cell small-12 medium-6">
                            <figure class="margin-bottom-2 ">
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 60%;">
                            </figure>
                            <figure>
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 100%;">
                            </figure>
                        </div>
                    </div>
                    
                    <div class="cell small-12">
                        <p> Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis, ac
                            elementum purus mattis. Vestibulum a nisl non leo porttitor
                            hendrerit id sed ex. Aenean metus velit, tincidunt id luctus faucibus, ullamcorper vitae
                            erat. Phasellus sed fringilla odio, in sodales nulla. Sed sodales
                            tincidunt luctus. Suspendisse eget convallis nisi. Mauris sagittis tincidunt efficitur.
                            Donec quis ligula ipsum. Nam egestas vel sapien at semper.
                            Pellentesque quis turpis sit amet justo sollicitudin condimentum in eu orci. Mauris aliquet
                            congue est, eget pulvinar metus lobortis eu.
                        </p>
                        <p> Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis, ac
                            elementum purus mattis. Vestibulum a nisl non leo porttitor
                            hendrerit id sed ex. Aenean metus velit, tincidunt id luctus faucibus, ullamcorper vitae
                            erat. Phasellus sed fringilla odio, in sodales nulla. Sed sodales
                            tincidunt luctus. Suspendisse eget convallis nisi. Mauris sagittis tincidunt efficitur.
                            Donec quis ligula ipsum. Nam egestas vel sapien at semper.
                            Pellentesque quis turpis sit amet justo sollicitudin condimentum in eu orci. Mauris aliquet
                            congue est, eget pulvinar metus lobortis eu.
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </section>

</section>


@endsection