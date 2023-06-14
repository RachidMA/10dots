@props(['admin', 'index'])


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
        </div>
        <div class="contact git">
            <i class="fa-brands fa-github" style="color: black;"></i>
            <a href="{{$admin['GitLink'] ? $admin['GitLink'] : ''}}" target="_blank">GitHub</a>
        </div>
    </div>
    <div class="card__side card__side--front">
        <div class="card__theme">
            <div class="card__theme-box card-{{$index + 1}}">
                <div class="image-box">
                    <img src="/admins/{{$admin['image']}}" alt="" class="profile-{{$index + 1}}" />
                </div>
                <p class="card__title">{{$admin['fullname']}}</p>
                <p class="card__subject">{{$admin['title']}}</p>
            </div>
        </div>
    </div>
</div>