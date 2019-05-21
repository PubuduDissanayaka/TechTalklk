<br>
<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">Menu</div>
<ul class="sidebar-menu list-unstyled">
<li class="sidebar-list-item"><a href="/home" class="sidebar-link text-muted {{ Request::is('home') ? "active" : ""}}"><h3><i class="fas fa-home"></i></h3><span class="mx-3">Home</span></a></li>
    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="blog-posts" href="#" data-toggle="collapse" data-target="#blog-posts"><h3><i class="fas fa-blog"></i></h3><span class="mx-3">Blog Post</span></a>
        <div class="collapse" id="blog-posts">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a href="/blog-posts" class="sidebar-link text-muted {{ Request::is('blog-posts') ? "active" : ""}}"><span>All Posts</span></a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('blog-posts/create') ? "active" : ""}}" href="/blog-posts/create">Create Blog Post</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>
    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="events" href="#" data-toggle="collapse" data-target="#events"><h3><i class="far fa-calendar-alt"></i></h3><span class="mx-3">Events</span></a>
        <div class="collapse" id="events">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('events') ? "active" : ""}}" href="/events">All Events</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('events/create') ? "active" : ""}}" href="/events/create">Create event</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>
    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="study" href="#" data-toggle="collapse" data-target="#study"><h3><i class="fas fa-graduation-cap"></i></h3><span class="mx-3">Study Plans</span></a>
        <div class="collapse" id="study">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('study') ? "active" : ""}}" href="/study">All Plans</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('study/create') ? "active" : ""}}" href="/study/create">Create Plan</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>

    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="vacancy" href="#" data-toggle="collapse" data-target="#vacancy"><h3><i class="fas fa-user-tie"></i></h3><span class="mx-3">Job Market</span></a>
        <div class="collapse" id="vacancy">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('vacancy') ? "active" : ""}}" href="/vacancy">All Job Vacancies</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('vacancy/create') ? "active" : ""}}" href="/vacancy/create">Create Vacancy</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>

    <li class="sidebar-list-item"><a class="sidebar-link text-muted" aria-expanded="true" aria-controls="forums" href="#" data-toggle="collapse" data-target="#forums"><h3><i class="fab fa-forumbee"></i></h3><span class="mx-3">Forums</span></a>
        <div class="collapse" id="forums">
          <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5 {{ Request::is('forums') ? "active" : ""}}" href="/forums">Forums</a></li>
            {{-- <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page three</a></li>
            <li class="sidebar-list-item"><a class="sidebar-link text-muted pl-lg-5" href="#">Page four</a></li> --}}
          </ul>
        </div>
    </li>

</ul>
{{-- <ul class="sidebar-menu list-unstyled">
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Demo</span></a></li>
    <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Demo</span></a></li>
</ul> --}}
