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
     * @apiSuccess {String} access_token User access token.
     * @apiSuccess {String} token_type Token type.
     * @apiSuccess {String} expires_in JWT time to live (seconds).
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "access_token": "eyJ0eXAiOiJKW1QiLCJhbG",
     *       "token_type": "bearer",
     *       "expires_in": "31536000"
     *     }
     */

    /**
     * @api {post} /api/v1.0/register Post Register
     * @apiVersion 1.0.0
     * @apiName Post Register
     * @apiDescription Register
     * @apiGroup Guest
     *
     * @apiParam {String} name Name.
     * @apiParam {String} email Email.
     * @apiParam {String} password Password.
     *
     * @apiSuccess {String} message Message.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "message": "Success"
     *     }
     */

    /**
     * @api {post} /api/v1.0/logout Post Logout
     * @apiVersion 1.0.0
     * @apiName Post Logout
     * @apiDescription Logout
     * @apiGroup User
     * @apiPermission user
     *
     * @apiHeader {String} Authorization eg: Bearer eyJ0eXAiOiJKV1.
     *
     * @apiSuccess {String} message Message.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "message": "Success"
     *     }
     */

    /**
     * @api {get} /api/v1.0/user/profile Get User Profile
     * @apiVersion 1.0.0
     * @apiName Get User Profile
     * @apiDescription User profile
     * @apiGroup User
     * @apiPermission user
     *
     * @apiHeader {String} Authorization eg: Bearer eyJ0eXAiOiJKV1.
     *
     * @apiSuccess {String} name Name.
     * @apiSuccess {String} email Email.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "name": "John Doe",
     *       "email": "john.doe@email.com"
     *     }
     */
}
