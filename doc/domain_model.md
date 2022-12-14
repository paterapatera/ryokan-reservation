# ドメインモデル[旅館予約システム]

## 旅館予約

```plantuml
class 従業員
予約 }o--|| 部屋
ブックマーク }o--|| 部屋
ユーザー ||--o{ ブックマーク
ユーザー |o--o{ 予約
```

- [従業員](#従業員)
- [ユーザー](#ユーザー)
- [部屋](#部屋)
- [予約](#予約)
- [ブックマーク](#ブックマーク)

### 共通ドメイン

```plantuml
left to right direction
class "ID" as Id {
  + string<21, 21>
  + 形式:nanoid
}
class "Eメール" as Email {
  + string<1, 255>
  + 形式:メールアドレス
}
class "パスワード" as Password {
  + string<1, 255>
  + 形式:メールアドレス
}
class "平文パスワード" as PlainPassword {
  + string<6, 127>
  + 形式:^[A-Za-z0-9\W_-]+$
}
class "テキスト" as Text {
  + string<0, 0>
}
```

### 従業員

```plantuml
left to right direction
class "従業員" as Employee {
  + ID
  + 名前
  + Eメール
  + パスワード
}
class "リポジトリ" {
  + 取得(ID)
  + メールアドレスで取得(Eメール)
  + 追加(従業員)
  + 更新(従業員)
  + 削除(ID)
}

namespace 事前条件 {
  class 追加時 {
    + チェック(従業員)
    - IDが重複している場合はエラー(従業員)
    - メールアドレスが重複している場合はエラー(従業員)
  }
  class 更新時 {
    + チェック(従業員)
    - メールアドレスが重複している場合はエラー(従業員)
  }
}

namespace イベント {
  class 更新時 {
    + セッションを削除(従業員)
  }
  class 削除時 {
    + セッションを削除(従業員)
  }
}
```

### ユーザー

```plantuml
left to right direction
class "ユーザー" as User {
  + ID
  + メールアドレス
  + パスワード
}

class "名前" as Name {
  + string<1, 255>
}
User --> Name
User --> プロフィール画像

class "リポジトリ" {
  + 取得(ID)
  + 追加(ユーザー)
  + 更新(ユーザー)
  + 削除(ID)
}

namespace 事前条件 {
  class 追加時 {
    + チェック(ユーザー)
    - IDが重複している場合はエラー(ユーザー)
    - メールアドレスが重複している場合はエラー(ユーザー)
  }
  class 更新時 {
    + チェック(ユーザー)
    - メールアドレスが重複している場合はエラー(ユーザー)
  }
}

namespace イベント {
  class 更新時 {
    + セッションを削除(ユーザー)
  }
  class 削除時 {
    + ブックマークを削除(ユーザー)
    + 予約を削除(ユーザー)
    + セッションを削除(ユーザー)
  }
}
```

### 部屋

```plantuml
left to right direction
class "部屋" as Room {
  + ID
}
class "名前" as Name {
  + string<1, 255>
}
class "人数" as NumOfPeople {
  + int<1, 100>
}
class "有効" as Available {
  + bool
}
class "リポジトリ" {
  + 取得(ID)
  + 追加(部屋)
  + 更新(部屋)
  + 削除(ID)
}

Room --> Name
Room --> NumOfPeople
Room --> Available

namespace 事前条件 {
  class 追加時 {
    + チェック(部屋)
    - IDが重複している場合はエラー(部屋)
  }
  class 削除時 {
    + チェック(部屋)
    - 予約がある場合はエラー(部屋)
  }
}

namespace イベント {
  class 削除時 {
    + ブックマークを削除(部屋)
  }
}
```

### 予約

```plantuml
left to right direction
class "予約" as Reservation {
  + ID
  + 部屋ID
  + ユーザーID
  + Eメール
  + 期間
}
class "予約者名" as Name {
  + string<1, 255>
}
class "電話番号" as PhoneNumber {
  + int<11, 14>
  + 形式：電話番号<ハイフン無し>
}
class "人数" as NumOfPeople {
  + 部屋.人数と同じ型
}
class "リポジトリ" {
  + 追加(予約)
  + 更新(予約)
  + 削除(ID)
  + ユーザーによる削除(ユーザー)
}

Reservation --> Name
Reservation --> PhoneNumber
Reservation --> NumOfPeople
Reservation --> Period

namespace 事前条件 {
  class 追加時 {
    + チェック(予約)
    - IDが重複している場合はエラー(予約)
    - 予約人数が部屋の人数より多い場合はエラー(予約)
    - 部屋が無効の場合はエラー(予約)
  }
  class 更新時 {
    + チェック(予約)
    - 予約人数が部屋の人数より多い場合はエラー(予約)
  }
}
```

### ブックマーク

```plantuml
left to right direction
class ブックマーク {
  + ID
  + ユーザーID
  + 部屋ID
}
class "リポジトリ" {
  + 取得(ID)
  + 追加(ブックマーク)
  + 削除(ID)
  + 部屋による削除(部屋)
  + ユーザーによる削除(ユーザー)
}

namespace 事前条件 {
  class 追加時 {
    + チェック(ブックマーク)
    - IDが重複している場合はエラー(ブックマーク)
    - 部屋が無効の場合はエラー(ブックマーク)
  }
}
```
