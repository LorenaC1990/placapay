<form action="?page=agregaringreso" method="post">
    <div class="field">
        <label>Placa</label>
        <input type="text" name="placa" minlength="5" maxlength="7" required>
    </div>

    <div class="field">
        <label>Tarifa</label>
        <select name="tarifa">
            <option value="5000">Carro</option>
            <option value="3000">Moto</option>
        </select>
    </div>

    <button type="submit">Registrar</button>
</form>