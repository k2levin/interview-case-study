<?php

namespace App\Http\Controllers\Api\ApiDoc;

// routes/v1_0/auth.php
class Auth
{
    /**
     * @api {post} /api/v1.0/login Post Login
     * @apiVersion 1.0.0
     * @apiName Post Login
     * @apiDescription Login
     * @apiGroup Guest
     *
     * @apiParam {String} email Email.
     * @apiParam {String} password Password.
     *
     * @apiSuccess {String} email Email.
     * @apiSuccess {String} access_token  User access token.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "name": "John Doe",
     *       "access_token": "eyJ0eXAiOiJKW1QiLCJhbG"
     *     }
     */
}
