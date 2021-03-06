

install-packages:
	docker-compose run --rm composer

generate-coverage:
	docker-compose run --rm generate-coverage

generate-api-reference:
	docker-compose run --rm generate-api-reference

test:
	make test-php-latest && \
	make test-php-8.0 && \
	make test-php-7.4

test-php-latest:
	docker-compose run --rm php-latest
test-php-8.0:
	docker-compose run --rm php-8.0
test-php-7.4:
	docker-compose run --rm php-7.4
test-php-7.3:
	docker-compose run --rm php-7.3
test-php-7.2:
	docker-compose run --rm php-7.2
