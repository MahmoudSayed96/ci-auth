<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>"><?= getEnv('app.name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isAuth()) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= auth()['name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="<?= base_url('/logout'); ?>">
                            Logout
                        </a>
                    </div>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/login'); ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/register'); ?>">Register</a>
                </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>