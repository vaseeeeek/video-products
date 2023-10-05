<?php
// lib/config/db.php

return array(
    'shop_productvideo' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'product_id' => array('int', 11),
        'video_url' => array('varchar', 255),
        'tags' => array('varchar', 255),
        ':keys' => array(
            'PRIMARY' => 'id',
        ),
    ),
    'shop_productvideo_tags' => array(
        'id' => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'name' => array('varchar', 255),
        ':keys' => array(
            'PRIMARY' => 'id',
        ),
    ),
);
