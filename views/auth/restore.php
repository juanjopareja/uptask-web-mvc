<div class="container restore">
    <?php include_once __DIR__ . '/../templates/site-name.php'; ?>
    
    <div class="container-sm">
        <p class="description-page">Restablece tu contraseña</p>
        <?php include_once __DIR__ . '/../templates/alerts.php'; ?>

        <?php if($showForm) { ?>

            <form action="/restore" method="POST" class="form">
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Tú Password" name="password">
                </div>

                <input type="submit" class="button" value="Guardar Contraseña">
            </form>

        <?php } ?>

        <div class="actions">
            <a href="/create">¿Aún no tienes una cuenta? Obtener Una</a>
            <a href="/forget">¿Olvidaste tu Password?</a>
        </div>
    </div> <!--.container-sm -->
</div>