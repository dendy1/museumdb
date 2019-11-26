<form method="post" action="/admin/edit/location">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Наименование">
        </div>

        <div class="form-group">
            <label for="address">Адрес</label>
            <input name="address" id="address" type="text" class="form-control" placeholder="Адрес">
        </div>

        <div class="form-group">
            <label for="type">Тип</label>
            <input name="type" id="type" type="text" class="form-control" placeholder="Тип">
        </div>

        <div class="nav form-group justify-content-end">
            <button type="submit" id="postButton" class="btn btn-success">Сохранить</button>
            <a href="/admin/show/locations" id="backButton" class="btn btn-danger">Вернуться</a>
        </div>

    </div>
</form>