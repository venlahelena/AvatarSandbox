<!-- pet/show.php -->
<div class="pet-section">
    <?php if ($userPet && $pet): ?>
        <div class="pet-overview" style="position:relative;">
            <?php if (!empty($showActions)): ?>
                <div class="dashboard-pet-buttons">
                    <form method="post" action="/pet/interact/feed"><button type="submit" title="Feed">🍖</button></form>
                    <form method="post" action="/pet/interact/play"><button type="submit" title="Play">🎾</button></form>
                    <form method="post" action="/pet/interact/train"><button type="submit" title="Train">🏋️</button></form>
                </div>
            <?php endif; ?>
            <?php if (!empty($pet['asset'])): ?>
                <img src="/assets/pets/<?= esc($pet['asset']) ?>" alt="Pet" class="pet-image" style="width:100px;height:100px;">
            <?php else: ?>
                <?php
                // Render SVG based on pet type
                $svgMap = [
                    'French Bulldog' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFD580"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                    'Labrador Retriever' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFE4B5"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                    'Siberian Husky' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#B0C4DE"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                    'Ragdoll' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#E0E7FF"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                    'Maine Coon' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFDAB9"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                    'Sphynx' => '<svg width="100" height="100" viewBox="0 0 70 70" class="pet-image"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#F5E6E8"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>',
                ];
                echo $svgMap[$pet['type']] ?? $svgMap['French Bulldog'];
                ?>
            <?php endif; ?>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <?php if (!empty($showName)): ?>
                    <h4 id="pet-name-display" style="margin:0; font-weight:600; color:#3E2723;"><?= esc($userPet['name']) ?></h4>
                    <button type="button" id="edit-pet-name-btn" style="background:#FFD580;border:2px solid #A67C52;border-radius:6px;padding:0.2rem 0.7rem;cursor:pointer;display:flex;align-items:center;gap:0.3rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#3E2723" stroke-width="2" style="vertical-align:middle;"><path d="M15.232 5.232l3.536 3.536M9 13l6.232-6.232a2 2 0 1 1 2.828 2.828L11.828 15.828a2 2 0 0 1-2.828 0L9 13z"/></svg>
                        <span style="font-weight:500;">Edit</span>
                    </button>
                <?php endif; ?>
            </div>
            <form method="post" action="/pet/rename" id="pet-name-form" style="margin-top:1rem;display:none;">
                <?php if (!empty($showName)): ?>
                    <input type="text" name="pet_name" id="pet-name-input" value="<?= esc($userPet['name']) ?>" maxlength="32" required>
                    <button type="submit">Save</button>
                    <button type="button" id="cancel-pet-name-btn" style="margin-left:0.5rem;">Cancel</button>
                <?php endif; ?>
            </form>
            <?php if (!empty($showName)): ?>
                <script src="/js/pet-name-edit.js"></script>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <!-- Always show default cat SVG and stats if no pet -->
        <div class="pet-overview">
            <svg width="100" height="100" viewBox="0 0 70 70" class="pet-image">
              <ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFD580"/>
              <polygon points="18,25 28,10 32,28" fill="#FFD580"/>
              <polygon points="52,25 42,10 38,28" fill="#FFD580"/>
              <ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/>
              <ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/>
              <ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/>
            </svg>
            <h4>My Pet</h4>
            <div class="pet-stats">
                <div>Health: <progress value="100" max="100"></progress></div>
                <div>Happiness: <progress value="100" max="100"></progress></div>
                <div>Energy: <progress value="100" max="100"></progress></div>
            </div>
        </div>
    <?php endif; ?>
</div>
