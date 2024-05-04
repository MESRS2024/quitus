<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('nav.home')}}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('students.index') }}" class="nav-link {{ Request::is('students') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hat-cowboy"></i>
        <p>@lang('models/students.plural')</p>
    </a>
</li>
@role('qtcsd')
<li class="nav-item">
    <a href="{{ route('students.exonerated') }}" class="nav-link {{ Request::is('students/exonerated*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hat-cowboy"></i>
        <p>@lang('models/students.exonerated')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('students.not_exonerated') }}" class="nav-link {{ Request::is('students/not_exonerated*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-hat-cowboy"></i>
        <p>@lang('models/students.not_exonerated')</p>
    </a>
</li>
@endrole

@role('admin')
@include('partials.admin')
@endrole





