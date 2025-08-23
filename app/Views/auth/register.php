<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/auth-theme.css">
<div class="center-wrapper">
    <div class="form-card">
        <h2>User Registration</h2>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <?php 
                $fields = ['username' => 'Username', 'email' => 'Email', 'password' => 'Password', 'confirm_password' => 'Confirm Password'];
                foreach ($fields as $field => $label) {
                    $error = display_form_errors($validation, $field);
                    if ($error) {
                        echo '<div class="alert alert-danger">' . $label . ': ' . $error . '</div>';
                    }
                }
            ?>
        <?php endif; ?>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <?= form_open('register') ?>
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?= set_value('username') ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="<?= set_value('email') ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        <?= form_close() ?>

        <p class="mt-3">Already have an account? <a href="<?= site_url('login') ?>">Login here</a></p>
    </div>
</div>
<?= $this->endSection() ?>