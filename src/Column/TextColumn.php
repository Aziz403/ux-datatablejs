<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Aziz Benmallouk <azizbenmallouk4@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aziz403\UX\Datatable\Column;

/**
 * @author Aziz Benmallouk <azizbenmallouk4@gmail.com>
 */
class TextColumn extends AbstractColumn
{
    private $render;

    public function __construct(string $field,?string $display = null,bool $visible = true,bool $orderable = true,$render = null)
    {
        $this->data = $field;
        $this->text = $display ?? $field;
        $this->visible = $visible;
        $this->orderable = $orderable;
        $this->render = $render;
    }

    public function render(string $value) :string
    {
        //check if has custom render condition
        if($this->render && is_callable($this->render)){
            return call_user_func($this->render,$value);
        }
        //return the same result
        return $value;
    }

    public function build()
    {
        return [
            'data' => $this->data,
            'text' => $this->text,
            'visible' => $this->visible,
            'orderable' => $this->orderable
        ];
    }
}