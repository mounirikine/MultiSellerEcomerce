@extends('seller.layouts.main')
@section('content')
<div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i>
                Connections</a>
        </li>
    </ul>
    <div class="card mb-4">
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{asset('storage/images/products/' . $Profile_info->image)}}" alt="user-avatar" class="d-block rounded" height="100"
                    width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                    

                    <h5 class="card-header"><i class='bx bx-user'></i> {{ Auth::user()->name }} <br>  <p class="pt-1 text-danger"><i class='bx bxl-slack-old ' ></i> {{ Auth::user()->role }}</p></h5>

                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <form id="formAccountSettings" action="{{route('update.profile')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Seller Name</label>
                        <input class="form-control" type="text"  id="firstName" name="name" value="{{$Profile_info->name}}"
                            autofocus="">
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email"
                        value="{{$Profile_info->email}}" placeholder="john.doe@example.com">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <img src="{{asset('storage/images/' . $Profile_info->image)}}" alt="user-avatar" class="d-block rounded mt-1" height="50"
                    width="50" id="uploadedAvatar">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Brand</label>
                        <input type="file" class="form-control" id="organization" name="barnd"
                            value="ThemeSelection">
                        <img src="" alt="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="phoneNumber" name="phone" value="{{$Profile_info->phone}}" class="form-control"
                                placeholder="202 555 0111">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$Profile_info->address}}"  placeholder="Address">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">State</label>
                        <input class="form-control" type="text" id="state" name="state" value="{{$Profile_info->state}}" 
                            placeholder="California">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$Profile_info->zip_code}}" 
                            placeholder="231465" maxlength="6">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select" value="{{$Profile_info->country}}"  name="country">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                    
                    
                    
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
    </div>

</div>
@endsection
