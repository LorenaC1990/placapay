<?php if (!isset($ingresos)) { ?>
    <p>No hay ingresos.</p>
<?php } else { ?>
    <h2>Reporte de ingresos</h2>
    <?php $contador = 0; ?>

    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Tarifa</th>
                <th>Fecha ingreso</th>
                <th>Fecha salida</th>
                <th>Horas transcurridas</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($ingresos as $ingreso): ?>
                <?php $contador = $ingreso['tarifa'] + $contador; ?>

                <tr align="center">
                    <td><?php echo $ingreso['placa']; ?></td>
                    <td><?php echo number_format($ingreso['tarifa'], 0, ',', '.'); ?></td>
                    <td><?php echo date("Y-m-d, H:i", $ingreso['hora_ingreso']); ?></td>
                    <td><?php echo $ingreso['hora_salida'] ? date("Y-m-d, H:i", $ingreso['hora_salida']) : '--'; ?></td>
                    <td>
                        <?php
                            $diferenciaSegundos = abs($ingreso['hora_salida'] - $ingreso['hora_ingreso']);
                            $horas = round($diferenciaSegundos / 3600, 2);
                            echo $horas;
                        ?>
                    </td>
                    <td>
                        <?php
                            $valor = number_format($ingreso['tarifa'] * $horas, 0, ',', '.');
                            echo $valor;
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <td><strong>Total</strong></td>
                <td align="center"><strong><?php echo number_format($contador, 0, ',', '.'); ?></strong></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
<?php } ?>

<style>
    h2 {
        font-weight: 500;
        margin-bottom: 35px;
    }
</style>