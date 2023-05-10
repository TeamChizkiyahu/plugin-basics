<?php

use PBASICS\Modules\Components\Headers\TitleWraps;



it('returns the correct title block with valid input', function () {
    $containerClass = 'title-block';
    $title = 'Sample Title';
    $tag = 'Sample Tagline';
    $desc = 'This is a sample description.';

    $output = TitleWraps::title_block($containerClass, $title, $tag, $desc);

    $expectedOutput = '<div class="' . $containerClass . '">' .
        '<div>' .
        '<div>' .
        '<div class="container">' .
        '<div>' .
        '<h1>' . $title . '</h1>' .
        '<p>' . $tag . '</p>' .
        '<p>' . $desc . '</p>' .
        '</div>' .
        '</div>' .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});

it('throws InvalidArgumentException when given non-string input', function () {
    $containerClass = 'title-block';
    $title = 123; // Non-string input
    $tag = 'Sample Tagline';
    $desc = 'This is a sample description.';

    expect(function () use ($containerClass, $title, $tag, $desc) {
        TitleWraps::title_block($containerClass, $title, $tag, $desc);
    })->toThrow(InvalidArgumentException::class);
});

it('handles empty inputs correctly', function () {
    $containerClass = '';
    $title = '';
    $tag = '';
    $desc = '';

    $output = TitleWraps::title_block($containerClass, $title, $tag, $desc);

    $expectedOutput = '<div class="' . $containerClass . '">' .
        '<div>' .
        '<div>' .
        '<div class="container">' .
        '<div>' .
        '<h1>' . $title . '</h1>' .
        '<p>' . $tag . '</p>' .
        '<p>' . $desc . '</p>' .
        '</div>' .
        '</div>' .
        '</div>' .
        '</div>' .
        '</div>';

    expect($output)->toEqual($expectedOutput);
});
