<?php
	@session_start();

	class BillySteamAuth {
		public function __construct($sessionname = "steamid") {
			if (isset($_SESSION[$sessionname])) {
				$this -> SteamID = $_SESSION[$sessionname];
			} else {
				require("openid.php");
				$this -> openid = new LightOpenID($_SERVER["HTTP_HOST"]);
				$this -> openid -> identity = "https://steamcommunity.com/openid";
				
				if ($this -> openid -> mode) {
					if ($this -> openid -> validate()) {
						$this -> SteamID = basename($this -> openid -> identity);
						$_SESSION[$sessionname] = $this -> SteamID;
					}
				}
			}
		}
		
		public function loginURL() {
			return $this -> openid -> authUrl();
		}
	}
?>
