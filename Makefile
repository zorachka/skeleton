psalm:
	vendor/bin/psalm
test:
	vendor/bin/phpunit
test.coverage:
	vendor/bin/phpunit --coverage-html coverage
format:
	vendor/bin/php-cs-fixer fix --allow-risky=yes
console:
	php bin/app.php --ansi
cache.clear:
	php bin/app.php --ansi cache:clear
serve:
	cd public && php -S 0.0.0.0:9900
share:
	ngrok http 9900
migrations.diff:
	composer console migrations:list && composer console migrations:diff -- --formatted
migrations.migrate:
	composer console migrations:migrate

.PHONY: test
