<?php
// Jquery 3.3.1 plugin, https://github.com/nibreh/yellow-plugin-jquery
// Copyright (c) 2018 nogginfuel, update by Juh Nibreh
// This file may be used and distributed under the terms of the public license.

class YellowJquery {
    const VERSION = "0.7.7";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        if(!$this->yellow->config->isExisting("jQuery")) {
			$this->yellow->config->setDefault("jQuery", "https://code.jquery.com/jquery-3.3.1.min.js");
		}
    }
    
    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name == "footer") {
			$jquery = $this->yellow->config->get("jQuery");
			$output .= "<script type=\"text/javascript\" src=\"{$jquery}\"></script>\n";
        }
        return $output;
    }
}

$yellow->plugins->register("Jquery", "YellowJquery", YellowJquery::VERSION);
