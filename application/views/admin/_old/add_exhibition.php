<form method="post" action="/admin/add/exhibition">
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
            <label for="country">Страна</label>
            <input name="country" id="country" type="text" class="form-control" placeholder="Страна">
        </div>

        <div class="form-group">
            <label for="town">Город</label>
            <input name="town" id="town" type="text" class="form-control" placeholder="Город">
        </div>

        <div class="form-group">
            <label for="place">Место проведения</label>
            <input name="place" id="place" type="text" class="form-control" placeholder="Место проведения">
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="start_date">Дата начала:</label>
            <div class="col-xs-9">
                <input type="date" min="2015-01-01" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="start_date" name="start_date"
                       placeholder="Выберите дату начала" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="end_date">Дата конца:</label>
            <div class="col-xs-9">
                <input type="date" min="2015-01-01" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="end_date" name="end_date"
                       placeholder="Выберите дату конца" required>
            </div>
        </div>

        <div class="form-group">
            <label for="exhibits_id[]">Экспонаты</label>
            <select class="form-control" id="exhibits_id[]" name="exhibits_id[]" multiple>
                <?php foreach ($exhibits as $exhibit): ?>
                    <option value="<?php echo $exhibit['exhibit_id']; ?>"><?php echo $exhibit['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="holder">ФИО ответственного</label>
            <input name="holder" id="holder" type="text" class="form-control" placeholder="ФИО">
        </div>

        <div class="form-group">
            <button type="submit" id="postButton" class="btn btn-success">Организовать</button>
        </div>

    </div>
</form>