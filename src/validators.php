<?php

Validator::extend('class', function($attribute, $value, $parameters) {
    return class_exists($value);
});