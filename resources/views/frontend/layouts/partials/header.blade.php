<header class="header">
    <div class="container">
        <div class="logo pull-left">
            <a href="index.html">
                <img src="{{ URL::to($website->logo) }}" alt="Awesome Image"/>
            </a>
        </div>
        <div class="header-right-info pull-right clearfix">
            <div class="single-header-info header-hide-mobile-part">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="flaticon-interface-2"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>ই-মেইল</h3>
                    <p>{{ $website->email }}</p>
                </div>
            </div>
            <div class="single-header-info header-hide-mobile-part">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="flaticon-telephone"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>যোগাযোগ করুন</h3>
                    <p><b>+88{{ $website->phone }}</b></p>
                </div>
            </div>
            <div class="single-header-info">
                <!-- Modal: donate now Starts -->
                @auth

                @else
                    <a class="thm-btn" data-toggle="modal" href="#modal-donate-now">লগইন</a>
                    <div class="modal fade" id="modal-donate-now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog style-one" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">লগইন করুন</h4>
                            </div>
                            <div class="modal-body">
                                <div class="donation-form-outer">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ই-মেইল</label>
                                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="email" autofocus placeholder="আপনার ই-মেইল বসান">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">পাসওয়ার্ড</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="আপনার পাসওয়ার্ড বসান">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleCheck1">মনে রেখো!</label>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link pass-forget" href="{{ route('password.request') }}">
                                                    পাসওয়ার্ড ভুলে গেছেন?
                                                </a>
                                            @endif
                                        </div>
                                        <button type="submit" class="thm-btn">লগইন</button>
                                    </form>
                                    {{-- @auth
                                        <a class="thm-btn" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <p><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</p>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endauth --}}
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header> <!-- /.header -->
