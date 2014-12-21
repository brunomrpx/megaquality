<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-lg-offset-4">
                <div class="form-wrap">
                <h2>Login</h2>
                <?php echo $this->Form->create('User'); ?>
                    <div class="form-group">
                        <label for="username" class="sr-only">Usuário</label>
                        <input type="text" name="data[User][username]" id="UserUsername" class="form-control" placeholder="Usuário" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Senha</label>
                        <input type="password" name="data[User][password]" id="UserPassword" class="form-control" placeholder="Senha" required>
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Entrar">
                <?php echo $this->Form->end(); ?>
                <hr>
                </div>
            </div>
        </div>
    </div>
</section>
