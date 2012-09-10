<?php

Autoloader::map(
	array('Slugger\\Slugger' => Bundle::path('slugger') . 'slugger.php')
);

Autoloader::alias('Slugger\\Slugger', 'Slugger');