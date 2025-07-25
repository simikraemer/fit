<?php
require_once 'template.php';
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Pizza Kalorienrechner</title>
    <link rel="stylesheet" href="pizza.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pizzaSelect = document.getElementById('pizza');
            const durchmesserSlider = document.getElementById('durchmesser');
            const durchmesserLabel = document.getElementById('durchmesser-wert');
            const kalorienOutput = document.getElementById('kalorien');

            const basisKalorienProQuadratCm = {
                margherita: 2.0,
                salami: 2.5,
                funghi: 2.2,
                hawaii: 2.3,
                quatroformaggi: 2.8
            };

            function berechneKalorien() {
                const sorte = pizzaSelect.value;
                const durchmesser = parseFloat(durchmesserSlider.value);
                const radius = durchmesser / 2;
                const flaeche = Math.PI * radius * radius;
                const kalorien = Math.round(flaeche * basisKalorienProQuadratCm[sorte]);

                durchmesserLabel.textContent = durchmesser + ' cm';
                kalorienOutput.textContent = kalorien + ' kcal';
            }

            pizzaSelect.addEventListener('change', berechneKalorien);
            durchmesserSlider.addEventListener('input', berechneKalorien);

            berechneKalorien(); // initial
        });
    </script>
</head>
<body>

<div class="container">
    <div class="form-block">
        <div class="input-row">
            <div class="input-group">
                <label for="pizza" class="zeitbereich-label">Pizzasorte</label>
                <select id="pizza">
                    <option value="margherita">Margherita</option>
                    <option value="salami">Salami</option>
                    <option value="funghi">Funghi</option>
                    <option value="hawaii">Hawaii</option>
                    <option value="quatroformaggi">Quattro Formaggi</option>
                </select>
            </div>
            <div class="input-group">
                <label for="durchmesser" class="zeitbereich-label">Durchmesser: <span id="durchmesser-wert">0 cm</span></label>
                <input type="range" id="durchmesser" class="zeitbereich-slider" min="0" max="100" value="26">
            </div>
        </div>
        <div id="kalorien" class="kalorien-output">0 kcal</div>
    </div>
</div>

</body>
</html>
