<!-- user/profile.php -->
<link rel="stylesheet" href="/css/auth-theme.css">
<link rel="stylesheet" href="/css/profile-theme.css">
<div class="center-wrapper">
    <div class="form-card">
    <div class="dashboard-topbar" style="margin-bottom: 1rem;">
            <a href="/dashboard" class="dashboard-btn" title="Dashboard" aria-label="Dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#7c4dff" stroke-width="2"><path d="M3 13l9-9 9 9"/><path d="M4 10v10a1 1 0 0 0 1 1h5v-6h4v6h5a1 1 0 0 0 1-1V10"/></svg>
            </a>
            <a href="/logout" class="dashboard-btn" title="Logout" aria-label="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#ff5252" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </a>
        </div>
        <h2><?= esc($user['username']) ?>'s Profile</h2>
        <div class="profile-info">
            <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
            <p><strong>XP:</strong> <?= esc($user['xp']) ?></p>
        </div>

        <!-- Pet Info Section -->
        <div class="pet-section" style="margin:2rem 0;">
            <h3>Your Pet</h3>
            <?php echo view('pet/show', [
                'userPet' => $userPet ?? null,
                'pet' => $pet ?? null,
                'showActions' => false,
                'showName' => true
            ]); ?>
        </div>

        <h3>Achievements</h3>
        <ul class="achievement-list">
            <?php foreach ($achievements as $achievement): ?>
                <li>
                    <strong><?= esc($achievement['name']) ?></strong>: <?= esc($achievement['description']) ?>
                    <span class="date">(<?= esc($achievement['date_earned']) ?>)</span>
                </li>
            <?php endforeach; ?>
            <?php if (empty($achievements)): ?>
                <li>No achievements yet.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>

