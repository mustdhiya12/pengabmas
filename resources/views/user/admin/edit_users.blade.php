<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
    body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
  </style>
</head>
<body>
  @include('main/navbar')
  <section style="width:100%;padding-top: 100px;">
    <section style="width:98%;padding: 1%;" >
    <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari" id="search-input">
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama</th>
      <th>No. HP</th>
      <th>Saldo</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    @foreach ($tdr as $tdr_action)
    <tr>
      <th>{{$tdr_action->id}}</th>
      <td>{{$tdr_action->name}}</td>
      <td>{{$tdr_action->no_hp}}</td>
      <td>{{$tdr_action->saldo}}</td>
      <td><a href="{{route('admin.kelola.edit', $tdr_action->id)}}"><button type="button" class="btn btn-primary">edit</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
  </section>
</section>
<script type="text/javascript">
 // Get the search input element
const searchInput = document.getElementById('search-input');

// Get the table body element
const tableBody = document.getElementById('table-body');

// Add an event listener to the search input
searchInput.addEventListener('input', function() {
  // Get the search query value
  const searchQuery = this.value.toLowerCase();

  // Filter the table rows based on the search query
  Array.from(tableBody.children).forEach(function(row) {
    const name = row.cells[0].textContent.toLowerCase();
    const email = row.cells[1].textContent.toLowerCase();
    const phone = row.cells[2].textContent.toLowerCase();

    if (name.includes(searchQuery) || email.includes(searchQuery) || phone.includes(searchQuery)) {
      row.style.display = 'table-row';
    } else {
      row.style.display = 'none';
    }
  });
});
</script>
</body>
</html>