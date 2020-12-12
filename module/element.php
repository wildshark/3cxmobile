<?php

function user_login_dropdown_menu(){

    return"
        <li class='dropdown user' id='header-user'>
			<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
				<img alt='' src='img/avatars/avatar3.jpg'>
				<span class='username'>{$_COOKIE['username']}</span>
				<i class='fa fa-angle-down'></i>
		    </a>
			<ul class='dropdown-menu'>
				<li><a href='#'><i class='fa fa-user'></i> My Profile</a></li>
				<li><a href='#'><i class='fa fa-cog'></i> Account Settings</a></li>
				<li><a href='#'><i class='fa fa-eye'></i> Privacy Settings</a></li>
				<li><a href='?user=logoff&log=off'><i class='fa fa-power-off'></i> Log Out</a></li>
			</ul>
		</li>
    ";
}

?>