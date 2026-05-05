<div class="section2">
    <div class="container">
        <div class="row">
            @foreach ($section->contents as $content)
                <div class="image_intro w-full" data-aos="fade-left">
                    <img src="{{ count($content->images) > 0 ? $content->images[0]->image : '' }}" class="img-fluid"
                        alt="">
                </div>
            @endforeach
        </div>
        <div class="col-text">
            <div class=" text-center mx-6 text-intro" data-aos="fade-down">
                <span class="text-font">{{ __($section->title) }}</span>
            </div>
        </div>

    </div>
</div>
<style>
    .col-text {
        width: 94%;
        margin: auto;
        display: block;
        background-color: black
    }

    .text-intro {
        max-width: 100%;
        padding: 10px;
        margin: auto

    }

    .image_intro {
        max-width: 80%;

        margin: auto;
        margin-bottom: 20px;
    }
     .col-text span {
        color: #ffffff;
        font-size: 20px;
    }

    @media (max-width: 600px) {
        .image_intro {
            max-width: 90%;
            margin: auto;
            margin-bottom: 20px;
        }

        .col-text {
            width: 100%;
            display: block;
        }

        .text-intro {
            max-width: 100%;
            margin: auto,
        }

        .col-text span {
            color: #ffffff;
            font-size: 18px;
        }
    }
</style>
