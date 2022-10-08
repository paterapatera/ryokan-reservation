<?php

namespace App\Usecases\EmployeeMgr\EmployeeCreate;

use App\Domains\Employee\{Name, Email};
use App\Domains\Shared\PlainPassword;

class Input {
    public Name $name;
    public Email $email;
    public PlainPassword $password;

    function __construct(string $name, string $email, string $password) {
        $this->name = new Name($name);
        $this->email = new Email($email);
        $this->password = new PlainPassword($password);
    }
}
