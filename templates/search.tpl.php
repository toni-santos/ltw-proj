<?php

declare(strict_types=1);

function searchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <p class="body1 dark-bg rest-name">Restaurant name</p>
            <div class="sub-info">
                <p class="body2 dark-bg rest-loc">location</p>
                <ul class="body2 dark-bg rest-genres">
                    <li>g1</li>
                    <li>g2</li>
                    <li>g3</li>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>

<?php function checkboxButton() { ?>
    <div class="checkbox-wrapper">
        <label>
            <input class="checkbox" type="checkbox" name="a" checked></input><span class="checkbox-text shadow-nohov">Vegan</span>
        </label>
    </div>
<?php } ?>