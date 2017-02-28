<?php

class AfterInstall
{
	public function run($conatiner) {
		$config = $conatiner->get('config');

		$dashboardLayout = $config->get('dashboardLayout');

		if (!$dashboardLayout) $dashboardLayout = [];

		array_unshift($dashboardLayout,(object)[
			'name' => 'Test Layout',
		    'layout' => [
			    (object)[
				    'id' => 'test',
				    'name' => 'Test',
				    'x' => 0,
				    'y' => 0,
				    'width' => 2,
				    'height' => 2
			    ]
		    ]
		]);

		$config->set('dashboardLayout', $dashboardLayout);

		$config->save();
	}
}