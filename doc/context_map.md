# 旅館予約システム

## コンテキストマップ

```plantuml
@startuml
  usecase  "旅館予約システム" as mainSys
  usecase  "旅館予約管理システム" as adminSys
  database "共通DB" as db

  '---------------------------------------
  mainSys --> db
  adminSys --> db
@enduml
```

## ユースケース

### 旅館予約システム

```plantuml
@startuml
  left to right direction
  '========================================
  rectangle  "ユーザー" as user {
    actor "ゲストユーザー" as guestUser
    actor "登録ユーザー" as registeredUser
  }
  '========================================
  rectangle  "旅館予約" as mainSys {
    user --> ("部屋の空き状況を確認できる")
    user --> ("部屋を予約できる")
    user --> ("自身の予約内容を確認できる")
    user --> ("自身の予約をキャンセルできる")
    registeredUser --> ("部屋をブックマークできる")
  }
  rectangle  "認証" as authSys {
    registeredUser --> ("ログイン・ログアウト")
    registeredUser --> ("アカウント登録・確認・編集・削除")
  }
@enduml
```

### 旅館予約管理システム

```plantuml
@startuml
  left to right direction
  '========================================
  actor "従業員" as employee
  '========================================
  rectangle  "予約管理" {
    employee --> ("予約内容を確認できる")
    employee --> ("予約内容を変更できる")
    employee --> ("予約内容を削除できる")
  }
  rectangle  "部屋管理" {
    employee --> ("部屋を確認できる")
    employee --> ("部屋を登録できる")
    employee --> ("部屋を変更できる")
    employee --> ("部屋を削除できる")
  }
  rectangle  "従業員管理" {
    employee --> ("従業員を確認できる")
    employee --> ("従業員を登録できる")
    employee --> ("従業員を変更できる")
    employee --> ("従業員を削除できる")
  }
  rectangle  "認証" as authSys {
    employee --> ("ログイン・ログアウト")
    employee --> ("アカウント登録・確認・編集・削除")
  }
@enduml
```
