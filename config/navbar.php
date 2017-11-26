<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Name of this menu
    "navbarTop" => [
        // Use for styling the menu
        "wrapper" => null,
        "class" => "rm-default rm-desktop",

        // Here comes the menu structure
        "items" => [

            "report" => [
                "text"  => t("Redovisningar"),
                "url"   => $this->di->get("url")->create("report"),
                "title" => t("Redovisningar av kmom"),
                "mark-if-parent" => true,
            ],

            "about" => [
                "text"  => t("Om"),
                "url"   => $this->di->get("url")->create("about"),
                "title" => t("Om sidan")
            ],

            "test" => [
                "text"  => t("Test"),
                "url"   => $this->di->get("url")->create("test"),
                "title" => t("Min test-sida")
            ],

            "grid" => [
                "text"  => t("Grid"),
                "url"   => $this->di->get("url")->create("grid"),
                "title" => t("Min grid-sida")
            ],

            "typography" => [
                "text"  => t("Typography"),
                "url"   => $this->di->get("url")->create("typography"),
                "title" => t("Min typography-sida")
            ],

            "theme" => [
                "text"  => t("Theme"),
                "url"   => $this->di->get("url")->create("theme"),
                "title" => t("Min theme-sida")
            ],

            "analysis" => [
                "text"  => t("Analyser"),
                "url"   => $this->di->get("url")->create("analysis"),
                "title" => t("Mina analyser"),
                "mark-if-parent" => true,
            ],

            "fun" => [
                "text"  => t("Fun"),
                "url"   => $this->di->get("url")->create("fun"),
                "title" => t("Rolig sida"),
            ],
        ],
    ],




    // Used as menu together with responsive menu
    // Name of this menu
    "navbarMax" => [
        // Use for styling the menu
        "id" => "rm-menu",
        "wrapper" => null,
        "class" => "rm-default rm-mobile",

        // Here comes the menu structure
        "items" => [

            "report" => [
                "text"  => t("Redovisningar"),
                "url"   => $this->di->get("url")->create("report"),
                "title" => t("Redovisningar av kmom"),
                "mark-if-parent" => true,
            ],

            "about" => [
                "text"  => t("Om"),
                "url"   => $this->di->get("url")->create("about"),
                "title" => t("Om sidan")
            ],

            "test" => [
                "text"  => t("Test"),
                "url"   => $this->di->get("url")->create("test"),
                "title" => t("Min test-sida")
            ],

            "grid" => [
                "text"  => t("Grid"),
                "url"   => $this->di->get("url")->create("grid"),
                "title" => t("Min grid-sida")
            ],

            "typography" => [
                "text"  => t("Typography"),
                "url"   => $this->di->get("url")->create("typography"),
                "title" => t("Min typography-sida")
            ],

            "theme" => [
                "text"  => t("Theme"),
                "url"   => $this->di->get("url")->create("theme"),
                "title" => t("Min theme-sida")
            ],

            "analysis" => [
                "text"  => t("Analyser"),
                "url"   => $this->di->get("url")->create("analysis"),
                "title" => t("Mina analyser"),
                "mark-if-parent" => true,
            ],

            "fun" => [
                "text"  => t("Fun"),
                "url"   => $this->di->get("url")->create("fun"),
                "title" => t("Rolig sida"),
            ],
        ],
    ],



    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    "callback" => function ($url) {
        return !strcmp($url, $this->di->get("request")->getCurrentUrl(false));
    },



    /**
     * Callback to check if current page is a decendant of the menuitem,
     * this check applies for those menuitems that has the setting
     * "mark-if-parent" set to true.
     *
     */
    "is_parent" => function ($parent) {
        $url = $this->di->get("request")->getCurrentUrl(false);
        return !substr_compare($parent, $url, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
     /*
    "create_url" => function ($url) {
        return $this->di->get("url")->create($url);
    },*/
];
