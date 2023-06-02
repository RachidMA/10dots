@props(['job'])


<div class="job-container mb-4">
    <div class="card bg-white p-4 border border-primary rounded shadow-lg">
        <div class="card-header text-center">
            <h2 class="h5 font-weight-bold mb-0">Person Information</h2>
        </div>
        <div class="card-body row align-items-center">
            <div class="col-lg-4 text-center mb-3 mb-lg-0">
                <div class="rounded-circle overflow-hidden bg-warning shadow-lg" style="width: 10rem; height: 10rem;">
                    <img src="/images/{{$job->image_url}}" alt="Profile Picture" style="width: 100%;">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Name:</p>
                        <p class="text-gray-700">{{$job->full_name}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Job Title:</p>
                        <p class="text-gray-700">{{$job->job_title}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Job Category:</p>
                        <p class="text-gray-700">{{$job->Category->name}}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Address:</p>
                        <p class="text-gray-700">{{$job->address}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-gray-700 font-weight-bold mb-1">Phone:</p>
                        <p class="text-gray-700">{{$job->phone}}</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row ">
            <!-- i have add this line -->
            @if(Auth::check())
            @if(Auth::user()->role==1)
            <a href="" class="btn btn-primary col-md-1 mx-auto ">Details</a>
            @elseif(Auth::user()->role==0)
            <a href="" class="btn btn-primary col-md-2 mx-auto">User Details</a>
            @endif
            @else
            <a href="" class="btn btn-primary col-md-2 mx-auto">Job Details</a>
            @endif

        </div>
    </div>
</div>