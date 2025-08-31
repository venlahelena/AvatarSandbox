// dashboard-pet-select.js
// Handles pet selection panel open/close and preview logic

document.getElementById('pet-select-btn').onclick = function() {
	document.getElementById('pet-select-panel').style.right = '0';
};
document.getElementById('pet-select-close').onclick = function() {
	document.getElementById('pet-select-panel').style.right = '-320px';
};

const petAssets = {
	'French Bulldog': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFD580"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`,
	'Labrador Retriever': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFE4B5"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`,
	'Siberian Husky': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#B0C4DE"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`,
	'Ragdoll': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#E0E7FF"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`,
	'Maine Coon': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#FFDAB9"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`,
	'Sphynx': `<svg width="80" height="80" viewBox="0 0 70 70"><ellipse cx="35" cy="40" rx="22" ry="18" fill="#F5E6E8"/><ellipse cx="28" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="42" cy="42" rx="3" ry="5" fill="#3E2723"/><ellipse cx="35" cy="50" rx="6" ry="3" fill="#A67C52"/></svg>`
};

function updatePetPreview() {
	const select = document.getElementById('pet-select-dropdown');
	const preview = document.getElementById('pet-preview-area');
	const selectedType = select.options[select.selectedIndex].getAttribute('data-type');
	preview.innerHTML = petAssets[selectedType] || '';
}
document.getElementById('pet-select-dropdown').addEventListener('change', updatePetPreview);
window.addEventListener('DOMContentLoaded', updatePetPreview);
