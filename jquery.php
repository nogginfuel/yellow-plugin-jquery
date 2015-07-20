<?php
// Copyright (c) 2015 Jef Lippiatt, http://nogginfuel.com
// This file may be used and distributed under the terms of the public license.
// jQuery plugin
class YellowJquery
{
	const Version = "0.1.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("JqueryCdn", "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/");
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "header")
		{
			$jqueryCdn = $this->yellow->config->get("JqueryCdn");
			$output .= "<script type=\"text/javascript\" src=\"{$jqueryCdn}jquery.min.js\"></script>\n";
		}
		return $output;
	}
}
$yellow->plugins->register("jquery", "YellowJquery", YellowJquery::Version);
?>