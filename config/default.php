<?php

/**
 * Gravatar configuration
 */

return array(
	
    // ======================================================================
	// Secure Requests
	// ======================================================================
	// If you're displaying Gravatars on a page that is being served over SSL
	// (e.g. the page URL starts with HTTPS), then you'll want to serve your
	// Gravatars via SSL as well, otherwise you'll get annoying security
	// warnings in most browsers.
 	// ======================================================================
 	'secure' => Request::secure(),

);