<div class="container create">
    <?php include_once __DIR__ . '/../templates/site-name.php'; ?>

    <div class="container-sm">
        <p class="description-page">Crea tu cuenta en UpTask</p>

        <form action="/" method="POST" class="form">
            <div class="field">
                <label for="name">Nombre</label>
                <input type="text" id="name" placeholder="Tú Nombre" name="nombre">
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tú Email" name="email">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Tú Password" name="password">
            </div>

            <div class="field">
                <label for="passwordRepeat">Repetir Password</label>
                <input type="password" id="passwordRepeat" placeholder="Repite tu Password" name="passwordRepeat">
            </div>

            <input type="submit" class="button" value="Iniciar Sesión">
        </form>

        <div class="actions">
            <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
            <a href="/forget">¿Olvidaste tu Password?</a>
        </div>
    </div> <!--.container-sm -->
</div>