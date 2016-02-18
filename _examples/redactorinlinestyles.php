<?php

/**
 * craft/config/redactorinlinestyles.php
 *
 * Settings from your Redactor config JSON in craft/config/redactor/ will override these settings.
 *
 * Additional file settings only available in this plugin configuration file (use environment variables
 * or root-relative path to configure the URLs):
 * - cssFile:   The URL to a CSS fie with custom toolbar and editor styles.
 * - iconsFile: The URL to a SVG sprite file with toolbar icons.
 *
 * The cp.svg example sprite contains Google Material Icons and was created with the Icomoon App
 * https://icomoon.io/app
 */
return array(
    'cssFile' => '/assets/css/cp.css',
    'iconsFile' => '/assets/svg/icons/cp.svg',
    'setIcons' => array(
        'html' => 'settings',
        'format' => 'format_size',
        'bold' => 'format_bold',
        'italic' => 'format_italic',
        'lists' => 'format_list_bulleted',
        'file' => 'attach_file',
        'image' => 'crop_original',
        'video' => 'ondemand_video',
        'table' => 'border_all',
        'link' => 'insert_link',
        'horizontalrule' => 'remove',
        'fullscreen' => 'fullscreen',
        'quote' => 'format_quote',
        'code' => 'code',
        'marked' => 'create',
        'preventlinebreak' => 'block',
        'style' => 'more_vert',
    ),
    'buttonsAddAfter' => 'italic',
    'buttonsAdd' => array(
        array(
            'title' => 'Quote',
            'args' => ['q'],
        ),
        array(
            'title' => 'Code',
            'dropdown' => array(
                array(
                    'title' => 'HTML/Twig',
                    'args' => ['code', 'class', 'language-twig'],
                ),
                array(
                    'title' => 'CSS',
                    'args' => ['code', 'class', 'language-css'],
                ),
                array(
                    'title' => 'JS',
                    'args' => ['code', 'class', 'language-js'],
                ),
                array(
                    'title' => 'PHP',
                    'args' => ['code', 'class', 'language-php'],
                ),
            ),
        ),
        array(
            'title' => 'Marked',
            'args' => ['mark'],
        ),
        array(
            'title' => 'Prevent line-break',
            'args' => ['span', 'class', 'nobr'],
        ),
        array(
            'title' => 'Style',
            'dropdown' => array(
                array(
                    'title' => 'Superscript',
                    'args' => ['sup'],
                ),
                array(
                    'title' => 'Subscript',
                    'args' => ['sub'],
                ),
                array(
                    'title' => 'Source citation',
                    'args' => ['cite'],
                ),
                array(
                    'title' => 'Keyboard input',
                    'args' => ['kdb'],
                ),
                array(
                    'title' => 'Small print',
                    'args' => ['small'],
                ),
                array(
                    'title' => 'Deleted',
                    'args' => ['del'],
                ),
                array(
                    'title' => 'Inserted',
                    'args' => ['ins'],
                ),
                array(
                    'title' => 'Remove all styles',
                    'clear' => true,
                ),
            ),
        ),
    ),
);
