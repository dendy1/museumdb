<form method="post" action="/admin/edit/category">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Наименование">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="10" class="form-control" placeholder="Описание"></textarea>
        </div>


        <div class="nav form-group justify-content-end">
            <button type="submit" id="postButton" class="btn btn-success">Сохранить</button>
            <a href="/admin/show/categories" id="backButton" class="btn btn-danger">Вернуться</a>
        </div>

    </div>
</form>