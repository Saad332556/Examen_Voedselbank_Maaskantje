<h3><?= $data['title']; ?></h3>

<table border="2">
    <thead class="thead-dark">
        <tr>
            <th>Barcode</th>
            <th>Naam</th>
            <th>Verpakkingseenheid</th>
            <th>Aantal aanwezig</th>
            <th>Allergenen Info</th>
            <th>Leverantie Info</th>
        </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
    </tbody>
</table>