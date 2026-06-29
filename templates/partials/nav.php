<nav>
    <ul>
    	<li><a href="/">home</a></li>
    	<li><a href="/postagens">posts</a></li>
    	<li><a href="/midias">mídias</a></li>
        <?php if ($_SESSION["usuario_id"]): ?>
            <li><a href="/registrar">registrar</a></li>
        <?php else: ?>
            <li><a href="/login">login</a></li>
        <?php endif; ?>
    </ul>
</nav>
