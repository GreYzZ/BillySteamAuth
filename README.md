BillySteamAuth is the tiniest PHP Steam Authenticator and works everywhere.

##Usage

Create a new directory anywhere you want and add billysteamauth.php and openid.php to it.

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
	header("LOCATION: " . $BillySteamAuth -> loginURL());
}
```
