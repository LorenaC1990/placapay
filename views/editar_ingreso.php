<form action="?page=post_editar_ingreso" method="post">
    <input type="hidden" name="id" value="<?php echo $ingreso['id'] ?>">

    <div class="field">
        <label>Placa</label>
        <input type="text" name="placa" minlength="5" maxlength="7" value="<?php echo $ingreso['placa'] ?>" required>
    </div>

    <div class="field">
        <label>Tarifa</label>
        <select name="tarifa">
            <option value="5000" <?php echo $ingreso['tarifa'] == '5000' ? 'selected' : ''; ?>>Carro</option>
            <option value="3000" <?php echo $ingreso['tarifa'] == '3000' ? 'selected' : ''; ?>>Moto</option>
        </select>
    </div>

    <button type="submit">Actualizar</button>
</form>