@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif
@can('movimientossistema')
    

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
          @if( count(auth()->user()->unreadNotifications))
            <span class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>
          @endif
    </a>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <a href=" {{ route('markAsRead')}} " class="btn text-align-center elevation-4 btn-block mx-2 my-2 bg-success">Marcar todas como leidas</a>
        <div class="dropdown-divider"></div>
        <span class="dropdown-header text-cyan">Notificaciones sin leer</span>
        @forelse (auth()->user()->unreadNotifications as $notification )
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> El usuario {{ $notification->data['user_id']}}
            realizó la solicitud nro.: {{ $notification->data['id']}}
            <span class="float-right text-muted text-sm">{{ $notification->updated_at}}</span>
            <br>
        </a>
        @empty
        <span class="text-muted text-sm text-center p-3 ml-3">*******</span> 
            
        @endforelse
        
        <div class="dropdown-divider"></div>
        <span class="dropdown-header">Notificaciones leidas</span>
        
        @forelse (auth()->user()->readNotifications as $notification)
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> El usuario {{ $notification->data['user_id']}}
            realizó la solicitud nro.: {{ $notification->data['id']}}
            <span class="float-right text-muted text-sm">{{ $notification->updated_at}}</span>
        </a>
        @empty
            <span class="text-muted text-sm text-center p-3 ml-3">*******</span> 
        @endforelse
        
    </div>
</li>
@endcan
<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="{{ Auth::user()->adminlte_image() }}"
                 class="user-image img-circle elevation-2"
                 alt="{{ Auth::user()->name }}">
        @endif
        <span @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ Auth::user()->name }}
        </span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    <img src="{{ Auth::user()->adminlte_image() }}"
                         class="img-circle elevation-2"
                         alt="{{ Auth::user()->name }}">
                @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ Auth::user()->name }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @if($profile_url)
                <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user"></i>
                    {{ __('adminlte::menu.profile') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
