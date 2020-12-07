<section class="top-bar">
    <div class="container">

        <div class="left-text pull-left">
            <p><span><i class="fa fa-envelope"></i></span> {{ $website->email }}
            </p>
        </div> <!-- /.left-text -->

        <div class="social-icons pull-right">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                @auth
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <li><a href="{{ route('admin.dashboard') }}" target="_blank"><i class="fa fa-user"></i></a></li>
                    @else
                        <li><a href="{{ route('home') }}" target="_blank"><i class="fa fa-user"></i></a></li>
                    @endif
                @endauth
            </ul>
        </div> <!-- /.social-icons -->
    </div>
</section> <!-- /.top-bar -->
