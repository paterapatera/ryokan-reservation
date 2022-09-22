<?php

namespace App\Domains\Shared;

/**
 * @extends ValueObject<string>
 */
class Text extends ValueObject
{
    protected int $min = 0;
    protected int $max = 0;

    function __construct(public string $value)
    {
        $this->throwIfStrMaxOver();
        $this->throwIfStrMinOver();
    }

    function throwIfStrMaxOver(): void
    {
        $length = mb_strlen($this->value);
        if ($length > $this->max) throw new DomainException("文字数の最大値より大きいです（期待値：{$this->max}、結果：{$length}）", static::class);
    }

    function throwIfStrMinOver(): void
    {
        $length = mb_strlen($this->value);
        if ($length < $this->min) throw new DomainException("文字数の最小値より小さいです（期待値：{$this->min}、結果：{$length}）", static::class);
    }

    function value()
    {
        return $this->value;
    }
}
