
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <i class="bi bi-house-door"></i>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Dropdown -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Recipe Calculators
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="light">
                        <li><a class="dropdown-item" href="<?=ORIGINAL;?>">Original 24-hour Pizza Dough</a></li>
                        <li><a class="dropdown-item" href="<?=ORIGINAL_V2;?>">Poolish 24-hour Pizza Dough V2</a></li>
                        <li><a class="dropdown-item" href="<?=DOUBLE_FERMENTED;?>">Double-fermented 48-hour Pizza Dough</a></li>
                        <li><a class="dropdown-item" href="<?=BIGA_24;?>">Original 24-hour 100% Biga Recipe</a></li>
                        <li><a class="dropdown-item" href="<?=BIGA_48;?>">Ramin's 48-hour 100% Biga Recipe</a></li>
                        <li><a class="dropdown-item" href="<?=SOURDOUGH;?>">Ramin's Sourdough Pizza</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faqs.php">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.ramin-hossaini.com/donate/">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=GITHUB_ROOT;?>/discussions">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=GITHUB_ROOT;?>">
                            <svg aria-hidden="true" focusable="false" class="octicon octicon-mark-github" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" display="inline-block" overflow="visible" style="vertical-align:text-bottom"><path d="M10.226 17.284c-2.965-.36-5.054-2.493-5.054-5.256 0-1.123.404-2.336 1.078-3.144-.292-.741-.247-2.314.09-2.965.898-.112 2.111.36 2.83 1.01.853-.269 1.752-.404 2.853-.404 1.1 0 1.999.135 2.807.382.696-.629 1.932-1.1 2.83-.988.315.606.36 2.179.067 2.942.72.854 1.101 2 1.101 3.167 0 2.763-2.089 4.852-5.098 5.234.763.494 1.28 1.572 1.28 2.807v2.336c0 .674.561 1.056 1.235.786 4.066-1.55 7.255-5.615 7.255-10.646C23.5 6.188 18.334 1 11.978 1 5.62 1 .5 6.188.5 12.545c0 4.986 3.167 9.12 7.435 10.669.606.225 1.19-.18 1.19-.786V20.63a2.9 2.9 0 0 1-1.078.224c-1.483 0-2.359-.808-2.987-2.313-.247-.607-.517-.966-1.034-1.033-.27-.023-.359-.135-.359-.27 0-.27.45-.471.898-.471.652 0 1.213.404 1.797 1.235.45.651.921.943 1.483.943.561 0 .92-.202 1.437-.719.382-.381.674-.718.944-.943"></path></svg>
                        </a>
                    </li>

                </ul>

            </div>
    </div>
</nav>
