<?php

namespace Domain\Service;

use Domain\Authentication\Entity\User;

class TokenJwtGenerator
{
    private const HEADERS = ['alg' => 'HS256','typ' => 'JWT'];
    private const SECRET = 'secret-tech';

    /**
     * @param string $name
     *
     * @return string
     */
    public static function generate(string $name): string
    {
        $headers_encoded = self::base64url_encode(json_encode(self::HEADERS));
        $payload = [
            'sub' => '1234567890',
            'username' => $name,
            'exp' => (time() * 60)
        ];
        $payload_encoded = self::base64url_encode(json_encode($payload));

        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", self::SECRET, true);
        $signature_encoded = self::base64url_encode($signature);

        return "$headers_encoded.$payload_encoded.$signature_encoded";
    }

    /**
     * @param string $jwt
     *
     * @return bool
     */
    public static function isValid(string $jwt): bool
    {
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];

        self::getUsername($jwt);
        $expiration = json_decode($payload)->exp;
        $is_token_expired = ($expiration - time()) < 0;

        $base64_url_header = self::base64url_encode($header);
        $base64_url_payload = self::base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, self::SECRET, true);
        $base64_url_signature = self::base64url_encode($signature);

        $is_signature_valid = ($base64_url_signature === $signature_provided);

        if ($is_token_expired || !$is_signature_valid) {
            return false;
        }

        return true;
    }

    /**
     * @param string $str
     *
     * @return string
     */
    private static function base64url_encode(string $str): string
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
}
