### Setup ssl on nginx

Create ssl folder
```sh
  mkdir /etc/nginx/ssl
```

Configuration type
```sh
 server {
    listen 80;
	listen 443 ssl;

	ssl_certificate /etc/nginx/ssl/your_domain_name.pem; (or bundle.crt)
	ssl_certificate_key etc/nginx/ssl/your_domain_name.key;
    ssl_protocols TLSv1.2;
    ssl_ciphers 'ECDHE-ECDSA-AES256-GCM-SHA384:ECDHE-RSA-AES256-GCM-SHA384:ECDHE-ECDSA-CHACHA20-POLY1305:ECDHE-RSA-CHACHA20-POLY1305:ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES256-SHA384:ECDHE-RSA-AES256-SHA384:ECDHE-ECDSA-AES128-SHA256:ECDHE-RSA-AES128-SHA256';
    ssl_prefer_server_ciphers on;
    ssl_session_timeout 1d;
    ssl_session_cache shared:SSL:50m;
    ssl_session_tickets off;

	location / {

	}
}
```

```sh
sudo /etc/init.d/nginx configtest && sudo /etc/init.d/nginx restart
```

### Troobleshooting

Generate key and erase password

if I got this kind of error 
```
SSL_CTX_use_PrivateKey_file("/etc/nginx/ssl/key.key") failed (SSL: error:0906406D:PEM routines:PEM_def_callback:problems getting password error:0907B068:PEM routines:PEM_READ_BIO_PRIVATEKEY:bad password read error:140B0009:SSL routines:SSL_CTX_use_PrivateKey_file:PEM lib)
```
That's means I generate a key with a passphrase. I need to erase it :

```sh
 openssl rsa -in /etc/nginx/ssl/key.key -out /etc/nginx/ssl/newkey.key
```

Useful link
```
https://mozilla.github.io/server-side-tls/ssl-config-generator/
``