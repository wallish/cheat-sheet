# SQL cheat

### Add column

php vendor/bin/doctrine orm:convert-mapping --namespace="App\\V1\\Entity\\" --force --from-database annotation ./src
php vendor/bin/doctrine orm:generate-entities src/