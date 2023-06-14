@props(['admin'])


<div class="card-us">
    <div class="card__side card__side--back">
        <div class="card__cover">
            <h4 class="card__heading">
                <span class="card__heading-span">technologies used</span>
            </h4>
        </div>
        <div class="card__details">
            <ul>
                @foreach($admin['languages'] as $language)
                <li>{{$language}}</li>
                @endforeach
            </ul>
            <h4 class="article">
                <a href="">Blog Article</a>
            </h4>
        </div>

    </div>
    <div class="card__side card__side--front">
        <div class="card__theme">
            <div class="card__theme-box">
                <div class="image-box">
                    <img src="/admins/{{$admin['image']}}" alt="" class="profile" />
                </div>
                <p class="card__title">{{$admin['fullname']}}</p>
                <p class="card__subject">Web Developer</p>
            </div>
        </div>
    </div>
</div>