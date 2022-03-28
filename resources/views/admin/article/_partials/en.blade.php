<strong>Definite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 6rem;">singular</th>
        <th style="width: 6rem;">plural</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ implode(', ', $data['definite'][$keys['singular']]) }}</td>
        <td>{{ implode(', ', $data['definite'][$keys['plural']]) }}</td>
    </tr>
    </tbody>
</table>

<strong>Indefinite Articles</strong>
<table id="definite_article-table" class="admin-table table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 6rem;">Singular</th>
        <th style="width: 6rem;">Plural</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ implode(', ', $data['indefinite'][$keys['singular']]) }}</td>
        <td>{{ implode(', ', $data['indefinite'][$keys['plural']]) }}</td>
    </tr>
    </tbody>
</table>
