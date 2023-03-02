<?php

class AdminView
{

    public function printUsuarios($users)
    {
        echo '<table class = "table table-striped bg-light">';
        echo "<th>Código</th>";
        echo "<th>Nombre</th>";
        echo "<th>Rol</th>";
        echo "<th>Acciones</th>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user["Codigo"] . " </td>";
            echo "<td>" . $user["Nombre"] . " </td>";
            echo "<td>" . $user["Rol"] . "</td>";

            echo '<td><form action="index.php?controller=Admin&action=deleteUsuario" method="post">
            <input type="hidden" name="codigoBorrar" value="' . $user["Codigo"] . '" >
                <button class="bg-danger"><i class="bi bi-trash"></i></button>
             </form>
            </td>';

            echo "</tr>";
        }
        echo "</table>";
    }

    public function modificarUsuario($user)
    {
        echo " <form method='post'>
        <div class='form-row align-items-center'>
            <div class='col-auto'>
                <label class='sr-only' for='inlineFormInput'>Name</label>
                <input type='text' class='form-control mb-2' id='inlineFormInput' placeholder='Jane Doe'>
            </div>
            <div class='col-auto'>
                <label class='sr-only' for='inlineFormInputGroup'>Username</label>
                <div class='input-group mb-2'>
                    <input type='text' class='form-control' id='inlineFormInputGroup' placeholder='Username'>
                </div>
            </div>
            <div class='col-auto'>
            </div>
            <div class='col-auto'>
                <button type='submit' class='btn btn-primary mb-2'>Submit</button>
            </div>
        </div>
    </form>";

    }
    public function printUsuarioFromDepartamentos($departamentos)
    {
        echo '<table class = "table table-striped bg-light">';
        echo '<th> CodDepartamentos</th>';
        echo '<th>Nombre</th>';
        echo '<th>Presupuesto</th>';
        echo '<th>Ciudad</th>';
        echo '<th>Número Empleados</th>';
        foreach ($departamentos as $departamento) {
            echo "<tr>";
            echo "<td>" . $departamento["CodDept"] . " </td>";
            echo "<td>" . $departamento["Nombre"] . " </td>";
            echo "<td>" . $departamento["Presupuesto"] . " </td>";
            echo "<td>" . $departamento["Ciudad"] . " </td>";
            echo "<td>" . $departamento["n_empleados"] . " </td>";
            echo "</tr>";

        }


        echo "</table>";
    }
}

?>