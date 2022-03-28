<strong>Definite Articles</strong> <i style="font-size: .8rem;">(The article precedes the noun.)</i>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <tbody>
    <tr>
        <th style="width: 6rem;">common</th>
        <td style="width: 10rem;">
            @if (array_key_exists($keys['common'], $data['indefinite']))
                {{ implode(', ', $data['definite'][$keys['common']]) }}
            @endif
        </td>
    </tr>
    <tr>
        <th>neutral</th>
        <td>
            @if (array_key_exists($keys['neuter'], $data['indefinite']))
                {{ implode(', ', $data['definite'][$keys['neuter']]) }}
            @endif
        </td>
    </tr>
    </tbody>
</table>

<strong>Indefinite Articles</strong> <i style="font-size: .8rem;">(The article is used as a suffix.)</i>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 6rem;">common</th>
        <td style="width: 10rem;">{{ implode(', ', $data['indefinite'][$keys['common']]) }}</td>
    </tr>
    <tr>
        <th>neutral</th>
        <td>{{ implode(', ', $data['indefinite'][$keys['neuter']]) }}</td>
    </tr>
    </tbody>
</table>
