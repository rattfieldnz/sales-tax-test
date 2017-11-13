<?php
return [
    'source'        => [
        'path'    => ["/var/www/sales-tax-test.localhost/build/sales-tax-test/app/Functions/" => true], // required
        'exclude' => ['/var/www/sales-tax-test.localhost/build/sales-tax-test/app/Interfaces/']
    ],
    'savePath'      => '/var/www/sales-tax-test.localhost/build/sales-tax-test/tests/', // required
    'classExclude'  => [
        'name'      => [], // array of full class names
        'regexp'    => [], // array of reqular expressions
        'parent'    => [], // array of parent classes
        'implement' => [], // array of interfaces
    ],
];