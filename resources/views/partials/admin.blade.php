@include('partials.common')
<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ Request::is('administration*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('nav.settings')
            <i class="fas fa-angle-left @if(app()->getLocale()=='en') right @else left @endif""></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('administration/users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>@lang('models/users.plural')</p>
            </a>
        </li>
        <!-- need to remove -->
        <li class="nav-item">
            <a href="{{ route('laravelroles::roles.index') }}"
               class="nav-link {{ Request::is('administration/roles') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>{{__('nav.roles')}}</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('academic-years.index') }}" class="nav-link {{ Request::is('academicYears*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>@lang('models/academicYears.plural')</p>
            </a>
        </li>
    </ul>

</li>

