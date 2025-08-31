<!-- pet/select.php -->
<link rel="stylesheet" href="/css/dashboard.css">
<div class="center-wrapper">
    <div class="form-card" style="max-width:600px;">
        <h2>Choose Your Starter Pet</h2>
        <?php if (session('error')): ?>
            <div class="alert alert-danger"><?= esc(session('error')) ?></div>
        <?php endif; ?>
        <form method="post" action="/pet/select/choose" id="pet-select-form">
            <div style="display:flex;flex-direction:column;align-items:center;gap:2rem;">
                <label for="pet-select-dropdown" style="font-weight:600;margin-bottom:1rem;">Choose a pet:</label>
                <select id="pet-select-dropdown" name="pet_id" style="width:220px;padding:0.6rem 1rem;border-radius:8px;font-size:1.1rem;">
                    <?php foreach ($pets as $pet): ?>
                        <option value="<?= esc($pet['id']) ?>" data-type="<?= esc($pet['type']) ?>">
                            <?= esc($pet['type']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div id="pet-preview-area" style="margin-top:2rem;">
                    <!-- JS will update preview here -->
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:2rem;">Select Pet</button>
            </div>
        </form>
    <script src="/js/dashboard-pet-select.js"></script>
    </div>
</div>
