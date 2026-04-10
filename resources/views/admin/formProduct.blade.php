@extends("layouts.admin.side")
@section("body")
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="{{ route("prod.add") }}" enctype="multipart/form-data">
                  @csrf
                  @if (session()->has("success"))
                      <div class="alert alert-success">{{ session()->get("success") }}</div>
                  @endif
                  @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                      <div class="alert alert-danger">{{ $errors }}</div>
                    @endforeach
                  @endif
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control p_input" name="category_id">
                      <option value="#">---Select Category---</option>
                      @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" step="any" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection