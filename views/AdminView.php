<?php

class AdminView {

    public function printUsuarios($users) {
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

}

?>