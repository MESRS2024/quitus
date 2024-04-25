{{--
<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ Request::is('mails*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-mail-bulk"></i>
        <p>@lang('models/mails.menu_title')
            <i class="fas fa-angle-left @if(app()->getLocale()=='en') right @else left @endif"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('mails.index') }}" class="nav-link {{ Request::is('mails*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>@lang('models/mails.draft')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.arrived') }}"
               class="nav-link {{ Request::is('mails/arrived') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.arrived')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.income') }}"
               class="nav-link {{ Request::is('mails/income') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.income')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.outcome') }}"
               class="nav-link {{ Request::is('mails/outcome') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.outcome')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.needprocess') }}"
               class="nav-link {{ Request::is('mails/needProcess') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.needprocess')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.needdispatch') }}"
               class="nav-link {{ Request::is('mails/needDispatch') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.needdispatch')</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ Request::is('dossiers*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>@lang('models/dossiers.menu_title')
            <i class="fas fa-angle-left @if(app()->getLocale()=='en') right @else left @endif"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('dossiers.index') }}" class="nav-link {{ Request::is('dossiers*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder-minus"></i>
                <p>@lang('models/dossiers.plural')</p>
            </a>
        </li>
    </ul>
</li>
--}}
