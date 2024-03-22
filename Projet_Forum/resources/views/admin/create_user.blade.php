<x-master_admin>
{{-- <div class="container" style="height: 130px">
  @if ($errors->any())
  <x-alert type="danger">
  <h6>Errors :</h6>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </x-alert>
  @endif
</div> --}}


        {{-- <div class="container w-75 mx-auto mt-5" style="background-color: #adadad80;box-shadow: 1px 20px 20px 0px black,1px 20px 10px 0px black;margin: 10px 17px 10px 2px"> --}}
        <div class="container w-75 mx-auto mt-2" style="color: #891659" >
          <form class="w-75 p-4 mx-auto" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf   

                <div class=" w-25 mx-auto mt-2 mb-5 ">
                  <h3 class="mt-5">Add user</h3>
                </div>


                  <div class="row g-2">
                    <div class="col-6">
                      <label for="" class="form-label">Pseudo</label>
                      <input type="text" name="name"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name')}}">
                      @error('name')
                          <div class="message_error">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com"  value="{{old('email')}}">
                      @error('email')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                      @error('password')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Confirmation password</label>
                      <input type="password" class="form-control" name="password_confirmation">
                      @error('password_confirmation')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Image</label>
                      <input type="file" class="form-control" name="image">
                      @error('image')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Birthdate</label>
                      <input type="date" class="form-control" name="date_birthday">
                      @error('date_birthday')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Role</label>
                      <select class="form-select" id="" name="role">
                              <option value="User">User</option>
                              <option value="Admin">Admin</option>
                      </select>
                  </div>
                    </div>
                    <div class="col-6">
                      <label for="" class="form-label">Banner</label>
                      <input type="text" class="form-control" name="banner">
                      @error('banner')
                      <div class="message_error">
                          {{$message}}
                      </div>
                    @enderror
                    </div>
                    <div class="d grid mx-auto w-25">
                      <button type="submit" class="btn mt-2" style="background-color:#891659;color:white;">Add user</button>
                    </div>
                  </div>
        </form>  
        </div>

        <style>
          .container{
            color: aliceblue
          }
          .message_error{
            font-size: 13px;
            color: red;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', sans-serif
          }
        </style>


</x-master_admin>