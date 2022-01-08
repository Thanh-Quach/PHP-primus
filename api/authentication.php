<?php
use Firebase\JWT\JWT;

require_once('./vendor/autoload.php');
	
	include'./const.php';
	include'./database/database.php';
	$res = $MySQLiconn->query("SELECT *  FROM users WHERE username='".$_POST['username']."'");
	while ($row = $res->fetch_array()) {
	if ($row['password'] == $_POST['password']){
		    
			$role = $row['role'];
			$tokenId    = base64_encode(random_bytes(16));
			$issuedAt   = new DateTimeImmutable();
			$location   = $row['accessible_location'];
			// $expire     = $issuedAt->modify('+6 minutes')->getTimestamp();


		    $username = $row['username'];            // Retrieved from filtered POST data

		    // Create the token as an array
		    $data = [
		        'iat'  => $issuedAt->getTimestamp(),    // Issued at: time when the token was generated
		        'jti'  => $tokenId,                     // Json Token Id: an unique identifier for the token
		        'iss'  => $serverName,                  // Issuer
		        'nbf'  => $issuedAt->getTimestamp(),    // Not before
		        // 'exp'  => $expire,                      // Expire
		        'data' => [                             // Data related to the signer user
		            'userName' => $row['username'],            // User name
		        	'role' => $row['role'],
		        	'id'=>$row['uid']
		        ]
		    ];

		    // Encode the array to a JWT string.
		    $token = JWT::encode(
		        $data,      //Data to be encoded in the JWT
		        $secret, // The signing key
		        'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
		    );

?>
		<script>
			var token ='<?php echo $token?>';
			var home = "<?php echo $main?>?login=<?php echo $role?>"
			var access_location = "<?php echo $location?>";
			localStorage.setItem('token', token);
			localStorage.setItem('home', home);
			localStorage.setItem('location', JSON.stringify(access_location));
			window.location.replace(home);
		</script>
<?php
		}else{
?>
		<script>
			alert('Wrong username or password');
			window.location.replace("<?php echo $main?>");
		</script>";
<?php		
		}
	}
?>