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
      <th>Order ID</th>
      <th>Jumlah Yang Di Request</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="table-body">
    @foreach ($tdr_saldo_helper as $aktion_botton)
    <tr>
    <th>{{$aktion_botton->user_id}}</th>
    <td>{{$aktion_botton->name_acc}}</td>
    <td>{{$aktion_botton->order_id}}</td>
    <td>{{$aktion_botton->request_saldo}}</td>
    <td>
        <form method="POST" action="{{route('admin.kirim.saldo.run')}}">
        @csrf
            <input type="hidden" name="jumlah_saldo" value="{{$aktion_botton->request_saldo}}">
            <input type="hidden" name="user_id" value="{{$aktion_botton->user_id}}">
            <input type="hidden" name="name_real" value="{{$aktion_botton->name_real}}">
            <input type="hidden" name="order_id" value="{{$aktion_botton->order_id}}">
        <button class="btn btn-primary" type="submit">kirim saldo</button>
        </form>
    </td>
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