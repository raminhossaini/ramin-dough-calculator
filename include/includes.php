<link rel="shortcut icon" href="">

<!-- Apply theme before CSS loads to prevent flash of wrong theme -->
<script>
(function () {
    var saved = localStorage.getItem('theme');
    var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    var theme = saved || (prefersDark ? 'dark' : 'light');
    document.documentElement.setAttribute('data-bs-theme', theme);
})();
</script>

<!-- Bootstrap https://getbootstrap.com/docs/5.3/getting-started/introduction/ -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<!-- https://icons.getbootstrap.com/#install -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<!-- Jquery https://jquery.com/ -->
<script src="https://cdn.jsdelivr.net/npm/jquery@4.0.0/dist/jquery.min.js"></script> 

<!-- Flatpickr https://flatpickr.js.org/ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- dayJS  https://day.js.org/en/ -->
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script>dayjs().format()</script>

<style>
    [data-bs-theme="light"] .bg-site-chrome {
        background-color: #eef7fd !important;
    }
    [data-bs-theme="dark"] .bg-site-chrome {
        background-color: #343a40 !important;
    }
    [data-bs-theme="light"] .card:hover {
        background-color: #f7f7f7;
    }
    [data-bs-theme="dark"] .card:hover {
        background-color: #2b2b2b;
    }
    #themeToggle {
        border: none;
        background: transparent;
        color: #cccccc;
        font-size: 1.1rem;
        padding: 0.25rem 0.5rem;
        cursor: pointer;
    }
    #themeToggle:hover {
        color: #ddd;
    }
</style>

<script src="./js/session-inputs.js"></script>
<script src="./js/theme.js"></script>
