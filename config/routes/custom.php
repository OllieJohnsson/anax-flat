<?php
/**
 * Add routes to the router, processed in the same order they are added.
 * The variabel $app relates to $this.
 */

/**
 * Add HTML classes based on query string.
 */
if ($app->request->hasGet("vgrid")) {
    $app->theme->appendToVariable("htmlClass", "vgrid");
}

if ($app->request->hasGet("hgrid")) {
    $app->theme->appendToVariable("htmlClass", "hgrid");
}



// Support theme selector by adding class to html element
if ($app->session->has("theme")) {
    $theme = $app->session->get("theme");

    if (isset($theme["class"])) {
        $app->theme->appendToVariable("htmlClass", $theme["class"]);
    }

    if (isset($theme["stylesheets"])) {
        // Remove all stylesheets before applying the new ones
        $app->theme->setConfigKey("stylesheets", []);

        // Set choosen stylesheets
        $stylesheets = $theme["stylesheets"];
        if (is_string($stylesheets)) {
            $app->theme->addStylesheet($stylesheets);
        } elseif (is_array($stylesheets)) {
            foreach ($stylesheets as $stylesheet) {
                $app->theme->addStylesheet($stylesheet);
            }
        }
    }
}



/**
 * Add your own custom route
 */
$app->router->add("theme-selector", function () use ($app) {
    // Load configuration for theme selector
    $themeConfig = $app->loadFile("theme-selector.php");
    $themes = $themeConfig["themes"];
    
    // Check if form was posted with a valid theme
    $postTheme = $app->request->getPost("theme");
    if ($postTheme) {
        if (array_key_exists($postTheme, $themes)) {
            // This theme is valid
            $this->di->session->set(
                "theme-message",
                "<p>Setting theme to "
                    . $postTheme
                    . ".<p>Theme details are:<br><pre>"
                    . print_r($themes[$postTheme], 1)
                    . "</pre>"
            );
            $theme = $themes[$postTheme];
            $theme["key"] = $postTheme;
            $this->di->session->set("theme", $theme);
            $this->di->response->redirect($this->di->request->getCurrentUrl());
        } elseif ($postTheme == -2 || $postTheme == -1) {
            // Deselect the active theme
            $this->di->session->delete("theme");
            $this->di->response->redirect($this->di->request->getCurrentUrl());
        }

        throw new Exception("Invalid posted form in theme selector", 1);
    }

    // Prepare the resulting page
    $app->theme->setTitle("Set theme");
    $app->views->add("theme-selector/index", [
        "themes"       => $themeConfig["themes"],
        "separator"    => $themeConfig["separator"],
        "currentTheme" => $this->di->session->get("theme"),
        "message"      => $this->di->session->readOnce("theme-message"),
    ]);
});
