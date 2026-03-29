// Password toggle visibility
document.addEventListener('DOMContentLoaded', function() {
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    
    passwordInputs.forEach(input => {
        const toggleBtn = document.createElement('i');
        toggleBtn.className = 'fas fa-eye toggle-password';
        toggleBtn.style.cssText = `
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            z-index: 2;
            font-size: 1.1rem;
        `;
        input.parentNode.style.position = 'relative';
        input.parentNode.appendChild(toggleBtn);
        
        toggleBtn.addEventListener('click', function() {
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });

    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Check required fields
            const required = form.querySelectorAll('[required]');
            required.forEach(field => {
                if (!field.value.trim()) {
                    showFieldError(field, 'Field ini wajib diisi');
                    isValid = false;
                }
            });
            
            // Check password confirmation
            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirm_password"]');
            if (password && confirmPassword && password.value !== confirmPassword.value) {
                showFieldError(confirmPassword, 'Password tidak cocok');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });

    // Auto focus first input
    const firstInput = document.querySelector('input[type="text"], input[type="email"]');
    if (firstInput) firstInput.focus();
});

function showFieldError(field, message) {
    let errorMsg = field.parentNode.querySelector('.field-error');
    if (!errorMsg) {
        errorMsg = document.createElement('div');
        errorMsg.className = 'field-error';
        errorMsg.style.cssText = `
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 5px;
            position: absolute;
            bottom: -25px;
            left: 0;
        `;
        field.parentNode.style.position = 'relative';
        field.parentNode.appendChild(errorMsg);
    }
    errorMsg.textContent = message;
    
    // Remove error on input
    field.addEventListener('input', function() {
        if (this.parentNode.querySelector('.field-error')) {
            this.parentNode.removeChild(this.parentNode.querySelector('.field-error'));
        }
    });
}
