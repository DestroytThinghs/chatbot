<?php

$files = glob('migrations/*.php');

foreach ($files as $file) {
    require $file;
}
