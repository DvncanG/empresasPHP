<?php

class LoginView {

    function printLogin($user = "", $pass = "", $saveLogin = false, $loginError = false) {
        echo '<div class="row col-5 border border-3 rounded position-absolute top-50 start-50 translate-middle p-5 login">
            <h1 class=" row fs-3 mb-5 justify-content-center login__header">Pizzeria - Ribera del Tajo</h1>
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Iniciar Sesión</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Regístrate</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                     tabindex="0">
                    <!-- Form de Inicio de sesión -->
                    <form action="' . $_SERVER["PHP_SELF"] . '?controller=Login&action=processUserLogin" method="POST" class="form text-dark">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-light opacity-75" id="floatingInput" placeholder="User" name="userLogin" value="' . $user . '">
                            <label for="floatingInput" class="ps-4"><i class="bi bi-person-circle"></i> Usuario</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control bg-light opacity-75" id="floatingPassword"
                                   placeholder="Password" name="passLogin" value="' . $pass . '">
                            <label for="floatingPassword" class="ps-4"> <i class="bi bi-key-fill"></i> Contraseña</label>
                        </div>';
        if (isset($loginError) && $loginError) {//Credenciales incorrectas
            echo '<div class="row p-2">
                                                                <p class="text-danger m-0"> * Usuario y/o contraseña incorrecta</p>
                                                              </div>';
        }
        echo '<div class="mb-3 form-check py-2 mt-1 color-white">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="saveLogin" ';
        if ($saveLogin) {
            echo "checked";
        }
        echo ' value="1">
                            <label class="form-check-label text-light" for="exampleCheck1">Recuérdame</label>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-outline-light m-auto mt-2 mx-auto col-5 fs-5 py-2">Iniciar
                                Sesión</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <!-- Form de Registro -->
                    <form class="form text-dark" method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <div class="row justify-content-between mb-3">
                            <div class="col-5 form-floating px-1">
                                <input type="text" class="form-control bg-light opacity-75" id="inputName" placeholder="Nombre"
                                       required>
                                <label class="ps-4" for="inputName">Nombre</label>
                            </div>
                            <div class="col-7 form-floating px-1">
                                <input type="text" class="form-control bg-light opacity-75" id="inputApellidos" placeholder="Apellidos"
                                       required>
                                <label class="ps-4" for="inputApellidos">Apellidos</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 form-floating px-1">
                                <input type="email" class="form-control bg-light opacity-75" id="inputEmail" placeholder="Email"
                                       required>
                                <label class="ps-4" for="inputEmail"><i class="bi bi-envelope fs-5"></i>
                                    Email</label>
                            </div>
                        </div>
                        <div class="row justify-content-between mb-3">
                            <div class="col-6 form-floating px-1">
                                <input type="text" class="form-control bg-light opacity-75" id="exampleInputUser2" placeholder="Usuario"
                                       required>
                                <label class="ps-4" for="exampleInputUser2"><i class="bi bi-person fs-5"></i>
                                    Usuario</label>
                            </div>
                            <div class="col-6 form-floating px-1">
                                <input type="password" class="form-control bg-light opacity-75" id="exampleInputPassword2"
                                       placeholder="Contraseña" required>
                                <label class="ps-4" for="exampleInputPassword2"><i class="bi bi-key fs-5"></i>
                                    Contraseña</label>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label text-light" for="flexSwitchCheckDefault">Quiero recibir newsletters semanales con
                                todas las ofertas</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked
                                   disabled required>
                            <label class="form-check-label text-light" for="flexSwitchCheckCheckedDisabled">He leído y acepto la <a
                                    href="#">Política de Privacidad</a> de la empresa</label>
                        </div>
                        <div class="border-0 mx-auto d-flex justify-content-center p-3 pb-4">
                            <button type="submit"
                                    class="btn btn-outline-light m-auto mt-2 mx-auto col-5 fs-5 py-2">Regístrate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    }

    function showLogin($user = "", $pass = "", $saveLogin = false, $loginError = false) {//Por defecto no muestro nada en los inputs
       $this->printLogin($user, $pass, $saveLogin, $loginError);
    }

    function loadAction($controller, $action) {
        $controller->$action();
    }
}
