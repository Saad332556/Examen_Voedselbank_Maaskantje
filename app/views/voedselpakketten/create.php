<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/voedselpakketten/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>Aantal producten:</td>
                <td><input type="text" name="aantal" id="aantal" required></td>
            </tr>
            <tr>
                <td>Naam klant:</td>
                <td><input type="text" name="naam" id="naam" required></td>
            </tr>
            <tr>
                <td>Pakketnummer:</td>
                <td><input type="text" name="pakketnummer" id="pakketnummer" required></td>
            </tr>
            <tr>
                <td>Samenstellingsdatum:</td>
                <td><input type="date" name="datum_samenstelling" id="datum_samenstelling" required></td>
            </tr>
            <tr>
                <td>Uitgiftedatum:</td>
                <td><input type="date" name="datum_uitgifte" id="datum_uitgifte" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>