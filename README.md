# farida-project
development of computer sales shop. for farida's project

*download XAMP and install it on the pc you want to use 
*on the config button of apache row do the following changes
	-select Apache(httpd.conf) and set
		-Listen 8015
		-ServerName localhost:8015
*on the config button of apache row do the following changes 
	--select Apache(httpd-ssl.conf) and set		
		--Listen 10443
		--<VirtualHost _default_:10443>