<?php

return [
    '
    # {{ title }}

    ---

    ___{{ paragraph }}___

    {{ paragraphs }}

    ',

    '
    # {{ title }}

    {{ paragraphs }}
    ',

    '
    # {{ title }}

    ---

    ___{{ paragraph }}___

    {{ paragraphs }}

    ![{{ words }}]({{ image }})
    > {{ sentence }}

    ---

    {{ paragraphs }}
    ',

    '
    # {{ title }}

    ---

    ___{{ paragraph }}___

    > {{ sentence }}

    {{ paragraphs }}

    ![{{ words }}]({{ image }})

    ---

    {{ paragraphs }}
    ',
];