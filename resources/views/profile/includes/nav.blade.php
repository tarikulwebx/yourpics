<div class="list-group">
    <a href="{{ route('profile.index') }}"
        class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }}" aria-current="true">
        Profile
    </a>
    <a href="{{ route('profile.edit', Auth::user()->slug) }}"
        class="list-group-item list-group-item-action {{ request()->is('profile/*/edit') ? 'active' : '' }}">Edit
        Profile</a>
    <a href="{{ route('profile.upload.create', Auth::user()->slug) }}"
        class="list-group-item list-group-item-action {{ request()->is('profile/*/new-upload') ? 'active' : '' }}">New
        Upload
    </a>
    <a href="{{ route('profile.uploads', Auth::user()->slug) }}"
        class="list-group-item list-group-item-action {{ request()->is('profile/*/uploads') ? 'active' : '' }}">Your
        Uploads
    </a>

    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">Logout</a>
</div>
