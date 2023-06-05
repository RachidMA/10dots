@props(['job'])



<!-- ==================== -->

<div class=" category" id="{{$job->id}}">
    <div class="cat_img job-image">
        <img class="card-img-top" src=" /images/{{$job->image_url}}" alt="Card image cap">
    </div>
    <div class="cat_info">
        <h5>
            {{$job->job_title}}
        </h5>
        <p>
            2700 completed tasks | 188 Doers
        </p>
        <button>
            Job Details
        </button>
    </div>
</div>

<!-- ================ -->

</div>
</div>