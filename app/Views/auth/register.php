<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="container" style="height:100vh;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <h4>Sign Up</h4>
            <!-- Session messages -->
            <?php if (!empty(session()->getFlashData('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashData('success'); ?></div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashData('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashData('fail'); ?></div>
            <?php endif ?>
            <form action="<?= base_url('/auth/save'); ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <!-- Name -->
                <?php $input = 'name'; ?>
                <div class="form-group">
                    <label for="<?= $input; ?>">Name</label>
                    <input type="text" name="<?= $input; ?>" id="<?= $input; ?>" class="form-control" value="<?= set_value($input); ?>">
                    <small class="text-danger">
                        <?= isset($validation) ? display_error($validation, $input) : ''; ?>
                    </small>
                </div>
                <!-- Email -->
                <?php $input = 'email'; ?>
                <div class="form-group">
                    <label for="<?= $input; ?>">Email</label>
                    <input type="email" name="<?= $input; ?>" id="<?= $input; ?>" class="form-control" value="<?= set_value($input); ?>" placeholder="mail@example.com">
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
                <!-- Password Confirm -->
                <?php $input = 'password_confirm'; ?>
                <div class="form-group">
                    <label for="<?= $input; ?>">Password Confirm</label>
                    <input type="password" name="<?= $input; ?>" id="<?= $input; ?>" class="form-control">
                    <small class="text-danger">
                        <?= isset($validation) ? display_error($validation, $input) : ''; ?>
                    </small>
                </div>
                <!-- Submit btn -->
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Sign Up</button>
                </div>
                <a href="<?= site_url('/auth'); ?>">I already have an account, login now</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>