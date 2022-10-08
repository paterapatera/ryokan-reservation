<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Show;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

// リクエストとレスポンスがエラーなく表示されるかをチェック
describe(Controller::class, function () {
    beforeAll(function () {
        $this->laravel->useTrait(RefreshDatabase::class);
    });

    describe('前提：従業員が2件存在する', function () {
        // ログイン状態
        beforeEach(function () {
            Employee::factory()->create(['id' => '123456789012345678902']);
            $this->laravel->actingAs(Employee::factory()->create());
        });

        context('条件：/employees/123456789012345678902', function () {
            beforeEach(function () {
                $this->response = $this->laravel->get('/employees/123456789012345678902');
            });

            it('成功ステータスであること', function () {
                expect($this->response)->toPassSuccessful();
            });
        });
    });
});
