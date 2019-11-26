<form method="post" action="/admin/add/location">
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

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Добавить</button>
        </div>

    </div>
</form>