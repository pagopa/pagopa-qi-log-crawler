#!/bin/bash

TEST_SUITE="temp_suite"
TEST_SUITE="crawler"

php flush_cache.php ;
php mock_insert.php ;
php mock_crawler.php ;
./vendor/bin/phpunit -c tests/phpunit.xml --testsuite ${TEST_SUITE}