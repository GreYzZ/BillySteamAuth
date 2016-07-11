BillySteamAuth is the tiniest PHP Steam Authenticator and works everywhere.

##Usage

Create a new directory anywhere you want and add `billysteamauth.php` and `openid.php` to it.

##Example

Index page:

```php
session_start();
if (!isset($_SESSION["session variable name"])) {
	header("LOCATION: /login/");
}
```

Login page:

```php
include("inc/billysteamauth/billysteamauth.php");
$BillySteamAuth = new BillySteamAuth("session variable name");

if (isset($BillySteamAuth -> SteamID)) {
	header("LOCATION: /");
}

if (isset($_POST["login"]) && !isset($_SESSION["session variable name"])) {
	header("LOCATION: " . $BillySteamAuth -> LoginURL());
}
```

##Other Functions

`StripOpenID`

Returns `$_SERVER["REQUEST_URI"]` without the OpenID `$_GET` variables.

```php
include("inc/billysteamauth/billysteamauth.php");
$BillySteamAuth = new BillySteamAuth("session variable name");

if (isset($BillySteamAuth -> SteamID)) {
	header("LOCATION: /");
}

if (isset($_POST["login"]) && !isset($_SESSION["session variable name"])) {
	header("LOCATION: " . $BillySteamAuth -> LoginURL());
}

if (isset($_GET["openid_identity"])) {
	header("LOCATION: //" . $_SERVER["HTTP_HOST"] . "/" . $BillySteamAuth -> StripOpenID());
}
```
