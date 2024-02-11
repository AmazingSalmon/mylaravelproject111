@if(Auth::check())
    Welcome, {{Auth::user()->name}} {{Auth::user()->lastname}} {{Auth::user()->patronymics}}
    @if(Auth::user()->role === 'teacher')
    who's teaching {{Auth::user()->teacher->subject}}!
    @elseif(Auth::user()->role === 'student')
    who's at {{Auth::user()->student->grade}} grade!
    @endif
@endif
