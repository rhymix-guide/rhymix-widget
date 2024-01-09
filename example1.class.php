<?php

declare(strict_types=1);

/*
이 위젯 예시는 클래스 이름 등의 충돌 방지를 위해 네임스페이스를 사용하고 있음.

네임스페이스 안에서 필요한 클래스와 함수를 자유롭게 코드를 작성하고
라이믹스가 위젯을 실행시킬 수 있도록 `\WidgetHandler` 클래스를 상속한
메인 클래스를 `class_alias()` 함수를 이용해 `\example1` 클래스로 노출시켜
라이믹스가 위젯을 실행시킬 수 있도록 했음.
-> `class_alias()`는 이 파일 맨 아래에 있음.
*/

// 위젯 네임스페이스
namespace VendorName\Widget\Example1;

use Rhymix\Framework\Template;
use WidgetModel;

/**
 * 위젯의 메인 클래스
 */
class Widget extends \WidgetHandler
{
    /**
     * 위젯 이름
     *
     * 위젯 이름은 폴더명과 같아야하며,
     * 이 파일의 이름도 `위젯이름.class.php`와 같아야 함.
     */
    const NAME = 'example1';

    protected WidgetHelper $helper;

    /**
     * @param object $args 위젯 설정
     */
    public function proc($args): string
    {
        $this->helper = new WidgetHelper(self::NAME, (array) $args);

        // 위젯 스킨 폴더의 경로와 템플릿 파일명
        $template = new Template(
            /* 스킨 디렉토리 */
            "{$this->widget_path}skins/{$this->helper->skin()}",
            /* 템플릿 파일명 */
            // index.blade.php 또는 index.html 파일
            'index'
        );

        // 템플릿에 전달할 변수
        $template->setVars([
            'widget' => $this->helper,
            'foo' => 'bar',
        ]);

        return $template->compile();
    }
}

/**
 * 위젯의 설정을 담아 사용 편의를 위한 헬퍼 클래스
 */
class WidgetHelper
{
    protected string $widgetName;

    /** @var array<string, string> */
    protected array $options;

    /** @var array<string, string> */
    protected array $defaultOptions = [
        'skin' => 'default',
        'colorset' => 'light',
        'list_count' => '5',
    ];

    /**
     * @param array<string, mixed> $args
     */
    function __construct(string $widgetName, array $args)
    {
        $this->widgetName = $widgetName;
        $this->options = array_merge($this->defaultOptions, $args);
    }

    /**
     * 서버 내 위젯 디렉토리
     */
    public function widgetPath(): string
    {
        return \RX_BASEDIR . 'widgets/' . $this->widgetName;
    }

    /**
     * 위젯 디렉토리 URL (도메인을 제외한 상대 경로)
     */
    public function widgetUrl(): string
    {
        return \RX_BASEURL . 'widgets/' . $this->widgetName;
    }

    /**
     * 서버 내 스킨 디렉토리
     */
    public function skinPath(): string
    {
        return "{$this->widgetPath()}/skins/{$this->skin()}";
    }

    /**
     * 스킨 디렉토리 URL (도메인을 제외한 상대 경로)
     */
    public function skinUrl(): string
    {
        return "{$this->widgetUrl()}/skins/{$this->skin()}";
    }

    /**
     * cache 사용 여부
     */
    public function cacheEnabled(): bool
    {
        if ((int) $this->options['widget_cache'] !== 0) {
            return true;
        }

        return false;
    }

    /**
     * 스킨 이름 (폴더명)
     */
    public function skin(): string
    {
        return $this->options['skin'];
    }

    /**
     * 컬러셋
     */
    public function colorset(): string
    {
        return $this->options['colorset'];
    }

    /**
     * (예시) 사용자 설정의 리스트 수. int 타입으로 반환
     */
    public function listCount(): int
    {
        return (int) $this->options['list_count'];
    }

    /**
     * 특정 설정값을 반환
     *
     * @param mixed $default 기본 값
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        $value = $this->options[$name] ?? $default;

        return $value;
    }

    /**
     * @return array<string, mixed>
     */
    public function getAll(): array
    {
        return $this->options;
    }
}

/*
라이믹스의 동작을 위해 위젯 이름으로 클래스 노출
*/
class_alias(Widget::class, Widget::NAME);
