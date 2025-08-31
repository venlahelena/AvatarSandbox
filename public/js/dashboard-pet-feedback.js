// dashboard-pet-feedback.js
// Shows floating feedback text when pet interaction buttons are pressed

document.addEventListener('DOMContentLoaded', function() {
    const petArea = document.querySelector('.dashboard-pet-area');
    if (!petArea) return;
    petArea.addEventListener('submit', function(e) {
        // Only handle pet interaction forms
        if (!e.target.action.match(/\/pet\/interact\//)) return;
        let feedbackText = '';
        if (e.target.action.endsWith('/feed')) feedbackText = 'Yum!';
        else if (e.target.action.endsWith('/play')) feedbackText = 'Fun!';
        else if (e.target.action.endsWith('/train')) feedbackText = 'Strong!';
        if (feedbackText) {
            showPetFeedback(feedbackText, e.target);
        }
    }, true);

    function showPetFeedback(text, form) {
        const feedback = document.createElement('div');
        feedback.textContent = text;
        feedback.className = 'pet-feedback-float';
        feedback.style.position = 'absolute';
        feedback.style.left = '50%';
        feedback.style.top = '0';
        feedback.style.transform = 'translate(-50%, -100%)';
        feedback.style.background = '#FFD580';
        feedback.style.color = '#3E2723';
        feedback.style.fontWeight = 'bold';
        feedback.style.padding = '0.4rem 1.2rem';
        feedback.style.borderRadius = '16px';
        feedback.style.boxShadow = '0 2px 8px #C97A5B44';
        feedback.style.zIndex = '10000';
        feedback.style.opacity = '1';
        feedback.style.pointerEvents = 'none';
        feedback.style.transition = 'opacity 1.2s, top 1.2s';
        petArea.appendChild(feedback);
        setTimeout(() => {
            feedback.style.opacity = '0';
            feedback.style.top = '-40px';
        }, 100);
        setTimeout(() => {
            feedback.remove();
        }, 1300);
    }
});
