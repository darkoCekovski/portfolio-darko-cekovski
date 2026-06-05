<?php
$secret = 'DarkoNetcupDeploy2024';
$payload = file_get_contents('php://input');
$signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);

if (!hash_equals($signature, $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '')) {
    http_response_code(403);
    exit('Forbidden');
}

shell_exec('/bin/bash /darkocekovski.com/deploy.sh >> /darkocekovski.com/logs/deploy.log 2>&1 &');
http_response_code(200);
echo 'Deploying...';
