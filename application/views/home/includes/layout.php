<?php
	
	if (!in_array('header', $exclude))
		$this->load->view($module . '/includes/header', array('title' => $title));
	if (!in_array('navbar', $exclude))
		$this->load->view($module . '/includes/navbar');
	if (!in_array('sidebar', $exclude))
		$this->load->view($module . '/includes/sidebar');
	
	$this->load->view($module . '/' . $content);
	
	if (!in_array('footer', $exclude))
		$this->load->view($module . '/includes/footer');
?>
