#!/bin/bash

TEST_SUITE="temp_suite"
TEST_SUITE="unit_tests"

./vendor/bin/phpunit -c tests/phpunit.xml --testsuite ${TEST_SUITE}