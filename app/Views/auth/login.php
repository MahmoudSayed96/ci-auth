<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="container" style="height:100vh;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <h4>Sign In</h4>
            <?php if (!empty(session()->getFlashData('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
            <?php endif ?>
            <form action="<?= base_url('/auth/check'); ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <!-- Email -->
                <?php $input = 'email'; ?>
                <div class="form-group">
                    <label for="<?= $input; ?>">Email</label>
                    <input type="email" name="<?= $input; ?>" id="<?= $input; ?>" class="form-control"
                        placeholder="mail@example.com" value="<?= set_value($input); ?>">
                    <small class="text-danger">
                        <?= isset($validation) ? display_error($validation, $input) : ''; ?>
                    </small>
                </div>
                <!-- Password -->
                <?php $input = 'password'; ?>
                <div class="form-group">
                    <label for="<?= $input; ?>">Password</label>
                    <input type="password" name="<?= $input; ?>" id="<?= $input; ?>" class="form-control">
                    <small class="text-danger">
                        <?= isset($validation) ? display_error($validation, $input) : ''; ?>
                    </small>
                </div>
                <!-- Submit btn -->
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Sign In</button>
                </div>
                <a href="<?= site_url('/auth/register'); ?>">Have an account, create account</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>