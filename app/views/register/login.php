<?php $this->start('head');?>
<meta content="test">
<?php $this->end();?>

<?php $this->start('body');?>
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Login Example</h1>
                <form action="<?=PROOT?>register/login" class="form" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on"> </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="login" class="btn btn-large btn-primary">
                    </div>
                    <div class="text-right">
                        <a href="<?=PROOT?>register/register" class="text-primary">Register new</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php $this->end();?>