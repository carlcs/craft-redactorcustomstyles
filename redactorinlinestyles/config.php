<?php

return array(
        'translatable' => array(
                'Superscript', 'Subscript', 'Quote', 'Source citation', 'Keyboard input', 'Code',
                'Small print', 'Deleted', 'Inserted', 'Marked', 'Prevent line-break', 'Remove all styles',
                'Align left', 'Align right', 'Align center', 'Justify', 'Alignment', 'Style'
        ),
        'setIcons' => array(
                'html' => 'html',
                'format' => 'format',
                // 'bold' => 'bold',
                // 'italic' => 'italic',
                'lists' => 'lists',
                'file' => 'file',
                'image' => 'image',
                'video' => 'video',
                'table' => 'table',
                'link' => 'link',
                'horizontalrule' => 'horizontalrule',
                'fullscreen' => 'fullscreen',
                'superscript' => 'superscript',
                'subscript' => 'subscript',
                'quote' => 'quote',
                'sourcecitation' => 'sourcecitation',
                'keyboardinput' => 'keyboardinput',
                'code' => 'code',
                'smallprint' => 'smallprint',
                'deleted' => 'deleted',
                'inserted' => 'inserted',
                'marked' => 'marked',
                'preventlinebreak' => 'preventlinebreak',
                'removeallstyles' => 'removeallstyles',
                'alignleft' => 'alignleft',
                'alignright' => 'alignright',
                'aligncenter' => 'aligncenter',
                'justify' => 'justify',
                'alignment' => 'alignment',
                'style' => 'ellipsis',
        ),
        'buttonsAddAfter' => 'format',
        'buttonsAdd' => array(
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
                                        'title' => 'Quote',
                                        'args' => ['q'],
                                ),
                                array(
                                        'title' => 'Source citation',
                                        'args' => ['cite'],
                                ),
                                array(
                                        'title' => 'Keyboard input',
                                        'args' => ['kbd'],
                                ),
                                array(
                                        'title' => 'Code',
                                        'args' => ['code'],
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
                                        'title' => 'Marked',
                                        'args' => ['mark'],
                                ),
                                array(
                                        'title' => 'Prevent line-break',
                                        'args' => ['nobr'],
                                ),
                                array(
                                        'title' => 'Remove all styles',
                                        'clear' => true,
                                ),
                        ),
                ),
        ),
);
