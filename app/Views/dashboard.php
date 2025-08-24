<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/landing.css">
<link rel="stylesheet" href="/css/dashboard.css">
<div class="landing-bg"></div>
<a href="/logout" class="dashboard-btn" title="Logout" aria-label="Logout">
	<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/></svg>
</a>
<div style="position: relative; z-index: 2; text-align: center; margin-top: 3rem;">
</div>
<?= $this->endSection() ?>
