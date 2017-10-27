<div class="row">
    <div class="col-lg-6"></div>
    <div class="col-lg-6">
        <div class="card my-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <form action="<?php echo URL;?>login/run" method="post">
                    <div class="form-group">
                    Email<br> <input type="email" name="email" id="">
                    </div>
            <div class="form-group">
                Senha<br> <input type="password" name="password" id="">
            </div>
            <input type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
</div>