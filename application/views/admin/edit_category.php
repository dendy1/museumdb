<form method="post" action="/admin/edit/category/<?php echo $category['category_id']; ?>">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input name="name" id="name" type="text" class="form-control" placeholder="Наименование" value="<?php echo $category['category']; ?>">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="10" class="form-control" placeholder="Описание"><?php echo $category['description']; ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Сохранить</button>
        </div>
    </div>
</form>