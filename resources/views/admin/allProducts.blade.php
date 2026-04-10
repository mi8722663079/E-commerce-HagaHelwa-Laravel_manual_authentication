@extends("layouts.admin.side")
@section("body")
<div class="table-responsive w-100 mt-5 pt-3">
  <table class="table w-100">
    <h1>All products</h1>
    @if (session()->has("success"))
      <div class="alert alert-success">{{ session()->get("success") }}</div>
    @endif
    <thead style="background-color: #191c24; color: #ffffff;">
      <tr>
        <th scope="col" style="color: #ffffff;">#</th>
        <th scope="col" style="color: #ffffff;">Title</th>
        <th scope="col" style="color: #ffffff;">Price</th>
        <th scope="col" style="color: #ffffff;">Quantity</th>
        <th scope="col" style="color: #ffffff;">Description</th>
        <th scope="col" style="color: #ffffff;">Image</th>
        <th scope="col" style="color: #ffffff;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($prods as $product)
      <tr>
        <td class="align-middle">{{ $loop->iteration }}</td>
        <td class="align-middle">{{ $product->name }}</td>
        <td class="align-middle">${{ $product->price }}</td>
        <td class="align-middle">{{ $product->quantity }}</td>
        <td class="align-middle text-truncate" style="max-width: 250px;" title="{{ $product->description }}">
          {{ $product->description }}
        </td>
        <td class="align-middle">
          <img src="{{ asset("storage/$product->img") }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
        </td>
        <td class="align-middle">
          <div class="d-flex align-items-center gap-2 m-0">
            <a class="btn btn-success" href="{{ route("prod.editForm",["id" => $product->id]) }}">Edit</a>
            <form action="{{ route("prod.delete",["id" => $product->id]) }}" method="post" class="m-0 p-0">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection