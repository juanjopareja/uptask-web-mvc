<div class="container forget">
    <?php include_once __DIR__ . '/../templates/site-name.php'; ?>
    
    <div class="container-sm">
        <p class="description-page">Recupera tu acceso a UpTask</p>

        <form action="/forget" method="POST" class="form">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tú Email" name="email">
            </div>

            <input type="submit" class="button" value="Enviar Instrucciones">
        </form>

        <div class="actions">
            <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
            <a href="/create">¿Aún no tienes una cuenta? Obtener Una</a>
        </div>
    </div> <!--.container-sm -->
</div>