	1. Removing index.php from the url:

		Make a file in root directory. Save it by the name of .htaccess.
		It will contain:

		RewriteEngine On
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule ^(.*)$ index.php/$1 [L]

		Also in config.php file:

		$config['index_page'] = 'index.php';    
		 change  to    
		$config['index_page'] = '';

	2. Message: Call to undefined function base_url()
		just add

		$autoload['helper'] = array('url');
		in autoload.php in your config file. 