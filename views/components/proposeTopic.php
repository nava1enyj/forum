<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Предложить тему</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Предложите тему , а администратор ее добавит если ему захочется
        </div>
        <div class="mt-3">
            <form action="/Theme/addingTheme" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пару слов почему вы хотите ее добавить</label>
                    <textarea type="textarea" class="form-control" name="description" required></textarea>
                </div>
                <div class="msg text-danger mb-4"></div>
                <button type="submit" class="btn btn-primary">Предложить</button>
            </form>
        </div>
    </div>
</div>