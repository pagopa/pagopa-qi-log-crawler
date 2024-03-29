#!/bin/bash

php flush_cache.php ;
php mock_insert.php ;
php mock_crawler.php ;
./vendor/bin/phpunit -c tests/phpunit.xml --testsuite temp_suite
