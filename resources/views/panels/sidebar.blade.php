{{-- Make simple each the menu --}}
@if(isset($menu['headerModule']))
    <li class="navigation-header">
        <span>{{ $menu['headerModule'] }}</span>
    </li>
@endif

{{-- Foreach menu item starts --}}
@if(isset($menu['url']))
    @php ($href = "href=".url($menu['url'])."") @endphp
    @php ($classArrow = "") @endphp
    @php ($isActive = (request()->is($menu['url'])) ? "active" : "") @endphp
@else
    @php ($href = "href=javascript:void(0);") @endphp
    @php ($classArrow = "has-arrow") @endphp
    @php ($isActive = "") @endphp
@endif

@if ((auth()->user()->can($menu['modulCode']) || auth()->user()->id == config('template.superUserID')) && !isset($menu['hide']) )
    <li class="nav-item {{ $isActive }}">
        <a {{ $href }} >
            @isset($menu['icon'])
                <i class="{{ $menu['icon'] }}"></i>
            @endisset

            
            <span class="menu-title">{{ $menu['title'] }}</span>

            {{-- Implement badge menu, for label in right position after title menu --}}
            @isset($menu['badge'])
                @php $badgeClasses = "badge badge-pill badge-primary float-right" @endphp
                <span class="{{ isset($menu['badgeClass']) ? $menu['badgeClass'].' test' : $badgeClasses.' notTest' }} ">{{$menu['badge']}}</span>
            @endisset
        </a>

        @isset($menu['subMenu'])
            <ul class="menu-content">
                @each('panels.sidebar', $menu['subMenu'], 'menu')
            </ul>
            
        @endisset
    </li>
@endif
{{-- Foreach menu item ends --}}