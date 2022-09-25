<?php

namespace App\Usecases\EmployeeMgr\EmployeeList;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Name;
use App\Domains\Employee\Email;
use App\Domains\Employee\Password;
use App\Usecases\EmployeeMgr\EmployeeList\Actions\GetEmployees;

use function Eloquent\Phony\Kahlan\mock;

describe("従業員管理/従業員一覧", function () {
    beforeEach(function () {
        $this->getEmployees = mock(GetEmployees::class);
        $this->service = new Service($this->getEmployees->get());
    });

    describe("前提：従業員が2件存在する", function () {
        beforeEach(function () {
            $this->getEmployees->run->returns(collect([new Employee(
                new Id('123456789012345678901'),
                new Name('test'),
                new Email('test1@test.com'),
                new Password('aaaaaa')
            )]));
        });

        context("条件：なし", function () {
            beforeEach(function () {
                $this->output = $this->service->run();
            });

            it("従業員が1件取得できること", function () {
                expect($this->output->employees)->toHaveLength(1);
            });
        });
    });
});
