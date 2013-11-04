<div class="row" style='margin-top:50px'>
    <div class="col-md-5 col-md-offset-2">
        <form method="POST">

            <input type='text' placeholder='search name or email' name='search' value='<?php echo @$_POST['search'] ?>'>
            <input type='submit' value='GO' style='width:80px'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id='gallery_countries' name='country'>
                <option>All countries</option>
                <?php
                foreach ($countries as $index=>$data)
                {
                    if ($_POST['country'] == strtolower($data['country'])) $selected = 'selected="selected"';
                    else $selected = null;
                    echo "<option " . $selected . " value='" . strtolower($data['country']) . "'>" . lang($data['country']) . "</option>";
                }
                ?>
            </select>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-offset-2">
        <div id='source'>
        <?php
        echo gallery_items($users);
        ?>
        </div>
    </div>

    <div class="col-md-4">
        <div style='position:fixed;margin-top:-75px'>
            <h3 id='gallery_large_text'></h3>
            <div class="span4"><img id='gallery_large_view'></div>
        </div>
    </div>
</div>