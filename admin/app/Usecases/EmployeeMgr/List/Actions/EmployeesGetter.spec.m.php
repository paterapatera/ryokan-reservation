<?php

namespace App\Usecases\EmployeeMgr\List\Actions;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

describe(EmployeesGetter::class, function () {
    beforeAll(function () {
        $this->laravel->useTrait(RefreshDatabase::class);
        $this->employeesGetter = new EmployeesGetter();
    });

    describe('前提：従業員が2件存在する', function () {
        beforeEach(function () {
            Employee::factory()
                ->count(2)
                ->create();
        });

        context('条件：なし', function () {
            beforeEach(function () {
                $this->employees = $this->employeesGetter->get();
            });

            it('従業員が2件取得できること', function () {
                expect($this->employees)->toHaveLength(2);
            });
        });
    });
});
