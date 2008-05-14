<?php

class LoginAction extends Action {
	
	function handle($args) {
		parent::handle($args);
		if (common_logged_in()) {
			common_user_error(_t('Already logged in.'));
		} else if ($this->arg('METHOD') == 'POST') {
			$this->check_login();
		} else {
			$this->show_form();
		}
	}

	function check_login() {
		# XXX: form token in $_SESSION to prevent XSS
		# XXX: login throttle
		$nickname = $this->arg('nickname');
		$password = $this->arg('password');
		if (common_check_user($nickname, $password)) {
			common_set_user($nickname);
			common_redirect(common_local_url('all',
											 array('nickname' =>
												   $nickname)));
		} else {
			$this->show_form(_t('Incorrect username or password.'));
		}
	}
	
	function show_form($error=NULL) {
		
		common_show_header(_t('Login'));
		if (!is_null($error)) {
			common_element('div', array('class' => 'error'), $msg);
		}
		common_start_element('form', array('method' => 'POST',
										   'id' => 'login',
										   'action' => common_local_url('login')));
		common_element('label', array('for' => 'username'),
					   _t('Name'));
		common_element('input', array('name' => 'username',
									  'type' => 'text',
									  'id' => 'username'));
		common_element('label', array('for' => 'password'),
					   _t('Password'));
		common_element('input', array('name' => 'password',
									  'type' => 'password',									  
									  'id' => 'password'));
		common_element('input', array('name' => 'submit',
									  'type' => 'submit',
									  'id' => 'submit'),
					   _t('Login'));
		common_element('input', array('name' => 'cancel',
									  'type' => 'button',
									  'id' => 'cancel'),
					   _t('Cancel'));
	}
}
