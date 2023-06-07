<!-- RACHID:THIS IS THE IMAGE WILL BE DISPLAYED IN THE DOER AND ADMIN DASHBOARD -->
<div class="image-container">
    <div class="image">
        <img src="/images/{{Auth()->user()->profile_image ? Auth()->user()->profile_image : 'default.jpg'}}" alt="" class="image-profile">
    </div>
    <!-- REUSE THIS FORM TO UPLOAD JOB IMAGE 
    IS BETTER TO HAVE USER UPLOAD IMAGE AFTER JOB IS CREATED NOT WHEN HE IS CREATING THE JOB
    JUST MINIMIZE ISSUES -->
    <div class="upload">
        <form action="{{route('store-avatar')}}" method="POST" enctype="multipart/form-data" id="image-upload">
            @csrf
            <div class="round">
                <i class="fa fa-camera"></i>
                <input id="file-upload" type="file" name='avatar' />

                <button type="submit" class="btn btn-primary" id="submit">Upload</button>
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </form>
    </div>
</div>