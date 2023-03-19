<?php

$city = (isset($_GET['city_select'])) ? $_GET['city_select'] : '';
$date = (isset($_GET['travel_date'])) ? $_GET['travel_date'] : '';
$minPrice = (isset($_GET['min_price'])) ? $_GET['min_price'] : '';
$maxPrice = (isset($_GET['max_price'])) ? $_GET['max_price'] : '';
?>
<div class="sidebar">
    <div class="right-sidebar">
        <div class="right-sidebar item">
            <h3><span class="right-sidebar">Recherche d'un voyage</span></h3>
            <form method="GET" id="destination-form" class="right-sidebar item-form" action="<?php echo esc_url(home_url('/destinations-search')) ?>">
                <div class="row">
                    <div class="col-md-12 form-group select1_inner">
                        <select name="city_select" id="destination-select" class="select2 select">
                            <option value="">Sélectionnez une ville</option>
                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'cities',
                                'hide_empty' => false,
                            ));
                            foreach ($terms as $term) {
                            ?>
                                <option value="<?php echo $term->name ?>" <?php echo ($city == $term->name) ? 'selected' : '' ?>><?php echo $term->name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-12 form-group input1_inner">
                        <input name="travel_date" type="text" id="destination-datepicker" class="form-control input datepicker" placeholder="Date du voyage" value="<?php echo (isset($date) ? $date : '') ?>">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="number" id="destination-min-price" name="min_price" placeholder="Min prix" style=" width: 40%; position: absolute; " value="<?php echo (isset($minPrice)) ? $minPrice : '' ?>">

                        <input type="number" id="destination-max-price" name="max_price" placeholder="Max prix" style=" width: 44%; float: right; " value="<?php echo (isset($maxPrice)) ? $maxPrice : '' ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Rechercher" class="butn-dark" style="cursor: pointer;">
                        <input type="button" id="reset-button" class="butn-dark" style="cursor: pointer;" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>