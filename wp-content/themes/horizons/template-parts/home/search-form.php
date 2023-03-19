<form method="GET" action="<?php esc_url(home_url('/')) ?>" class="form1 clearfix">
    <div class="col1 c1">
        <div class="select1_wrapper">
            <label>Rechercher</label>
            <div class="select1_inner">
                <select class="select2 select" name="s" style="width: 100%">
                    <option value="both">Rechercher</option>
                    <?php $cherche = isset($args['cherche']) ? $args['cherche'] : '' ?>
                    <option value="both" <?php echo ($cherche == 'both') ? 'selected' : '' ?>>Les deux</option>
                    <option value="voyage" <?php echo ($cherche == 'voyage') ? 'selected' : '' ?>>Voyage</option>
                    <option value="hotel" <?php echo ($cherche == 'hotel') ? 'selected' : '' ?>>Hôtel</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col1 c2">
        <div class="select1_wrapper">
            <label>Destinations</label>
            <div class="select1_inner">
                <select class="select2 select" name="sd" style="width: 100%">
                    <option value="">Destinations</option>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'cities',
                        'hide_empty' => false
                    ));
                    foreach ($terms as $term) {
                        $destination = isset($args['destination']) ? $args['destination'] : '';
                    ?>
                        <option value="<?php echo $term->name ?>" <?php echo ($destination == $term->name) ? 'selected' : '' ?>><?php echo $term->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col1 c4">
        <div class="select1_wrapper">
            <label>La durée</label>
            <div class="input1_inner">
                <input value="<?php echo isset($args['duration']) ? $args['duration'] : '' ?>" name="dur" type="text" id="destination-datepicker" class="form-control input datepicker" placeholder="Date du voyage">
            </div>
        </div>
    </div>
    <div class="col1 c5">
        <button type="submit" class="btn-form1-submit"><i class="ti-search"></i> Rechercher</button>
    </div>
</form>