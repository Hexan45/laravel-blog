<tr class="items_table">
    <th colspan="1">{{ $articleID }}</th>
    <th colspan="3">{{ $articleTitle }}</th>
    <th colspan="1">{{ $articleAuthorNickname }}</th>
    <th class="actions">
        <a href="{{ route('admin.dashboard.store.edit', ['article' => $articleID]) }}" class="primary submit">
            <img src="{{ asset('images/edit-svg.svg') }}" alt="Edit icon" style="width: 20px;">
        </a>
        <a href="{{ route('admin.dashboard.delete', ['article' => $articleID]) }}" class="warning submit">
            <img src="{{ asset('images/delete-svg.svg') }}" alt="Delete icon" style="width: 20px;">
        </a>
    </th>
</tr>