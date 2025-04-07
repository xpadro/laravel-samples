<?php

use core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();

    $container->bind('foo', function () {
        return 'bar';
    });

    // act
    $result = $container->resolve('foo');

    // assert
    expect($result)->toEqual('bar');

});
