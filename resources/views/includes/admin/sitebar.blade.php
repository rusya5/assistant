<ul
    class="nav sidebar-menu flex-column"
    data-lte-toggle="treeview"
    role="menu"
    data-accordion="false"
>
    <li class="nav-item">
        <a href="{{route('admin.equipments-service.index')}}" class="nav-link">
            <i class="nav-icon bi bi-tools"></i>
            <p>Услуги и оборудования</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.chat.index')}}" class="nav-link">
            <i class="nav-icon bi bi-chat-dots"></i>
            <p>Chats</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.equipments-service.bookings')}}" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>Booking</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.prompt.index')}}" class="nav-link">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>Prompt</p>
        </a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a href="#" class="nav-link">--}}
{{--            <i class="nav-icon bi bi bi-table"></i>--}}
{{--            <p>--}}
{{--                Reviews--}}
{{--                <i class="nav-arrow bi bi-chevron-right"></i>--}}
{{--            </p>--}}
{{--        </a>--}}
{{--        <ul class="nav nav-treeview">--}}
{{--            @foreach(App\Enum\BranchEnum::slugToName() as 'sad => 'sad)--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('admin.equipments-service.index',['branch_slug' => 'sad'])}}" class="nav-link">--}}
{{--                        <i class="nav-icon bi bi-circle"></i>--}}
{{--                        <p>{{'sad'}}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </li>--}}
</ul>
