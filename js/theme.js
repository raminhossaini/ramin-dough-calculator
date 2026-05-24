
(function () {
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-bs-theme', theme);
        updateIcon(theme);
        updateDropdown(theme);
    }

    function updateIcon(theme) {
        var btn = document.getElementById('themeToggle');
        if (!btn) return;
        var icon = btn.querySelector('i');
        if (theme === 'dark') {
            icon.className = 'bi bi-sun-fill';
            btn.title = 'Switch to light mode';
        } else {
            icon.className = 'bi bi-moon-fill';
            btn.title = 'Switch to dark mode';
        }
    }

    function updateDropdown(theme) {
        var menus = document.querySelectorAll('.navbar .dropdown-menu');
        menus.forEach(function (m) { m.setAttribute('data-bs-theme', theme); });
    }

    function currentTheme() {
        return document.documentElement.getAttribute('data-bs-theme') || 'light';
    }

    window.toggleTheme = function () {
        var next = currentTheme() === 'dark' ? 'light' : 'dark';
        localStorage.setItem('theme', next);
        applyTheme(next);
    };

    document.addEventListener('DOMContentLoaded', function () {
        applyTheme(currentTheme());

        // Keep in sync if OS preference changes and user hasn't overridden
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
            if (!localStorage.getItem('theme')) {
                applyTheme(e.matches ? 'dark' : 'light');
            }
        });
    });
})();
