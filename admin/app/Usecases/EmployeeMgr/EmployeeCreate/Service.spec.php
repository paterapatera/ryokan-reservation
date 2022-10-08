<?php

namespace App\Usecases\EmployeeMgr\EmployeeCreate;

use App\Domains\Employee\Builder;
use App\Domains\Employee\PreCondition\WhenCreate;
use App\Domains\Shared\{Hasher, IdGenerator};
use App\Infra\Repositories\Employee\InMemoryRepository;

use function Eloquent\Phony\Kahlan\mock;

// 条件式がない限りサービスのテストはいらないかも
describe('従業員管理/従業員作成', function () {
    beforeEach(function () {
        $this->repository = new InMemoryRepository();
        $this->idGenerator = mock(IdGenerator::class);
        $this->hasher = mock(Hasher::class);
        $this->builder = new Builder($this->idGenerator->get(), $this->hasher->get());
        $this->service = new Service(
            $this->builder,
            new WhenCreate($this->repository),
            $this->repository,
        );
    });

    describe('前提：IDと暗号化パスワードは固定値で生成', function () {
        beforeEach(function () {
            $this->idGenerator->generate->returns('123456789012345678902');
            $this->hasher->makePassword->returns('aaaaaa');
        });

        context(
            "条件：従業員{名前:'test', Eメール:'test2@test.com', パスワード:xxxxxx}の登録",
            function () {
                beforeEach(function () {
                    $this->service->run(new Input('test', 'test2@test.com', 'xxxxxx'));
                });

                it('正しい従業員が追加されていること', function () {
                    $employee = $this->repository->records->get('123456789012345678902');
                    expect($employee->id()->value())->toEqual('123456789012345678902');
                    expect($employee->name->value())->toEqual('test');
                    expect($employee->email->value())->toEqual('test2@test.com');
                    expect($employee->password->value())->toEqual('aaaaaa');
                });
            },
        );
    });
});
