<?php
declare(strict_types = 1);

require_once("../php/request.php");

function restaurantRequestsTop(Restaurant $restaurant) { ?>
    <p class="restaurant-req-top h5"><?=$restaurant->name?>'s Orders</p>
<?php }

function restaurantRequest(Request $request, PDO $db) { ?>
    <article class="restaurant-req">
        <section class="restaurant-req-left">
            <p class="body1"><?=$request->getUsername($db)?></p>
            <p class="subtitle2"><?=$request->value?>€</p>
        </section>
        <section class="restaurant-req-right">
            <form method="POST" action="../actions/update_request_state.php">
                <select id="req-state" class="shadow-nohov pointer dark-bg" name="req-state">
                    <option <?php 
                    if ($request->state == 'Received'){
                        echo "selected";
                    }
                    ?> value="Received">Received</option>
                    <option <?php 
                    if ($request->state == 'Preparing'){
                        echo "selected";
                    }
                    ?> value="Preparing">Preparing</option>
                    <option <?php 
                    if ($request->state == 'Ready'){
                        echo "selected";
                    }
                    ?> value="Ready">Ready</option>
                    <option <?php 
                    if ($request->state == 'Delivered'){
                        echo "selected";
                    }
                    ?> value="Delivered">Delivered</option>
                </select>
                <div class="req-action-buttons">
                    <input type="hidden" name="requestID" value="<?=$request->requestID?>">
                    <input type="submit" class="blank-button material-icons dark-bg" name="req-button" value="done">
                    <input type="submit" class="blank-button material-icons dark-bg" name="req-button" value="close">
                </div>
            </form>
        </section>
    </article>
<?php } ?>

<?php
function userRequestsTop() { ?>
    <p class="restaurant-req-top h5">My Orders</p>
<?php } ?>

<?php
function userRequest(Request $request, PDO $db) { ?>
    <article class="restaurant-req">
        <section class="restaurant-req-left">
            <p class="body1"><?=$request->getRestaurantName($db)?></p>
            <p class="subtitle2"><?=$request->value?>€</p>
        </section>
        <section class="restaurant-req-right">
            <form method="POST" action="../actions/update_request_state.php">
                <div class="req-action-buttons">
                    <input type="hidden" name="requestID" value="<?=$request->requestID?>">
                    <input type="hidden">
                    <input type="submit" class="blank-button material-icons dark-bg" name="req-button" value="close">
                </div>
            </form>
        </section>
    </article>
<?php } ?>