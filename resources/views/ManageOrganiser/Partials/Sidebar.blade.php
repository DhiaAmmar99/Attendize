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
                    <span class="figure"><i class="ico-money"></i></span>
                    <span class="text">Streams</span>
                </a>
            </li>
            <li class="{{ Request::is('*typeofsessions*') ? 'active' : '' }}">
                <a href="{{route('typeofsessions', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text">type of sessions</span>
                </a>
            </li>
            <li class="{{ Request::is('*events*') ? 'active' : '' }}">
                <a href="{{route('showOrganiserEvents', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-checkbox-checked"></i></span>
                    <span class="text">Sessions</span>
                </a>
            </li>

            {{-- <li class="{{ Request::is('*customize*') ? 'active' : '' }}">
                <a href="{{route('showOrganiserCustomize', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text"> CUSTOMIZE</span>
                </a>
            </li> --}}

            <li class="{{ Request::is('*programs*') ? 'active' : '' }}">
                <a href="{{route('programs', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-code"></i></span>
                    <span class="text">Programs</span>
                </a>
            </li>
            <li class="{{ Request::is('*speakers*') ? 'active' : '' }}">
                <a href="{{route('speakers', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-bullhorn"></i></span>
                    <span class="text">speakers</span>
                </a>
            </li>
            <li class="{{ Request::is('*chairs*') ? 'active' : '' }}">
                <a href="{{route('chairs', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-user"></i></span>
                    <span class="text">chairs</span>
                </a>
            </li>
            <li class="{{ Request::is('*sponsors*') ? 'active' : '' }}">
                <a href="{{route('sponsors', array('organiser_id' => $organiser->id))}}">
                    <span class="figure"><i class="ico-ticket"></i></span>
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
