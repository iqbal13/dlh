<?php

		function cek_login(){
			$CI =& get_instance();

			if($CI->session->userdata('login') == FALSE){
				redirect('login');
			}

		}