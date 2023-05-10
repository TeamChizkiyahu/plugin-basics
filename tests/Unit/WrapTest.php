<?php

use PBASICS\Modules\Components\ElementWraps\Wrap;

it('returns the correct wp_wrap output with valid input', function () {
    $wrap = '<p>Sample Content</p>';

    ob_start();
    Wrap::wp_wrap($wrap);
    $output = ob_get_clean();

    $expectedOutput = '<div class="wrap">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('returns the correct wp_wrap output with special characters in input', function () {
    $wrap = '<p>Sample Content with "quotes" and &amp; ampersand</p>';

    ob_start();
    Wrap::wp_wrap($wrap);
    $output = ob_get_clean();

    $expectedOutput = '<div class="wrap">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('throws InvalidArgumentException when given non-string input for wp_wrap', function () {
    $wrap = 123; // Non-string input

    expect(function () use ($wrap) {
        Wrap::wp_wrap($wrap);
    })->toThrow(InvalidArgumentException::class);
});

it('returns the correct page_wrap output with valid input', function () {
    $content = '<p>Sample Content</p>';
    $output = Wrap::page_wrap($content);

    expect($output)->toEqual($content);
});

it('throws InvalidArgumentException when given non-string input for page_wrap', function () {
    $content = 123; // Non-string input

    expect(function () use ($content) {
        Wrap::page_wrap($content);
    })->toThrow(InvalidArgumentException::class);
});

it('returns the correct page_direct_html_wrap output with valid input', function () {
    $wrap1 = '<p>Sample Content 1</p>';
    $wrap2 = '<p>Sample Content 2</p>';
    $output = Wrap::page_direct_html_wrap($wrap1, $wrap2);

    $expectedOutput = $wrap1 . ' ' . $wrap2;

    expect($output)->toEqual($expectedOutput);
});

it('returns the correct page_direct_html_wrap output with multiple input strings', function () {
    $wrap1 = '<p>Sample Content 1</p>';
    $wrap2 = '<p>Sample Content 2</p>';
    $wrap3 = '<p>Sample Content 3</p>';
    $output = Wrap::page_direct_html_wrap($wrap1, $wrap2, $wrap3);

    $expectedOutput = $wrap1 . ' ' . $wrap2 . ' ' . $wrap3;

    expect($output)->toEqual($expectedOutput);
});

it('throws InvalidArgumentException when given non-string input for page_direct_html_wrap', function () {
    $wrap1 = '<p>Sample Content 1</p>';
    $wrap2 = 123; // Non-string input

    expect(function () use ($wrap1, $wrap2) {
        Wrap::page_direct_html_wrap($wrap1, $wrap2);
    })->toThrow(InvalidArgumentException::class);
});

it('returns the correct container_wrap output with valid input', function () {
    $wrap = '<p>Sample Content</p>';
    $output = Wrap::container_wrap($wrap);

    $expectedOutput = '<div class="container">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('returns the correct container_wrap output with only whitespace', function () {
    $wrap = ' ';
    $output = Wrap::container_wrap($wrap);

    $expectedOutput = '<div class="container">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('returns the correct container_wrap output with special characters in input', function () {
    $wrap = '<p>Sample Content with "quotes" and &amp; ampersand</p>';
    $output = Wrap::container_wrap($wrap);

    $expectedOutput = '<div class="container">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('throws InvalidArgumentException when given non-string input for container_wrap', function () {
    $wrap = 123; // Non-string input

    expect(function () use ($wrap) {
        Wrap::container_wrap($wrap);
    })->toThrow(InvalidArgumentException::class);
});

it('returns the correct class_container_wrap output with valid input', function () {
    $class = 'custom-class';
    $wrap = '<p>Sample Content</p>';
    $output = Wrap::class_container_wrap($class, $wrap);

    $expectedOutput = '<div class="' . $class . '">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});


it('throws InvalidArgumentException when given non-string input for class_container_wrap', function () {
    $class = 'custom-class';
    $wrap = 123; // Non-string input

    expect(function () use ($class, $wrap) {
        Wrap::class_container_wrap($class, $wrap);
    })->toThrow(InvalidArgumentException::class);
});

it('returns the correct class_container_wrap output with empty class and valid input', function () {
    $class = '';
    $wrap = '<p>Sample Content</p>';
    $output = Wrap::class_container_wrap($class, $wrap);

    $expectedOutput = '<div class="' . $class . '">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('returns the correct class_container_wrap output with special characters in class', function () {
    $class = 'custom-class special_chars';
    $wrap = '<p>Sample Content</p>';
    $output = Wrap::class_container_wrap($class, $wrap);

    $expectedOutput = '<div class="' . $class . '">' .
        '<div>' .
        '<div>' .
        $wrap .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});
