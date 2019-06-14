@extends('layouts.app')

@section('page-title', __('about.page_title.index'))
@section('page-description', __('news-article.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="about detail">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">about</h2>
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
            <article class="cell margin-top-0">
                <div class="grid-x grid-margin-x grid-margin-y large-margin-collapse">
                    <div class="cell small-12 text-center">
                        <h2>THE GIVER NETWORK</h2>
                    </div>
                    <div class="cell small-12">
                        <figure class="text-center margin-bottom-1">
                            <img src="{{ asset(config('images.about.about_01' )) }}">
                        </figure>
                    </div>
                    <div class="cell small-12">
                        <p>
                            <strong>
                                We are Givers Dedicated to the Idea that Through sharing ideas,learning, and working
                                together, we can give better
                            </strong>
                        </p>
                        <p>The Givers Network is a collection of organizations and individuals that believe the best way
                            to increase the impact of our social giving is by combining our resources, knowledge, and
                            giving to create greater impact than each of us alone can achieve.
                            Guided by this ideal, the founding sponsors have created The Givers Network platform so that
                            all Givers can work together.
                        </p>
                        <h2> VISION</h2>
                        <p> To nurture and empower a network of givers to meet the key needs of individuals, society,
                            and the environment.
                        </p>
                        <h2>WHAT ARE WE GOING TO DO?</h2>
                        <div class="about-mission">
                            <p class="about-mission-text"> <strong>OUR MISSION </strong>
                                <span> The Givers Network has been established to nurture a community of
                                    charitable organizations and givers to….
                                </span>
                            </p>
                            <p>
                                <strong class="about-number">01.</strong>bring together giving communities, charities, and the general
                                public to meet the needs of individuals, communities, and the environment.
                            </p>
                            <p>
                                <strong class="about-number">02.</strong>exchange ideas and explore opportunities to create more
                                meaningful and impactful giving together.
                            </p>
                            <p>
                                <strong class="about-number">03.</strong>be a place that can provide inspiration, empowerment, and
                                support for Givers.
                            </p>
                            <p>
                                <strong class="about-number">04.</strong>provide a hub to increase access to shared resources.
                            </p>
                        </div>
                    </div>
                    <!-- <div class="grid-x cell small-12 margin-bottom-2 grid-margin-x grid-margin-y">
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
                    </div> -->
                </div>
            </article>
        </div>
    </section>

</section>


@endsection