
@include('backend.partials.head')

@section('title' , 'mohammad sultan ')

<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 p-0">
                        <div class="card-header bg-transparent border-0">
                            <h2 class="error-code text-center mb-2">404</h2>
                            <h3 class="text-uppercase text-center">Page Not Found !</h3>
                        </div>
                        <div class="card-content">
                            <fieldset class="row py-2">
                                <div class="input-group col-12">
                                    <input type="text" class="form-control border-grey border-lighten-1 " placeholder="Search..." aria-describedby="button-addon2">
                                    <span class="input-group-append" id="button-addon2">
                           <button class="btn btn-secondary border-grey border-lighten-1" type="button"><i class="ft-search"></i></button>
                       </span>
                                </div>
                            </fieldset>
                            <div class="row py-2">
                                <div class="col-12 col-sm-6 col-md-6 mb-1">
                                    <a href="index.html" class="btn btn-primary btn-block"><i class="ft-home"></i> Home</a>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 mb-1">
                                    <a href="search-website.html" class="btn btn-danger btn-block"><i class="ft-search"></i>  Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <p class="text-muted text-center col-12 pb-1">© <span class="year">2021</span> <a href="#">Modern </a>Crafted with <i class="ft-heart pink"> </i> by <a href="http://themeforest.net/user/pixinvent/portfolio" target="_blank">PIXINVENT</a></p>
                                <div class="col-12 text-center">
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="la la-facebook"></span></a>
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="la la-twitter"></span></a>
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="la la-linkedin font-medium-4"></span></a>
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="la la-github font-medium-4"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>


@include('backend.partials.footer')
@include('backend.partials.footer_script')
