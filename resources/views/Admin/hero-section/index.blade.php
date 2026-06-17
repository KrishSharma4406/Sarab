<style>
body{
    background:#f4f6f9;
}

.admin-wrapper{
    max-width:1200px;
    margin:auto;
    padding:30px;
}

.admin-hero-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    height:auto;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.admin-hero-header{
    background:linear-gradient(135deg,#ff5e62,#ff9966);
    padding:25px 35px;
    color:#fff;
}

.admin-hero-header h3{
    margin:0;
    font-size:28px;
    font-weight:700;
}

.admin-hero-header p{
    margin:5px 0 0;
    opacity:.9;
}

.card-body{
    padding:25px;
}

.admin-section{
    background:#fff;
    border-radius:16px;
    padding:20px;
    margin-bottom:20px;
    border:1px solid #edf0f5;
    box-shadow:0 5px 20px rgba(0,0,0,.03);
}

.admin-section-title{
    font-size:20px;
    font-weight:700;
    margin-bottom:20px;
    padding-left:12px;
    border-left:4px solid #ff5e62;
}

.admin-label{
    font-weight:600;
    color:#555;
    margin-bottom:8px;
    display:block;
}

.admin-input,
.admin-textarea{
    border:1px solid #dfe3e8;
    border-radius:12px;
    padding:12px 15px;
    font-size:14px;
}

.admin-input:focus,
.admin-textarea:focus{
    border-color:#ff5e62;
    box-shadow:0 0 0 4px rgba(255,94,98,.15);
}

.upload-box{
    border:2px dashed #dcdcdc;
    border-radius:15px;
    padding:30px;
    text-align:center;
    background:#fafafa;
}

.upload-box i{
    font-size:40px;
    color:#ff5e62;
    margin-bottom:10px;
}

.hero-preview{
    max-width:250px;
    border-radius:15px;
    margin-top:15px;
    box-shadow:0 8px 25px rgba(0,0,0,.12);
}

.hero-card-box{
    background:#fff;
    border-radius:16px;
    padding:22px;
    height:auto;
    border:1px solid #eee;
    transition:.3s;
}

.hero-card-box:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 25px rgba(0,0,0,.08);
}

.hero-card1{
    border-top:5px solid #ff4d4d;
}

.hero-card2{
    border-top:5px solid #ffb400;
}

.hero-card3{
    border-top:5px solid #00c853;
}

.hero-card-box h5{
    font-weight:700;
    margin-bottom:15px;
}

.hero-save-btn{
    background:linear-gradient(135deg,#ff5e62,#ff9966);
    border:none;
    color:#fff;
    border-radius:14px;
    padding:14px 40px;
    font-weight:600;
}

.hero-save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(255,94,98,.25);
    color:#fff;
}
</style>

<div class="admin-wrapper">

<div class="card admin-hero-card">

    <div class="admin-hero-header d-flex justify-content-between align-items-center">

        <div>
            <h3>
                <i class="fas fa-home me-2"></i>
                Hero Section Settings
            </h3>
            <p>Manage homepage hero content and floating cards</p>
        </div>

        <span class="badge bg-light text-dark px-3 py-2">
            Homepage CMS
        </span>

    </div>

    <div class="card-body p-4">

        <form action="{{ route('hero-section.store') }}"
              method="POST"
              >

            @csrf

            <!-- HERO CONTENT -->

            <div class="admin-section">

                <h4 class="admin-section-title">
                    Hero Content
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="admin-label">
                            Title Line 1
                        </label>

                        <input type="text"
                               name="title_line_1"
                               value="{{ old('title_line_1', $hero->title_line_1 ?? '') }}"
                               class="form-control admin-input">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="admin-label">
                            Highlight Text
                        </label>

                        <input type="text"
                               name="title_highlight"
                               value="{{ old('title_highlight', $hero->title_highlight ?? '') }}"
                               class="form-control admin-input">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="admin-label">
                        Title Line 2
                    </label>

                    <input type="text"
                           name="title_line_2"
                           value="{{ old('title_line_2', $hero->title_line_2 ?? '') }}"
                           class="form-control admin-input">
                </div>

                <div class="mb-3">
                    <label class="admin-label">
                        Description
                    </label>

                    <textarea name="description"
                              rows="4"
                              class="form-control admin-textarea">{{ old('description', $hero->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">

                    <label class="admin-label">
                        Hero Image
                    </label>

                </div>

            </div>

            <!-- FLOATING CARDS -->

            <div class="admin-section">

                <h4 class="admin-section-title">
                    Floating Hero Cards
                </h4>

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="hero-card-box hero-card1">

                            <h5>
                                Card 1
                            </h5>

                            <input type="text"
                                   name="card1_title"
                                   value="{{ old('card1_title', $hero->card1_title ?? '') }}"
                                   placeholder="Card Title"
                                   class="form-control admin-input mb-3">

                            <input type="text"
                                   name="card1_subtitle"
                                   value="{{ old('card1_subtitle', $hero->card1_subtitle ?? '') }}"
                                   placeholder="Card Subtitle"
                                   class="form-control admin-input">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="hero-card-box hero-card2">

                            <h5>
                                Card 2
                            </h5>

                            <input type="text"
                                   name="card2_title"
                                   value="{{ old('card2_title', $hero->card2_title ?? '') }}"
                                   placeholder="Card Title"
                                   class="form-control admin-input mb-3">

                            <input type="text"
                                   name="card2_subtitle"
                                   value="{{ old('card2_subtitle', $hero->card2_subtitle ?? '') }}"
                                   placeholder="Card Subtitle"
                                   class="form-control admin-input">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="hero-card-box hero-card3">

                            <h5>
                                Card 3
                            </h5>

                            <input type="text"
                                   name="card3_title"
                                   value="{{ old('card3_title', $hero->card3_title ?? '') }}"
                                   placeholder="Card Title"
                                   class="form-control admin-input mb-3">

                            <input type="text"
                                   name="card3_subtitle"
                                   value="{{ old('card3_subtitle', $hero->card3_subtitle ?? '') }}"
                                   placeholder="Card Subtitle"
                                   class="form-control admin-input">

                        </div>
                    </div>

                </div>

            </div>

            <div class="text-end">

                <button type="submit"
                        class="btn hero-save-btn">

                    <i class="fas fa-save me-2"></i>
                    Save Hero Section

                </button>

            </div>

        </form>

    </div>

</div>

</div>
