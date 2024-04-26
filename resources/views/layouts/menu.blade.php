<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('nav.home')}}</p>
    </a>
</li>


@role('admin')
@include('partials.admin')
@endrole


