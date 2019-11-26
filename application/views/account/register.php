<!-- Start contact-page Area -->
<section class="quote-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <p>Для регистрации заполните форму ниже</p>

                <form id="contactform" name="contactform" action="/account/register" method="post">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label class="control-label col-xs-3" for="login">Логин:</label>
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

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label class="control-label col-xs-3" for="confirm_password">Подтвердите пароль:</label>
                            <div class="col-xs-9">
                                <input type="password"
                                       class="form-control" id="confirm_password" name="confirm_password"
                                       placeholder="Введите пароль ещё раз" required>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label class="control-label col-xs-3" for="email">E-Mail:</label>
                            <div class="col-xs-9">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Введите E-Mail" required>
                            </div>
                        </div>
                    </div>

                    <div id="success"></div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" id="sendButton" class="btn btn-success">Отправить</button>
                            <button type="reset" id="resetButton" class="btn btn-info">Очистить форму</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->