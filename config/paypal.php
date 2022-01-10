<?php 
return [ 
    'client_id' => 'Aeu2DXAfHpKIJDMHaGN9wn9w_FdzYnCk1fmssljA69k9lBtw1BoN-piXYWej-4XBbPPmurEi7clrtHeA',
	'secret' => 'EAgb8oy0q0J7-zOHtLnuFf2OzQguYfv9CBUs5PO5c2XFgUR-fgmG9vEfkIAxtz3jXhfIuE7-O_FbvYoW',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];