<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Логин</label>
                            <input type="text" class="form-control" id="loginEnt">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="passwordEnt">
                    </div>
                    <div class="msg text-danger mb-3" id="msg-login"></div>
                    <div class="mb-3"><a href="register">У вас еще нет аккаунта? Создайте его.</a></div>
                    <button type="submit" class="btn btn-primary" id="btn-entrance">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>