<form method="post" action="/admin/edit/exhibit">
    <div class="container mx-auto">
        <div class="form-group">
            <h4><?php echo $page_title; ?></h4>
        </div>

        <div class="form-group">
            <label for="author">Автор</label>
            <input name="author" id="author" type="text" class="form-control" placeholder="Автор">
        </div>

        <div class="form-group">
            <label for="category">Категория</label>
            <input name="category" id="category" type="text" class="form-control" placeholder="Категория">
        </div>

        <div class="form-group">
            <label for="location">Местоположение</label>
            <input name="location" id="location" type="text" class="form-control" placeholder="Местоположение">
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="create_date">Дата создания:</label>
            <div class="col-xs-9">
                <input type="date" min="1000-01-01" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="create_date" name="create_date"
                       placeholder="Выберите дату создания" required>
            </div>
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
            <a href="/admin/show/exhibits" id="backButton" class="btn btn-danger">Вернуться</a>
        </div>

    </div>
</form>