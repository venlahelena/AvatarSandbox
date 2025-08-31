// avatar-customize.js
// This script enables real-time avatar preview on the dashboard as the user customizes options.
// JavaScript is required for instant feedback, as PHP can only update after form submission.

// Avatar customization panel toggle
const customizeButton = document.getElementById('avatar-customize-btn');
const customizePanel = document.getElementById('avatar-customize-panel');
const closePanelButton = document.getElementById('avatar-customize-close');

customizeButton.onclick = function() {
    customizePanel.style.right = (customizePanel.style.right === '0px') ? '-320px' : '0px';
};

closePanelButton.onclick = function() {
    customizePanel.style.right = '-320px';
};

// Live avatar preview
function renderAvatar(avatarOptions) {
    const avatarColor = avatarOptions.avatar_color || '#FFD580';
    const avatarHair = avatarOptions.avatar_hair || 'none';
    const avatarClothes = avatarOptions.avatar_clothes || 'none';
    const avatarAccessory = avatarOptions.avatar_accessory || 'none';

    const svgMarkup = `
        <svg width="120" height="180" viewBox="0 0 120 180" style="display:block;margin:auto;">
            <ellipse cx="60" cy="120" rx="40" ry="55" fill="${avatarColor}" />
            ${avatarHair === 'circle' ? '<circle cx="60" cy="55" r="35" fill="#3E2723" />' : ''}
            ${avatarHair === 'square' ? '<rect x="25" y="25" width="70" height="35" fill="#3E2723" rx="10" />' : ''}
            ${avatarClothes === 'shirt' ? '<rect x="30" y="110" width="60" height="40" fill="#90caf9" rx="12" />' : ''}
            ${avatarClothes === 'dress' ? '<ellipse cx="60" cy="150" rx="30" ry="25" fill="#f48fb1" />' : ''}
            ${avatarAccessory === 'glasses' ? '<ellipse cx="45" cy="65" rx="10" ry="6" fill="#fff" stroke="#333" stroke-width="2" /><ellipse cx="75" cy="65" rx="10" ry="6" fill="#fff" stroke="#333" stroke-width="2" /><line x1="55" y1="65" x2="65" y2="65" stroke="#333" stroke-width="2" />' : ''}
            ${avatarAccessory === 'hat' ? '<rect x="35" y="15" width="50" height="20" fill="#ffb347" rx="8" />' : ''}
        </svg>
    `;
    document.getElementById('avatar-preview').innerHTML = svgMarkup;
}

// Initial render from PHP user data
renderAvatar({
    avatar_hair: window.avatarInitialData.avatar_hair,
    avatar_clothes: window.avatarInitialData.avatar_clothes,
    avatar_accessory: window.avatarInitialData.avatar_accessory,
    avatar_color: window.avatarInitialData.avatar_color
});

// Listen for changes in customization controls
const avatarFields = [
    'avatar_hair',
    'avatar_clothes',
    'avatar_accessory',
    'avatar_color'
];

avatarFields.forEach(function(fieldId) {
    const fieldElement = document.getElementById(fieldId);
    if (fieldElement) {
        fieldElement.addEventListener('input', function() {
            renderAvatar({
                avatar_hair: document.getElementById('avatar_hair').value,
                avatar_clothes: document.getElementById('avatar_clothes').value,
                avatar_accessory: document.getElementById('avatar_accessory').value,
                avatar_color: document.getElementById('avatar_color').value
            });
        });
    }
});
