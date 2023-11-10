<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo ($_SESSION['capa_interna' == False]) ? '../' : ''; ?>../">LOOKSYSTEM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'Home') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/index.php">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'ProveedorConsumibles') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/proveedorConsumible.php">Proveedores Consumibles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'ProveedorPrendas') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/proveedorPrenda.php">Proveedores Prendas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'Consumibles') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/consumible.php">Consumibles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'Prendas') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/prenda.php">Prendas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SESSION['nav_section'] == 'Historial') ? 'active' : ''; ?>" href="<?php echo ($_SESSION['capa_interna'] == true) ? '../' : ''; ?>../php/historial.php">Historial
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>