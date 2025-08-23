
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/auth-theme.css">
<div class="center-wrapper">
    <div class="form-card">
        <h2>Login</h2>

        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger"> <?= esc($error) ?> </div>
        <?php endif; ?>

        <?php if (isset($success) && $success): ?>
            <div class="alert alert-success"> <?= esc($success) ?> </div>
        <?php endif; ?>

        <form method="post" action="/login">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="<?= site_url('register') ?>">Register here</a></p>
    </div>
</div>
<?= $this->endSection() ?>
