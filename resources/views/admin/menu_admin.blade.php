<ul class="accordion" data-accordion>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">My Profile</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.editProfile') }}"><i class="fas fa-caret-right"></i> Edit Profile</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">Learn</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.learnAll') }}"><i class="fas fa-caret-right"></i> All Learn</a>
            <a href="{{ route('admin.learnAdd') }}"><i class="fas fa-caret-right"></i> Add Learn</a>
        </div>
    </li>
    <li class="accordion-item is-active" data-accordion-item>
        <a href="#" class="accordion-title">Share</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.shareChAll') }}" class="is-active"><i class="fas fa-caret-right"></i> All Challenge</a>
            <a href="{{ route('admin.shareChAdd') }}"><i class="fas fa-caret-right"></i> Add Challenge</a>
            <a href="{{ route('admin.shareAll') }}"><i class="fas fa-caret-right"></i> All Share</a>
            <a href="{{ route('admin.shareAdd') }}"><i class="fas fa-caret-right"></i> Add Share</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">Give</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.giveAll') }}"><i class="fas fa-caret-right"></i> All Give</a>
            <a href="{{ route('admin.recAll') }}"><i class="fas fa-caret-right"></i> All Receive</a>
            <a href="{{ route('admin.giveAdd') }}"><i class="fas fa-caret-right"></i> Add Give & Recive</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">Event</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.eventAll') }}"><i class="fas fa-caret-right"></i> All Event</a>
            <a href="{{ route('admin.eventAdd') }}"><i class="fas fa-caret-right"></i> Add Event</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">News</a>
        <div class="accordion-content" data-tab-content>
            <a href="{{ route('admin.newsAll') }}"><i class="fas fa-caret-right"></i> All News</a>
            <a href="{{ route('admin.newsAdd') }}"><i class="fas fa-caret-right"></i> Add News</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">Organization</a>
        <div class="accordion-content" data-tab-content>
            <a href="#"><i class="fas fa-caret-right"></i> All Organization</a>
            <a href="#"><i class="fas fa-caret-right"></i> Add Organization</a>
        </div>
    </li>
    <li class="accordion-item" data-accordion-item>
        <a href="#" class="accordion-title">User</a>
        <div class="accordion-content" data-tab-content>
            <a href="#"><i class="fas fa-caret-right"></i> All User</a>
        </div>
    </li>
</ul>