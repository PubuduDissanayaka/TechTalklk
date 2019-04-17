<br>
<ul class="sidebar-menu list-unstyled">
<li class="sidebar-list-item"><a href="/home" class="sidebar-link text-muted {{ Request::is('home') ? "active" : ""}}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
    <li class="sidebar-list-item"><a href="/blog-posts" class="sidebar-link text-muted {{ Request::is('blog-posts') ? "active" : ""}}"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Blog Posts</span></a></li>
    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="events" href="#" data-toggle="collapse" data-target="#events"><i class="o-table-content-1 mr-3 text-gray"></i><span>Events</span></a>
        <div class="collapse" id="events">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('events') ? "active" : ""}}" href="/events">All Events</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('events/create') ? "active" : ""}}" href="/events/create">Create event</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>
    <li class="sidebar-list-item"><a href="charts.html" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
    <li class="sidebar-list-item"><a href="forms.html" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
    {{-- <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Pages</span></a>
    <div id="pages" class="collapse">
    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page one</a></li>
        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page two</a></li>
        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page three</a></li>
        <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page four</a></li>
    </ul>
    </div>
</li> --}}
    <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
</ul>
<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
<ul class="sidebar-menu list-unstyled">
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Demo</span></a></li>
</ul>
