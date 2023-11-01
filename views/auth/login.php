<div class="container login">
    <?php include_once __DIR__ . '/../templates/site-name.php'; ?>
    
    <div class="container-sm">
        <p class="description-page">Iniciar Sesión</p>

        <form action="/" method="POST" class="form">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tú Email" name="email">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Tú Password" name="password">
            </div>

            <input type="submit" class="button" value="Iniciar Sesión">
        </form>

        <div class="actions">
            <a href="/create">¿Aún no tienes una cuenta? Obtener Una</a>
            <a href="/forget">¿Olvidaste tu Password?</a>
        </div>
    </div> <!--.container-sm -->
</div>
