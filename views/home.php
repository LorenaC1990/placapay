<?php if (!isset($ingresos)) { ?>
    <p>No hay ingresos.</p>
<?php } else { ?>
    <h2>Lista de ingresos</h2>

    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Tarifa</th>
                <th>Fecha ingreso</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($ingresos as $ingreso): ?>
                <tr align="center">
                    <td><?php echo $ingreso['placa']; ?></td>
                    <td><?php echo number_format($ingreso['tarifa'], 0, ',', '.'); ?></td>
                    <td><?php echo date("Y-m-d, H:i", $ingreso['hora_ingreso']); ?></td>
                    <td align="right">
                        <a href="?page=editar_ingreso&id=<?php echo $ingreso['id']; ?>" class="btn">Editar</a>
                        <a href="?page=retiro&id=<?php echo $ingreso['id']; ?>" class="btn">Marcar salida</a>
                        <a href="?page=eliminar_ingreso&id=<?php echo $ingreso['id']; ?>" class="btn">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>

<style>
    h2 {
        font-weight: 500;
        margin-bottom: 35px;
    }
</style>