<table>
	<thead>
      <tr>
        <th>Title</th>
        <th>excerpt</th>
        <th>is_published</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($items as $item)
      <tr>
        <td>{{$item->title}}</td>
        <td>{{$item->excerpt}}</td>
        <td>{{$item->content_raw}}</td>
      </tr>
      @endforeach
  </tbody>
  <caption>Products purchased last month</caption>
</table>
