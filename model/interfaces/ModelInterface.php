<?php

namespace Cms\Model\Interfaces;

/**
 * ArticleInterface
 */
abstract class Model {
    public abstract function save();
    public abstract function delete();
}