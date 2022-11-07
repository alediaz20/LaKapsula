<?php if ($_SESSION['user'] == 'cavila') {
    $paginas = PAGINAS_CARO;
    $paginas_permitidas = PERMITIDO_CARO;
} else {
    $paginas = PAGINAS_LUCAS;
    $paginas_permitidas = PERMITIDO_LUCAS;
}
?>

<div class="nav nav-justified py-2 nav-pills bg-kuality">
    <?php foreach ($paginas as $pagina => $pag) { ?>
        <li class="nav-item bg-kuality">
            <a class="nav-link <?php if (isset($_GET['pagina']) && ($_GET['pagina'] == $pagina)) {
                                    echo 'active';
                                } ?>" href="index.php?pagina=<?php echo $pagina ?>">
                <i class="<?php echo $pag['icon'] ?>"></i><span> <?php echo $pag['nombre'] ?></span>
            </a>
        </li>
    <?php } ?>
</div>