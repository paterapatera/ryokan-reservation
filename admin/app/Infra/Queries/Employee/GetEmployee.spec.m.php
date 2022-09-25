<?php

namespace App\Infra\Queries\Employee;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Name;
use App\Domains\Employee\Email;
use App\Domains\Employee\Password;
use App\Infra\Repositories\Employee\EloquentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

describe("従業員一覧取得", function () {
    beforeAll(function () {
        $this->laravel->useTrait(RefreshDatabase::class);
        $this->getEmployees = new GetEmployees();
        $this->repository = new EloquentRepository();
    });

    describe("前提：従業員が2件存在する", function () {
        beforeEach(function () {
            $this->repository->add(new Employee(
                new Id('123456789012345678901'),
                new Name('test'),
                new Email('test1@test.com'),
                new Password('aaaaaa')
            ));
            $this->repository->add(new Employee(
                new Id('123456789012345678902'),
                new Name('test2'),
                new Email('test2@test.com'),
                new Password('bbbbbbb')
            ));
        });

        context("条件：なし", function () {
            beforeEach(function () {
                $this->employees = $this->getEmployees->run();
            });

            it("従業員が2件取得できること", function () {
                expect($this->employees)->toHaveLength(2);
            });
        });
    });
});
