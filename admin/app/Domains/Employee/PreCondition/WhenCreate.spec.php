<?php

namespace App\Domains\Employee\PreCondition;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Name;
use App\Domains\Employee\Email;
use App\Domains\Employee\Exception\DuplicateEmailException;
use App\Domains\Employee\Exception\DuplicateIdException;
use App\Domains\Employee\Password;
use App\Infra\Repositories\Employee\InMemoryRepository;

describe("従業員作成の事前条件", function () {
    beforeEach(function () {
        $this->repository = new InMemoryRepository();
        $this->whenCreate = new WhenCreate($this->repository);
    });

    describe("前提：従業員{ID:123456789012345678901, Eメール:test@test.com}が存在する", function () {
        beforeEach(function () {
            $this->repository->add(new Employee(
                new Id('123456789012345678901'),
                new Name('test'),
                new Email('test1@test.com'),
                new Password('x')
            ));
        });

        context("条件：従業員のIDとメールが重複していない", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->whenCreate->check(new Employee(
                    new Id('123456789012345678902'),
                    new Name('test'),
                    new Email('test2@test.com'),
                    new Password('x')
                ));
            });

            it("エラーにならないこと", function () {
                expect($this->execute)->not->toThrow();
            });
        });

        context("条件：従業員のIDが重複", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->whenCreate->check(new Employee(
                    new Id('123456789012345678901'),
                    new Name('test'),
                    new Email('test2@test.com'),
                    new Password('x')
                ));
            });

            it("ID重複エラーになること", function () {
                expect($this->execute)->toThrow(new DuplicateIdException(WhenCreate::class));
            });
        });

        context("条件：従業員のEメールが重複", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->whenCreate->check(new Employee(
                    new Id('123456789012345678902'),
                    new Name('test'),
                    new Email('test1@test.com'),
                    new Password('x')
                ));
            });

            it("メール重複エラーになること", function () {
                expect($this->execute)->toThrow(new DuplicateEmailException(WhenCreate::class));
            });
        });
    });
});
