<aside class="sidebar sidebar-left sidebar-menu">
    <section class="content">
        <h5 class="heading">ORGANISER MENU</h5>

        <ul id="nav" class="topmenu">
            <li class="{{ Request::is('*dashboard*') ? 'active' : '' }}">
                <a href="{{route('showOrganiserDashboard', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">DASHBOARD</span>
                </a>
            </li>
            <li class="{{ Request::is('*streams*') ? 'active' : '' }}">
                <a href="{{route('streams', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">Streams</span>
                </a>
            </li>
            <li class="{{ Request::is('*typeofsessions*') ? 'active' : '' }}">
                <a href="{{route('typeofsessions', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text">type of sessions</span>
                </a>
            </li>
            <li class="{{ Request::is('*Session*') ? 'active' : '' }}">
                <a href="{{route('showOrganiserEvents', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">Sessions</span>
                </a>
            </li>

            {{-- <li class="{{ Request::is('*customize*') ? 'active' : '' }}">
                <a href="{{route('showOrganiserCustomize', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text"> CUSTOMIZE</span>
                </a>
            </li> --}}

            <li class="{{ Request::is('*program*') ? 'active' : '' }}">
                <a href="{{route('programs', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-code"></i></span>
                    <span class="text">Programs</span>
                </a>
            </li>
            <li class="{{ Request::is('*speaker*') ? 'active' : '' }}">
                <a href="{{route('speakers', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text">speakers</span>
                </a>
            </li>
            <li class="{{ Request::is('*sponsors*') ? 'active' : '' }}">
                <a href="{{route('sponsors', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-code"></i></span>
                    <span class="text">sponsors</span>
                </a>
            </li>
            <li class="{{ Request::is('*users*') ? 'active' : '' }}">
                <a href="{{route('list', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-table"></i></span>
                    <span class="text">users registrations</span>
                </a>
            </li>
            
        </ul>
    </section>
</aside>
