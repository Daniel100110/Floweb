<?php
session_start();
if (isset($_SESSION['login_user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include '../head/head.php';
            ?>
        <title>[F06]CRUD MATERIALES</title>
        <link rel="stylesheet" href="../css/css_f06.css">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .container {
                max-width: 960px;
            }

            .lh-condensed {
                line-height: 1.25;
            }
        </style>
    </head>

    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_f06.php';
            ?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tu carrito</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php ver_carrito(); ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Código promocional">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Reclamar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Pedido</h4>
                    <form class="needs-validation" action="../login.php"  novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nombre</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Ejemplo: José" value="" required>
                                <div class="invalid-feedback">
                                    El nombre es obligatorio.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Apellido</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Ejemplo: Peréz" value="" required>
                                <div class="invalid-feedback">
                                    El apellido es obligario.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Nombre de usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Ejemplo: José_Peréz_20" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    El nombre de usuario es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="josePerez123@ejemplo.com" required>
                            <div class="invalid-feedback">
                                Por favor ingresa un correo valido.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" placeholder="Ejemplo: colonia, calle, número exterior." required>
                            <div class="invalid-feedback">
                                Por favor, ingresa tu dirección para que recibas tus productos.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Dirección detallada</label>
                            <input type="text" class="form-control" id="address2" placeholder="Ejemplo: número, color de la casa, referencias como tiendas o locales." Required>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Estado</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Elige...</option>
                                    <option>Baja California</option>
                                </select>
                                <div class="invalid-feedback">
                                Proporcione un estado válido.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">Ciudad</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Elige...</option>
                                    <option>Tijuana</option>
                                    <option>Rosarito</option>
                                    <option>Tecate</option>
                                    <option>Mexicali</option>
                                    <option>Ensenada</option>
                                </select>
                                <div class="invalid-feedback">
                                Proporcione una ciudad válida.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Código Postal</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Es requerido el código postal.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">La dirección de envío es la misma que mi dirección de facturación.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Guardar esta información para la próxima vez</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Método de pago</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Tarjeta de debito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Nombre que aparece en la tarjeta</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Nombre completo como se muestra en la tarjeta.</small>
                                <div class="invalid-feedback">
                                    Es requerido llenar el campo del nombre que aparece en su tarjeta. 
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Número de tarjeta</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    El numero de tarjeta es requerido.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiración</label>
                                <input type="text" class="form-control" id="cc-expiration" required>
                                <div class="invalid-feedback">
                                    La fecha de expiracion es requerida.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" required>
                                <div class="invalid-feedback">
                                    El código de seguridad es requerido
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar</button>
                    </form>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
                }, false)
            }())
        </script>
    </body>
    </html>
<?php
}
if (!$_SESSION['login_user']) {
    header("location:../index.php");
}
?>