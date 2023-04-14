<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach(Auth::user()->role->menu as $menu)

            @if(count($menu->submenu) > 0)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#{{$menu->route}}" aria-expanded="false" aria-controls="ui-basic">
                    <i class="{!!$menu->icon!!} mr-2"></i>
                    <span class="menu-title">{{$menu->menu}}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="{{$menu->route}}">
                    <ul class="nav flex-column sub-menu">
                        @foreach($menu->submenu as $submenu)
                        
                        <li class="nav-item"> <a class="nav-link" href="{{$submenu->route}}">{{$submenu->submenu}}</a></li>
                        
                        @endforeach
                    </ul>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{$menu->route}}">
                    <i class="{!!$menu->icon!!} mr-2"></i>
                    <span class="menu-title">{{$menu->menu}}</span>
                </a>
            </li>
            @endif

        @endforeach
        
    </ul>
</nav>