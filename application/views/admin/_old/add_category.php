<form method="post" action="/admin/add/category">
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

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Добавить</button>
        </div>

    </div>
</form>