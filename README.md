# Example1 — 라이믹스 위젯 템플릿

> [!TIP]
> 이 템플릿을 사용하면 라이믹스의 위젯 만들기를 쉽게 시작할 수 있습니다.  
> [Use this template](https://github.com/new?template_name=rhymix-widget&template_owner=rhymix-guide) 버튼을 눌러보세요!
>
> 👉 [템플릿에서 리포지토리 만들기 - GitHub Docs](https://docs.github.com/ko/repositories/creating-and-managing-repositories/creating-a-repository-from-a-template)

> [!IMPORTANT]
>
> - 이 위젯 템플릿은 PHP 7.4 이상에서 동작합니다.
> - 이 위젯 템플릿의 코딩 컨벤션은 [PSR-12](https://www.php-fig.org/psr/psr-12/) 표준안을 따릅니다.

---

## 템플릿 사용법

이 위젯 템플릿은 이름 충돌을 방지하기 위해 예시로 `VendorName\Widget\Example1` 네임스페이스를 사용하며, 위젯의 이름으로 `example1`을 사용합니다.

네임스페이스와 위젯 이름을 적절하게 변경해야 합니다. 위젯의 이름은 위젯의 폴더명과 파일 이름, 위젯 클래스의 이름에 사용됩니다.

`awesome`이라는 이름의 예시:

폴더명을 `awesome`으로, 파일명을 `awesome.class.php`로 변경

```diff
-   widgets/example1        # 이 예제 위젯의 폴더
+   widgets/awesoem         # 이 예제 위젯의 폴더
-   ├── example1.class.php  # 위젯의 메인 클래스
+   ├── awesoem.class.php   # 위젯의 메인 클래스
    ├── LICENSE             # 라이선스 파일 (GNU GPL v2 or later)
    └── README.md
```

이제 `awesome.class.php` 파일에서 네임스페이스를 적절하게 변경하고, `Widget::NAME` 상수의 값을 `awesome`로 변경

> [!important]
> `Kkidogi\AwesomeWidget` 네임스페이스 또한 예시한 것이므로 자신만의 네임스페이스로 적절하게 변경하여 사용하세요!

```diff
// 위젯 네임스페이스
- namespace VendorName\Widget\Example1;
+ namespace Kkidogi\AwesomeWidget;

class Widget extends \WidgetHandler
{
-  const NAME = 'example1';
+  const NAME = 'awesome';
}
```

