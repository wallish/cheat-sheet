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
    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;

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