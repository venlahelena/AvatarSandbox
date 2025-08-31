<!-- avatar/edit.php -->
<link rel="stylesheet" href="/css/auth-theme.css">
<div class="center-wrapper">
    <div class="form-card">
        <h2>Edit Your Avatar</h2>
        <form method="post" action="/avatar/update">
            <div class="mb-3">
                <label for="avatar_hair" class="form-label">Hair Style</label>
                <select id="avatar_hair" name="avatar_hair" class="form-control">
                    <option value="none" <?= $user['avatar_hair'] === 'none' ? 'selected' : '' ?>>None</option>
                    <option value="circle" <?= $user['avatar_hair'] === 'circle' ? 'selected' : '' ?>>Circle</option>
                    <option value="square" <?= $user['avatar_hair'] === 'square' ? 'selected' : '' ?>>Square</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="avatar_clothes" class="form-label">Clothes</label>
                <select id="avatar_clothes" name="avatar_clothes" class="form-control">
                    <option value="none" <?= $user['avatar_clothes'] === 'none' ? 'selected' : '' ?>>None</option>
                    <option value="shirt" <?= $user['avatar_clothes'] === 'shirt' ? 'selected' : '' ?>>Shirt</option>
                    <option value="dress" <?= $user['avatar_clothes'] === 'dress' ? 'selected' : '' ?>>Dress</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="avatar_accessory" class="form-label">Accessory</label>
                <select id="avatar_accessory" name="avatar_accessory" class="form-control">
                    <option value="none" <?= $user['avatar_accessory'] === 'none' ? 'selected' : '' ?>>None</option>
                    <option value="glasses" <?= $user['avatar_accessory'] === 'glasses' ? 'selected' : '' ?>>Glasses</option>
                    <option value="hat" <?= $user['avatar_accessory'] === 'hat' ? 'selected' : '' ?>>Hat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="avatar_color" class="form-label">Avatar Color</label>
                <input type="color" id="avatar_color" name="avatar_color" value="<?= esc($user['avatar_color']) ?>" class="form-control avatar-customize-color">
            </div>
            <button type="submit" class="btn btn-primary">Save Avatar</button>
        </form>
    </div>
</div>
