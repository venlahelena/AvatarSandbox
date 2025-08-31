document.addEventListener('DOMContentLoaded', function() {
    var editBtn = document.getElementById('edit-pet-name-btn');
    var nameDisplay = document.getElementById('pet-name-display');
    var nameForm = document.getElementById('pet-name-form');
    var nameInput = document.getElementById('pet-name-input');
    var cancelBtn = document.getElementById('cancel-pet-name-btn');
    if (editBtn && nameDisplay && nameForm && nameInput && cancelBtn) {
        editBtn.onclick = function() {
            nameDisplay.style.display = 'none';
            editBtn.style.display = 'none';
            nameForm.style.display = 'inline-block';
            nameInput.focus();
        };
        cancelBtn.onclick = function() {
            nameForm.style.display = 'none';
            nameDisplay.style.display = 'inline-block';
            editBtn.style.display = 'inline-block';
        };
    }
});