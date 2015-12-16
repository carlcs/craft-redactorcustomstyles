<?php

return array(
        'translatable' => array(
                'Superscript', 'Subscript', 'Quote', 'Source citation', 'Keyboard input', 'Code',
                'Small print', 'Deleted', 'Inserted', 'Marked', 'Prevent line-break', 'Remove all styles',
                'Align left', 'Align right', 'Align center', 'Justify', 'Alignment', 'Color', 'Style'
        ),
        'buttonsAddAfter' => 'italic',
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
