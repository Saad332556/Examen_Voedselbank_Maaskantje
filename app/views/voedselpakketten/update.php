<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/voedselpakketten/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>Aantal producten:</td>
                <td><input type="text" name="aantal" id="aantal" required value="<?= $data['aantal']; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" id="id" value="<?= $data['id']; ?>"></td>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>