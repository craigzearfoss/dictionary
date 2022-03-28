<strong>Definite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 6rem;"></th>
        <th style="width: 10rem;">singular</th>
        <th style="width: 10rem;">plural</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>masculine</th>
        <td>
            @if (array_key_exists($keys['masculine'], $data['definite'][$keys['singular']]))
                {{ implode(', ', $data['definite'][$keys['singular']][$keys['masculine']]) }}
            @endif
        </td>
        <td>
            @if (array_key_exists($keys['masculine'], $data['definite'][$keys['plural']]))
                {{ implode(', ', $data['definite'][$keys['plural']][$keys['masculine']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>feminine</th>
        <td>
            @if (array_key_exists($keys['feminine'], $data['definite'][$keys['singular']]))
                {{ implode(', ', $data['definite'][$keys['singular']][$keys['feminine']]) }}
            @endif
        </td>
        <td>
            @if (array_key_exists($keys['feminine'], $data['definite'][$keys['plural']]))
                {{ implode(', ', $data['definite'][$keys['plural']][$keys['feminine']]) }}
            @endif
        </td>
    </tr>
    @if (array_key_exists($keys['none'], $data['definite'][$keys['singular']]) || array_key_exists($keys['none'], $data['definite'][$keys['plural']]))
        <tr>
            <th>both</th>
            <td>
                @if (array_key_exists($keys['none'], $data['definite'][$keys['singular']]))
                    {{ implode(', ', $data['definite'][$keys['singular']][$keys['none']]) }}
                @endif
            </td>
            <td>
                @if (array_key_exists($keys['none'], $data['definite'][$keys['plural']]))
                    {{ implode(', ', $data['definite'][$keys['plural']][$keys['none']]) }}
                @endif
            </td>
        </tr>
    @endif
    </tbody>
</table>

<strong>Indefinite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 6rem;"></th>
        <th style="width: 10rem;">singular</th>
        @if (array_key_exists($keys['plural'], $data['indefinite']))
            <th style="width: 10rem;">plural</th>
        @endif
    </tr>
    </thead>
    <tbody>
    <th>masculine</th>
        <td>
            @if (array_key_exists($keys['masculine'], $data['indefinite'][$keys['singular']]))
                {{ implode(', ', $data['indefinite'][$keys['singular']][$keys['masculine']]) }}
            @endif
        </td>
        @if (array_key_exists($keys['plural'], $data['indefinite']))
            <td>
            @if (array_key_exists($keys['masculine'], $data['indefinite'][$keys['plural']]))
                {{ implode(', ', $data['indefinite'][$keys['plural']][$keys['masculine']]) }}
            @endif
            </td>
        @endif
    </tr>
    <tr>
        <th>feminine</th>
        <td>
            @if (array_key_exists($keys['feminine'], $data['indefinite'][$keys['singular']]))
                {{ implode(', ', $data['indefinite'][$keys['singular']][$keys['feminine']]) }}
            @endif
        </td>
        @if (array_key_exists($keys['plural'], $data['indefinite']))
            <td>
                @if (array_key_exists($keys['feminine'], $data['indefinite'][$keys['plural']]))
                    {{ implode(', ', $data['indefinite'][$keys['plural']][$keys['feminine']]) }}
                @endif
            </td>
        @endif
    </tr>
    @if (array_key_exists($keys['plural'], $data['indefinite']) && (array_key_exists($keys['none'], $data['indefinite'][$keys['singular']]) || array_key_exists($keys['none'], $data['indefinite'][$keys['plural']])))
        <tr>
            <th>both</th>
            <td>
                @if (array_key_exists($keys['none'], $data['indefinite'][$keys['singular']]))
                    {{ implode(', ', $data['indefinite'][$keys['singular']][$keys['none']]) }}
                @endif
            </td>
            @if (array_key_exists($keys['plural'], $data['indefinite']))
                <td>
                    @if (array_key_exists($keys['none'], $data['indefinite'][$keys['plural']]))
                        {{ implode(', ', $data['indefinite'][$keys['plural']][$keys['none']]) }}
                    @endif
                </td>
            @endif
        </tr>
    @endif
    </tbody>
</table>
