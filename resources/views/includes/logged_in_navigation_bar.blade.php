
<li class="nav-item dropdown">
    <a id="navbarDropdown  {{ setNavigationActiveClass('students*') }}" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Students <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item {{ setNavigationActiveClass('students') }} {{ setNavigationActiveClass('students/search*') }}" href="{{ url('/students') }}">
            List
        </a>
        <a class="dropdown-item {{ setNavigationActiveClass('students/create') }}" href="{{ url('/students/create') }}">
            New Student
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown {{ setNavigationActiveClass('student-classes/*') }}" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Classes <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item {{ setNavigationActiveClass('student-classes') }} {{ setNavigationActiveClass('student-classes/search*') }}" href="{{ url('/student-classes') }}">
            List
        </a>
        <a class="dropdown-item {{ setNavigationActiveClass('student-classes/create') }}" href="{{ url('/student-classes/create') }}">
            New Class
        </a>
        <a class="dropdown-item {{ setNavigationActiveClass('student-classes/create-multiple') }}" href="{{ url('/student-classes/create-multiple') }}">
            Multiple Class Entry
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown {{ setNavigationActiveClass('sections/*') }}" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Sections <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item {{ setNavigationActiveClass('sections') }} {{ setNavigationActiveClass('sections/search*') }}" href="{{ url('/sections') }}">
            List
        </a>
        <a class="dropdown-item {{ setNavigationActiveClass('sections/create') }}" href="{{ url('/sections/create') }}">
            New Section
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown {{ setNavigationActiveClass('assign-student-in-class') }}" class="nav-link" href="{{ url('/assign-student-in-class') }}">
        Assign Student in Class
    </a>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>