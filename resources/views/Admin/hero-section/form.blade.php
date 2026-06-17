<style>
.hero-wrapper{
    max-width:1200px;
    margin:30px auto;
}

.hero-section-box{
    background:#fff;
    border-radius:18px;
    padding:30px;
    margin-bottom:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.hero-title{
    font-size:22px;
    font-weight:700;
    color:#222;
    margin-bottom:25px;
    padding-left:12px;
    border-left:4px solid #ff5e62;
}

.form-label{
    font-weight:600;
    color:#555;
    margin-bottom:8px;
}

.form-control{
    height:auto;
    border-radius:12px;
    border:1px solid #ddd;
    font-size:14px;
}

.form-control:focus{
    border-color:#ff5e62;
    box-shadow:0 0 0 .15rem rgba(255,94,98,.15);
}

textarea.form-control{
    min-height:auto;
    resize:none;
}

.hero-card{
    background:#fff;
    border-radius:16px;
    padding:22px;
    height:auto;
    border:1px solid #eee;
    transition:.3s;
}

.hero-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.card1{
    border-top:5px solid #ff4d4d;
}

.card2{
    border-top:5px solid #ffb100;
}

.card3{
    border-top:5px solid #00c853;
}

.hero-card h5{
    font-size:18px;
    font-weight:700;
    margin-bottom:18px;
}

.hero-save-btn{
    background:linear-gradient(135deg,#ff5e62,#ff9966);
    color:#fff;
    border:none;
    border-radius:12px;
    padding:14px 40px;
    font-size:15px;
    font-weight:600;
}

.hero-save-btn:hover{
    color:#fff;
    transform:translateY(-2px);
}

@media(max-width:768px){
    .hero-section-box{
        padding:20px;
    }
}
</style>

<div class="hero-wrapper">

```
<!-- Hero Content -->
<div class="hero-section-box">

    <h3 class="hero-title">
        Hero Content
    </h3>

    <div class="row">

        <div class="col-md-6 mb-3">
            <label class="form-label">
                Title Line 1
            </label>

            <input type="text"
                   name="title_line_1"
                   value="{{ old('title_line_1',$hero->title_line_1 ?? '') }}"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">
                Highlight Text
            </label>

            <input type="text"
                   name="title_highlight"
                   value="{{ old('title_highlight',$hero->title_highlight ?? '') }}"
                   class="form-control">
        </div>

    </div>

    <div class="mb-3">
        <label class="form-label">
            Title Line 2
        </label>

        <input type="text"
               name="title_line_2"
               value="{{ old('title_line_2',$hero->title_line_2 ?? '') }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Description
        </label>

        <textarea name="description"
                  class="form-control">{{ old('description',$hero->description ?? '') }}</textarea>
    </div>

</div>

<!-- Floating Cards -->
<div class="hero-section-box">

    <h3 class="hero-title">
        Floating Hero Cards
    </h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="hero-card card1">

                <h5>Card 1</h5>

                <input type="text"
                       name="card1_title"
                       placeholder="Card Title"
                       value="{{ old('card1_title',$hero->card1_title ?? '') }}"
                       class="form-control mb-3">

                <input type="text"
                       name="card1_subtitle"
                       placeholder="Card Subtitle"
                       value="{{ old('card1_subtitle',$hero->card1_subtitle ?? '') }}"
                       class="form-control">

            </div>
        </div>

        <div class="col-md-4">
            <div class="hero-card card2">

                <h5>Card 2</h5>

                <input type="text"
                       name="card2_title"
                       placeholder="Card Title"
                       value="{{ old('card2_title',$hero->card2_title ?? '') }}"
                       class="form-control mb-3">

                <input type="text"
                       name="card2_subtitle"
                       placeholder="Card Subtitle"
                       value="{{ old('card2_subtitle',$hero->card2_subtitle ?? '') }}"
                       class="form-control">

            </div>
        </div>

        <div class="col-md-4">
            <div class="hero-card card3">

                <h5>Card 3</h5>

                <input type="text"
                       name="card3_title"
                       placeholder="Card Title"
                       value="{{ old('card3_title',$hero->card3_title ?? '') }}"
                       class="form-control mb-3">

                <input type="text"
                       name="card3_subtitle"
                       placeholder="Card Subtitle"
                       value="{{ old('card3_subtitle',$hero->card3_subtitle ?? '') }}"
                       class="form-control">

            </div>
        </div>

    </div>

</div>

<!-- Save Button -->
<div class="text-end mt-4">

    <button type="submit" class="hero-save-btn">
        <i class="fas fa-save me-2"></i>
        Save Hero Section
    </button>

</div>

</div>
