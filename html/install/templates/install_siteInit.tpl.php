<div class="confirmInfo" style="text-align:center"><?php echo _INSTALL_L36 ?></div>

<h3><?php echo _INSTALL_L37 ?></h3>
<p><input type="text" class="adminame" name="adminname"></p>

<h3><?php echo _INSTALL_L38 ?></h3>
<p><input type="text" class="adminmail" name="adminmail" maxlength="60"></p>

<h3><?php echo _INSTALL_L39 ?></h3>
<p><input type="password" class="adminpass" name="adminpass"></p>

<h3><?php echo _INSTALL_L74 ?></h3>
<p><input type="password" class="adminpass2" name="adminpass2"></p>

<?php if (PHP_VERSION_ID >= 50500)  : ?>

    <h3><?php echo _INSTALL_L77 ?></h3>
    <p><select name="timezone">
            <?php $timezones = $this->v('timezones'); ?>
            <?php foreach ($this->v('timediffs') as $timediff => $text) : ?>
                <?php if ($timediff == $this->v('current_timediff')) : ?>
                    <option value="<?php echo $timezones[$timediff] ?>" selected="selected"><?php echo $text ?></option>
                <?php else : ?>
                    <option value="<?php echo $timezones[$timediff] ?>"><?php echo $text ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select></p>

<?php endif ?>
