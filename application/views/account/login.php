<!-- start banner Area БАННЕР-->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Sign in
                </h1>
                <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/account/login"> Sign in</a></p>
            </div>
        </div>
    </div>
</section>

<!-- End banner Area -->
<section class="quote-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <form id="contactform" name="contactform" action="/account/login" method="post">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label class="control-label col-xs-3" for="login">Логин или E-Mail:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       class="form-control" id="login" name="login"
                                       placeholder="Введите логин" required>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label class="control-label col-xs-3" for="password">Пароль:</label>
                            <div class="col-xs-9">
                                <input type="password"
                                       class="form-control" id="password" name="password"
                                       placeholder="Введите пароль" required>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div id="success"></div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" id="loginButton" class="btn btn-success">Войти</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>