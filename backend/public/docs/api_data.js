define({ "api": [
  {
    "type": "post",
    "url": "/api/v1.0/login",
    "title": "Post Login",
    "version": "1.0.0",
    "name": "Post_Login",
    "description": "<p>Login</p>",
    "group": "Guest",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "access_token",
            "description": "<p>User access token.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"name\": \"John Doe\",\n  \"access_token\": \"eyJ0eXAiOiJKW1QiLCJhbG\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/ApiDoc/Auth.php",
    "groupTitle": "Guest"
  },
  {
    "type": "get",
    "url": "/api/status",
    "title": "Get Status",
    "version": "1.0.0",
    "name": "Get_Status",
    "description": "<p>Display the server status</p>",
    "group": "Home",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Server status.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"Available\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/ApiDoc/Api.php",
    "groupTitle": "Home"
  }
] });
