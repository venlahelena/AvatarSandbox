<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/landing.css">
<link rel="stylesheet" href="/css/dashboard.css">
<div class="landing-bg"></div>
<div style="display: flex; justify-content: flex-end; align-items: flex-start; gap: 0.5rem; position: fixed; top: 1.5rem; right: 2rem; width: auto; z-index: 100;">
	<a href="/profile" class="dashboard-btn" title="Profile" aria-label="Profile">
		<!-- Profile icon -->
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#7c4dff" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20v-1a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v1"/></svg>
	</a>
	<a href="/logout" class="dashboard-btn" title="Logout" aria-label="Logout">
		<!-- Logout icon -->
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#ff5252" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
	</a>
</div>
<div style="position: relative; z-index: 2; text-align: center; margin-top: 3rem;">
</div>
<?= $this->endSection() ?>
