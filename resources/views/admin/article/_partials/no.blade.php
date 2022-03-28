<strong>Definite Articles</strong> <i style="font-size: .8rem;">(The article precedes the noun.)</i>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <tbody>
    <tr>
        <th style="width: 6rem;">masculine</th>
        <td style="width: 10rem;">
            @if (array_key_exists($keys['masculine'], $data['definite']))
                {{ implode(', ', $data['definite'][$keys['masculine']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>feminine</th>
        <td>
            @if (array_key_exists($keys['feminine'], $data['definite']))
                {{ implode(', ', $data['definite'][$keys['feminine']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>neuter</th>
        <td>
            @if (array_key_exists($keys['neuter'], $data['definite']))
                {{ implode(', ', $data['definite'][$keys['neuter']]) }}
            @endif
        </td>
    </tr>
    </tbody>
</table>

<strong>Indefinite Articles</strong> <i style="font-size: .8rem;">(The article is used as a suffix.)</i>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <tbody>
    <tr>
        <th style="width: 6rem;">masculine</th>
        <td style="width: 10rem;">
            @if (array_key_exists($keys['masculine'], $data['indefinite']))
                {{ implode(', ', $data['indefinite'][$keys['masculine']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>feminine</th>
        <td>
            @if (array_key_exists($keys['feminine'], $data['indefinite']))
                {{ implode(', ', $data['indefinite'][$keys['feminine']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>neuter</th>
        <td>
            @if (array_key_exists($keys['neuter'], $data['indefinite']))
                {{ implode(', ', $data['indefinite'][$keys['neuter']]) }}
            @endif
        </td>
    </tr>
    </tbody>
</table>
