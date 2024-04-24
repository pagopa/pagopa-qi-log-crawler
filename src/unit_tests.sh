#!/bin/bash

TEST_SUITE="temp_suite"
TEST_SUITE="unit_tests"
TEST_SUITE="temp_suite"

./vendor/bin/phpunit -c tests/phpunit.xml --testsuite ${TEST_SUITE}