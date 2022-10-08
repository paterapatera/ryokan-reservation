<?php

namespace App\Usecases\EmployeeMgr\Show\Actions;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

// 指定条件の情報のみが取れているかだけをチェック
describe(EmployeeGetter::class, function () {
    beforeAll(function () {
        $this->laravel->useTrait(RefreshDatabase::class);
        $this->action = new EmployeeGetter();
    });

    describe('前提：従業員が2件存在する', function () {
        beforeEach(function () {
            Employee::create([
                'id' => '123456789012345678901',
                'name' => 'test',
                'email' => 'test1@test.com',
                'password' => 'aaaaaa',
            ]);
            Employee::create([
                'id' => '123456789012345678902',
                'name' => 'test2',
                'email' => 'test2@test.com',
                'password' => 'bbbbbb',
            ]);
        });

        context('条件：{id: 123456789012345678902}', function () {
            beforeEach(function () {
                $this->employee = $this->action->get('123456789012345678902');
            });

            it('{id: 123456789012345678902}の情報が取得できること', function () {
                expect($this->employee->id)->toBe('123456789012345678902');
            });
        });
    });
});
