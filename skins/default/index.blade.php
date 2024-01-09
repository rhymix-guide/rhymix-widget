{{-- CSS 파일 로드 --}}
@load('public/widget.scss')

<section class="example1-default">
    <h2>{{ $widget->get('title', 'Example1 위젯') }}</h2>

    <ul>
        <li>$foo: <code>{{ $foo }}</code></li>
        <li>컬러셋: <code>{{ $widget->colorset() }}</code></li>
        <li>cacheEnabled (bool): <code>{{ $widget->cacheEnabled() | json }}</code></li>
        <li>widget_cache: <code>{{ $widget->get('widget_cache') }}</code></li>
        <li>위젯 경로(URL): <code>{{ $widget->widgetUrl() }}</code></li>
        <li>스킨 경로(URL): <code>{{ $widget->skinUrl() }}</code></li>
        <li>목록 수 get('list_count'): <code>(string) {{ $widget->get('list_count') | json }}</code></li>
        <li>목록 수 listCount(): <code>(int) {{ $widget->listCount() | json }}</code></li>
    </ul>

    <code><pre>
        {{ json_encode($widget->getAll(), JSON_PRETTY_PRINT) }}
    </pre></code>
</section>
