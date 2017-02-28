<?php

class AfterUninstall
{
	public function run($conatiner) {
		$config = $conatiner->get('config');

		$dashboardLayout = $config->get('dashboardLayout');

		foreach ($dashboardLayout as $key => $layout) {
			if ($layout->name == 'Test Layout') {
				unset($dashboardLayout[$key]);
				break;
			}
		}

		$config->set('dashboardLayout', $dashboardLayout);

		$config->save();
	}
}