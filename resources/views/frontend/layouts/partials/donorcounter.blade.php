<section class="fact-counter-wrapper sec-padding parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 fact-inner">
                <h2>আমরা বিগত <b>১০ বছর</b> <br>ধরে বিভিন্ন্য রক্তদান কর্মসুচির মাধ্যমে মানুষের পাশে আছি।</h2>
                <a href="{{ route('donor.registration') }}" class="thm-btn inverse">আপনিও যদি আমাদের সাথে থকতে চান।</a>
            </div>
            <div class="col-lg-6 col-md-12 md-text-center">
                <div class="single-fact">
                    <div class="icon-box">
                        <i class="flaticon-shapes-2"></i>
                    </div>
                    <span class="timer" data-from="0" data-to="{{ $donors->count() }}" data-speed="5000" data-refresh-interval="50">365</span>
                    <p>মোট রক্তদাতা</p>
                </div>
                <div class="single-fact">
                    <div class="icon-box">
                        <i class="flaticon-people-3"></i>
                    </div>
                    <span class="timer" data-from="0" data-to="{{ $activedonorcount }}" data-speed="5000" data-refresh-interval="50">155</span>
                    <p>সক্রিয় রক্তদাতা</p>
                </div>
                <div class="single-fact">
                    <div class="icon-box">
                        <i class="flaticon-hands"></i>
                    </div>
                    <span class="timer" data-from="0" data-to="155" data-speed="5000" data-refresh-interval="50">2200</span>
                    <p>বর্তমান রক্তের আবেদন</p>
                </div>
            </div>
        </div>
    </div>
</section>
