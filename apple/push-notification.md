# Push notification

### Generate a certificate
Certificates > Production and select
```sh
Apple Push Notification service SSL (Sandbox & Production)
```

### PEM

Keychain Access > Apple Push Services com.foobar.app > right click > export .p12
```
sudo openssl pkcs12 -in aps_development.p12 -out aps_development.pem -nodes -clcerts
```

### Check

Open aps_development.pem and check if you have the right App ID:
```
friendlyName: Apple Push Services: com.foobar.app
```

