<div class="contenedor login">

<?php 
    include_once __DIR__ . '/../templates/nombre-sitio.php';
?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesion</p>

        <form action="/" class="formulario" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Tu Password" name="password">
            </div>

            <input type="submit" class="boton" value="Iniciar Sesion">
        </form>
            <div class="acciones">
                <a href="/crear">Aun no tienes una cuenta? Obtener una</a>
                <a href="/olvide">Olvidaste tu password?</a>
            </div>

    </div> <!-- contenedor-sm fin -->
</div>