<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Store | Admin Login</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= URLROOT ?>/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= URLROOT ?>/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= URLROOT ?>/backend/css/adminlte.min.css">

    <title><?= SITENAME ? SITENAME . (isset($data['title']) != null ? ' | ' . $data['title'] : '') : '' ?></title>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= URLROOT ?>" class="h1"><b>E-STORE</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= URLROOT ?>/auth/login" method="post">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($data['usernameError'])) : ?>
                        <span class="text-danger">
                            <?= $data['usernameError'] ?>
                        </span>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($data['passwordError'])) : ?>
                        <span class="text-danger">
                            <?= $data['passwordError'] ?>
                        </span>
                        <?php endif ?>

                    </div>

                    <div class="row" style="justify-content: center">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-2" style="justify-content: center">
                <p><a href="<?= URLROOT ?>">Home Page</a></p>
            </div>
        </div>
    </div>

    <script src="<?= URLROOT ?>/backend/plugins/jquery/jquery.min.js"></script>
    <script src="<?= URLROOT ?>/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URLROOT ?>/backend/js/adminlte.min.js"></script>
</body>

</html>