<nav class="mainmenu-area stricky">
    <div class="container">
        <div class="navigation pull-left">
            <div class="nav-header">
                <ul>
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> হোম</a></li>
                    <li><a href="{{ route('blood.donor') }}">রক্তদাতা গণ</a></li>
                    <li><a href="{{ route('blood.need') }}">রক্ত প্রয়োজন</a></li>
                    <li><a href="#">ব্লাড ব্যাংক</a></li>
                    <li><a href="{{ route('blood.request') }}">আবেদন</a></li>
                    {{-- <li><a href="#">ভলেন্টিয়ার</a></li>
                    <li><a href="#">যোগাযোগ</a></li> --}}
                    <li><a href="{{ route('donor.registration') }}">নিবন্ধন</a></li>
                    <li class="dropdown">
                        <a href="#">আরো</a>
                        <ul class="submenu">
                            <li><a href="#">ব্লগ</a></li>
                            <li><a href="#">প্রশ্ন ও উত্তর</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-footer">
                <button><i class="fa fa-bars"></i></button>
            </div>
        </div>
    </div>
</nav> <!-- /.mainmenu-area -->
