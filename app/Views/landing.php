<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/landing.css">
<div class="landing-bg">
    <div class="landing-overlay"></div>
    <div class="landing-info-box">
    <h1>Avatar Sandbox</h1>
        <p>Welcome! Avatar Sandbox is an interactive web app where you can create avatars, adopt pets, explore scenes, and interact with AI-driven characters. Start your journey now!</p>
        <div class="landing-actions">
            <a href="/register" class="btn btn-primary">Register</a>
            <a href="/login" class="btn btn-secondary">Login</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
