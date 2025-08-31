<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/landing.css">
<link rel="stylesheet" href="/css/dashboard.css">
<div class="landing-bg"></div>
<div class="dashboard-topbar">
	<a href="/profile" class="dashboard-btn" title="Profile" aria-label="Profile">
		<!-- Profile icon -->
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#7c4dff" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20v-1a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v1"/></svg>
	</a>
	<a href="/logout" class="dashboard-btn" title="Logout" aria-label="Logout">
		<!-- Logout icon -->
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#ff5252" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
	</a>
</div>

<!-- Avatar Rendered on Dashboard -->
<div id="avatar-preview" class="avatar-preview"></div>

<!-- Pet Display (below avatar) -->
<div class="dashboard-pet-area">
   <div class="dashboard-pet-container">
	   <?php echo view('pet/show', [
		   'userPet' => $userPet ?? null,
		   'pet' => $pet ?? null,
		   'showActions' => true,
		   'showName' => false
	   ]); ?>
   </div>
</div>

<!-- Side rectangular button for avatar customization -->
<button id="avatar-customize-btn" class="avatar-customize-btn">
	<span style="writing-mode: vertical-rl; text-orientation: mixed; font-weight: bold; font-size: 1.1rem; letter-spacing: 0.1em;">Customize</span>
</button>

<!-- Side rectangular button for pet selection -->
<button id="pet-select-btn" class="avatar-customize-btn" style="top:55%;right:0;background:#FFD580;color:#3E2723;">
	<span style="writing-mode: vertical-rl; text-orientation: mixed; font-weight: bold; font-size: 1.1rem; letter-spacing: 0.1em;">Choose Pet</span>
</button>

<!-- Pet selection panel (hidden by default, slides out when button pressed) -->
<div id="pet-select-panel" class="avatar-customize-panel" style="right:-320px;">
	<div class="avatar-customize-header">
		<h3 class="avatar-customize-title">Pet Selection</h3>
		<button id="pet-select-close" class="avatar-customize-close">&times;</button>
	</div>
	<form id="pet-select-form" method="post" action="/pet/select/choose" style="margin-top:2rem;">
		<label for="pet-select-dropdown" style="font-weight:600;margin-bottom:1rem;">Choose a pet:</label>
		<select id="pet-select-dropdown" name="pet_id" style="width:220px;padding:0.6rem 1rem;border-radius:8px;font-size:1.1rem;">
			<?php foreach ($pets as $pet): ?>
				<option value="<?= esc($pet['id']) ?>" data-type="<?= esc($pet['type']) ?>">
					<?= esc($pet['type']) ?>
				</option>
			<?php endforeach; ?>
		</select>
		<div id="pet-preview-area" style="margin-top:2rem;"></div>
		<button type="submit" class="btn btn-primary" style="margin-top:2rem;">Select Pet</button>
	</form>
</div>

<!-- Customization panel (hidden by default, slides out when button pressed) -->
<div id="avatar-customize-panel" class="avatar-customize-panel">
	<div class="avatar-customize-header">
		<h3 class="avatar-customize-title">Avatar Customization</h3>
		<button id="avatar-customize-close" class="avatar-customize-close">&times;</button>
	</div>
	<form id="avatar-customize-form" method="post" action="/avatar/update">
		<div class="mb-3">
			<label for="avatar_hair" class="avatar-customize-label">Hair Style</label><br>
			<select id="avatar_hair" name="avatar_hair" class="avatar-customize-select">
				<option value="none">None</option>
				<option value="circle">Circle</option>
				<option value="square">Square</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="avatar_clothes" class="avatar-customize-label">Clothes</label><br>
			<select id="avatar_clothes" name="avatar_clothes" class="avatar-customize-select">
				<option value="none">None</option>
				<option value="shirt">Shirt</option>
				<option value="dress">Dress</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="avatar_accessory" class="avatar-customize-label">Accessory</label><br>
			<select id="avatar_accessory" name="avatar_accessory" class="avatar-customize-select">
				<option value="none">None</option>
				<option value="glasses">Glasses</option>
				<option value="hat">Hat</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="avatar_color" class="avatar-customize-label">Avatar Color</label><br>
			<input type="color" id="avatar_color" name="avatar_color" value="#FFD580" class="avatar-customize-color">
		</div>
		<button type="submit" class="btn btn-primary avatar-customize-save">Save Avatar</button>
	</form>
</div>

<script>
// Pass initial avatar data to JS for instant preview
window.avatarInitialData = {
	avatar_hair: "<?= isset($user['avatar_hair']) ? esc($user['avatar_hair']) : 'none' ?>",
	avatar_clothes: "<?= isset($user['avatar_clothes']) ? esc($user['avatar_clothes']) : 'none' ?>",
	avatar_accessory: "<?= isset($user['avatar_accessory']) ? esc($user['avatar_accessory']) : 'none' ?>",
	avatar_color: "<?= isset($user['avatar_color']) ? esc($user['avatar_color']) : '#FFD580' ?>"
};
</script>
<script src="/js/avatar-customize.js"></script>
<script src="/js/dashboard-pet-feedback.js"></script>
<script src="/js/dashboard-pet-select.js"></script>
</script>
<?= $this->endSection() ?>
