<?php
	@session_start();

	class BillySteamAuth {
		public function __construct() {
			if (isset($_SESSION["steamid"])) {
				$this -> SteamID = $_SESSION["steamid"];
			} else {
				require("openid.php");
				$this -> openid = new LightOpenID($_SERVER["HTTP_HOST"]);
				$this -> openid -> identity = "http://steamcommunity.com/openid";
				
				if ($this -> openid -> mode) {
					if ($this -> openid -> validate()) {
						$this -> SteamID = basename($this -> openid -> identity);
						$_SESSION["steamid"] = $this -> SteamID;
					}
				}
			}
		}
		
		public function loginURL() {
			return $this -> openid -> authUrl();
		}
	}
?>
