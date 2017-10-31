<?php
/**
 * Theme selector in the design course.
 */

?><article>
<h1>Theme selector</h1>

<form method="post">
    <fieldset>
        <legend>Select a theme</legend>
        <select name="theme" onchange="form.submit();">
            <option value="-1">No specific theme currently selected</option>
            <option value="-2">Deselect active theme and use default settings</option>
            <?php foreach ($themes as $key => $value) :
                $selected = $key == $currentTheme["key"]
                    ? "selected"
                    : null;
                $separate = $value === $separator
                    ? "disabled=\"disabled\""
                    : null;
                $value = $separate
                    ? $separator
                    : "$key - " . $value["title"];
            ?>
                <option value="<?= $key ?>" <?= $selected ?> <?= $separate ?>>
                    <?= $value ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <output>
            <?php if ($message) : ?>
                <p><?= $message ?></p>
            <?php endif; ?>
        </output>
    </fieldset>
</form>

<p>Here you can select a theme. By selecting a theme, the theme details are stored in the session and applied to the template when rendering the resulting page.</p>

<p>Basically, the theme you select will do the following:</p>

<ul>
    <li>Remove all stylesheets previously defined in <code>config/theme.php</code>.</li>
    <li>Add classes to the <code>&lt;html&gt;</code> element, if defined.</li>
    <li>Add stylesheets as defined.</li>
</ul>

<p>You edit the settings for each theme in the configuration file <code>config/theme-selecotr.php</code>.</p>

<p>The view for the theme selector is in <code>view/theme-selector/index.tpl.php</code>. There is no need to edit this file.</p>

<p>The code that applies the details from session, to the template during rendering, is <code>config/routes/custom.php</code>. There is no need to change that file.</p>

</article>
