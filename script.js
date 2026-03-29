// Form validation dan animasi
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    });

    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const required = form.querySelectorAll('[required]');
            let valid = true;
            
            required.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = '#f56565';
                    valid = false;
                } else {
                    input.style.borderColor = '#e2e8f0';
                }
            });
            
            if (!valid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib!');
            }
        });
    });

    // Rating stars preview
    const ratingInput = document.querySelector('input[name="rating"]');
    if (ratingInput) {
        ratingInput.addEventListener('input', function() {
            const value = parseFloat(this.value) || 0;
            // Preview rating di input field
            this.parentNode.querySelector('label').textContent = 
                `Rating (1-5): ${value.toFixed(1)} ⭐`;
        });
    }

    // Input emoji picker sederhana
    const emojiInput = document.querySelector('input[name="gambar"]');
    if (emojiInput) {
        const emojis = ['🏞️', '🏘️', '🌋', '⛰️', '🌅', '🏖️', '🌺', '🌟', '🗺️'];
        
        emojiInput.addEventListener('focus', function() {
            showEmojiPicker(this);
        });
        
        emojiInput.addEventListener('input', function() {
            if (!this.value || this.value.length > 2) {
                this.value = '';
            }
        });
    }

    // Smooth animations untuk cards
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Table row hover effect
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f7fafc';
            this.style.transform = 'scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
            this.style.transform = 'scale(1)';
        });
    });
});

// Fungsi helper untuk emoji picker
function showEmojiPicker(input) {
    const rect = input.getBoundingClientRect();
    const picker = document.createElement('div');
    picker.className = 'emoji-picker';
    picker.style.cssText = `
        position: absolute;
        top: ${rect.bottom + 5}px;
        left: ${rect.left}px;
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        z-index: 1000;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 8px;
        font-size: 1.5rem;
    `;
    
    const emojis = ['🏞️', '🏘️', '🌋', '⛰️', '🌅', '🏖️', '🌺', '🌟', '🗺️', '🎡'];
    
    emojis.forEach(emoji => {
        const btn = document.createElement('button');
        btn.textContent = emoji;
        btn.style.cssText = `
            border: none;
            background: none;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 8px;
            padding: 8px;
            transition: background 0.2s;
        `;
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            input.value = emoji;
            document.body.removeChild(picker);
        });
        btn.addEventListener('mouseenter', function() {
            this.style.background = '#f7fafc';
        });
        btn.addEventListener('mouseleave', function() {
            this.style.background = '';
        });
        picker.appendChild(btn);
    });
    
    document.body.appendChild(picker);
    
    // Close picker saat klik di luar
    setTimeout(() => {
        document.addEventListener('click', function closePicker(e) {
            if (!input.contains(e.target) && !picker.contains(e.target)) {
                if (picker.parentNode) {
                    document.body.removeChild(picker);
                }
                document.removeEventListener('click', closePicker);
            }
        });
    }, 100);
}

// Fungsi untuk format harga otomatis
function formatHarga(input) {
    let value = input.value.replace(/[^\d]/g, '');
    if (value) {
        value = parseInt(value).toLocaleString('id-ID');
        input.value = 'Rp ' + value;
    }
}

// Tambahkan event listener untuk harga
document.addEventListener('DOMContentLoaded', function() {
    const hargaInput = document.querySelector('input[name="harga"]');
    if (hargaInput) {
        hargaInput.addEventListener('input', function() {
            formatHarga(this);
        });
    }
});
