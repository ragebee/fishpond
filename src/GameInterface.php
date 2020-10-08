<?php

namespace Ragebee\Fishpond;

interface GameInterface
{
    public function getName();

    public function getCode();

    public function getTypeCode();

    public function getTranslatedName();
}
