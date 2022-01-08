<?php

declare(strict_types=1);

use Firebase\JWT\JWT;
// Do some checking for the request method here, if desired.

// Attempt to extract the token from the Bearer header
if (! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    header('HTTP/1.0 400 Bad Request');
    echo 'Token not found in request';
    exit;
}

$jwt = $matches[1];
if (! $jwt) {
    // No token was able to be extracted from the authorization header
    header('HTTP/1.0 400 Bad Request');
    exit;
}

JWT::$leeway += 60;
$token = JWT::decode((string)$jwt, $secret, ['HS512']);
$now = new DateTimeImmutable();

if ($token->iss !== $serverName
    // || $token->nbf > $now->getTimestamp() ||
    // $token->exp < $now->getTimestamp()
)
{
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

header( "Content-type: application/json" );
// The token is valid, so send the response back to the user

