<?php

namespace App\Usecases\EmployeeMgr\EmployeeList\Actions;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

describe("従業員一覧取得", function () {
    beforeAll(function () {
        $this->laravel->useTrait(RefreshDatabase::class);
        $this->employeesGetter = new EmployeesGetter();
    });

    describe("前提：従業員が2件存在する", function () {
        beforeEach(function () {
            Employee::create([
                'id' => '123456789012345678901',
                'name' => 'test',
                'email' => 'test1@test.com',
                'password' => 'aaaaaa'
            ]);
            Employee::create([
                'id' => '123456789012345678902',
                'name' => 'test2',
                'email' => 'test2@test.com',
                'password' => 'bbbbbb'
            ]);
        });

        context("条件：なし", function () {
            beforeEach(function () {
                $this->employees = $this->employeesGetter->get();
            });

            it("従業員が2件取得できること", function () {
                expect($this->employees)->toHaveLength(2);
            });

            it("従業員の情報が取得できること", function () {
                $employee = $this->employees->first(fn ($m) => $m->id == '123456789012345678901');
                expect($employee->id)->toBe('123456789012345678901');
                expect($employee->name)->toBe('test');
                expect($employee->email)->toBe('test1@test.com');
                expect($employee->password)->toBe('aaaaaa');
            });
        });
    });
});
