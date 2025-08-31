<?php
// avatar/render.php
// Renders the user's avatar using SVG placeholder shapes
$user = $user ?? [];
$color = $user['avatar_color'] ?? '#FFD580';
$hair = $user['avatar_hair'] ?? 'none';
$clothes = $user['avatar_clothes'] ?? 'none';
$accessory = $user['avatar_accessory'] ?? 'none';
?>
<svg width="120" height="180" viewBox="0 0 120 180" class="avatar-svg">
    <!-- Body -->
    <ellipse cx="60" cy="120" rx="40" ry="55" fill="<?= esc($color) ?>" />
    <!-- Hair -->
    <?php if ($hair === 'circle'): ?>
        <circle cx="60" cy="55" r="35" fill="#3E2723" />
    <?php elseif ($hair === 'square'): ?>
        <rect x="25" y="25" width="70" height="35" fill="#3E2723" rx="10" />
    <?php endif; ?>
    <!-- Clothes -->
    <?php if ($clothes === 'shirt'): ?>
        <rect x="30" y="110" width="60" height="40" fill="#90caf9" rx="12" />
    <?php elseif ($clothes === 'dress'): ?>
        <ellipse cx="60" cy="150" rx="30" ry="25" fill="#f48fb1" />
    <?php endif; ?>
    <!-- Accessory -->
    <?php if ($accessory === 'glasses'): ?>
        <ellipse cx="45" cy="65" rx="10" ry="6" fill="#fff" stroke="#333" stroke-width="2" />
        <ellipse cx="75" cy="65" rx="10" ry="6" fill="#fff" stroke="#333" stroke-width="2" />
        <line x1="55" y1="65" x2="65" y2="65" stroke="#333" stroke-width="2" />
    <?php elseif ($accessory === 'hat'): ?>
        <rect x="35" y="15" width="50" height="20" fill="#ffb347" rx="8" />
    <?php endif; ?>
</svg>
