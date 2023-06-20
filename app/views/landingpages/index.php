    <ul>
        <!-- <li><a href="<?= URLROOT; ?>">Home</a></li>
        <li><a href="<?= URLROOT; ?>/leverancier/index">Leverancier</a></li>
        <li><a href="<?= URLROOT; ?>/instructeur/index">Instructeur</a></li>
        <li><a href="<?= URLROOT; ?>/jamin/index">Jamin</a></li>
        <li><a href="<?= URLROOT; ?>/mankement/index">Mankement</a></li> -->
        <li><a href="<?= URLROOT; ?>/">Home</a></li>
        <li><a href="<?= URLROOT; ?>/klanten/index">Klanten</a></li>
    </ul>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: right;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                background-color: #111;
            }

            .active {
                background-color: #0000FF;
            }
        body {
            background-image: url("<?= URLROOT; ?>/img/voedselbank.jpg");
        </style>   
</ul>

