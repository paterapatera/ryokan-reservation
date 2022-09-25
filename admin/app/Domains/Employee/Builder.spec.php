<?php

namespace App\Domains\Employee;

use App\Domains\Shared\Hasher;
use App\Domains\Shared\IdGenerator;
use App\Domains\Shared\PlainPassword;

use function Eloquent\Phony\Kahlan\mock;

describe("従業員ビルダー", function () {
    beforeEach(function () {
        $this->idGenerator = mock(IdGenerator::class);
        $this->hasher = mock(Hasher::class);
        $this->builder = new Builder($this->idGenerator->get(), $this->hasher->get());
    });

    describe("前提：IDと暗号化パスワードは固定値で生成", function () {
        beforeEach(function () {
            $this->idGenerator->generate->returns('123456789012345678902');
            $this->hasher->makePassword->returns('aaaaaa');
        });

        context("条件：従業員{名前:'test', Eメール:'test2@test.com', パスワード:xxxxxx}の登録可能従業員生成", function () {
            beforeEach(function () {
                $this->employee = $this->builder->buildCreatableEmployee(
                    new Name('test'),
                    new Email('test@test.com'),
                    new PlainPassword('xxxxxx'),
                );
            });

            it("正しい従業員が追加されていること", function () {
                expect($this->employee->id()->value())->toEqual('123456789012345678902');
                expect($this->employee->name->value())->toEqual('test');
                expect($this->employee->email->value())->toEqual('test@test.com');
                expect($this->employee->password->value())->toEqual('aaaaaa');
            });
        });
    });
});
