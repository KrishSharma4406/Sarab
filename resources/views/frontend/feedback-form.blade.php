<section class="feedback-section section-padding">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="feedback-card">

                <div class="section-title text-center mb-5">

                    <span class="slbl">
                        Customer Review
                    </span>

                    <h2 class="stitle">
                        Share Your
                        <span>Experience</span>
                    </h2>

                    <div class="sline"></div>

                    <p class="sdesc">
                        We value your feedback. Tell us about your dining experience.
                    </p>

                </div>

               @if(session('success'))

<div class="alert alert-success alert-dismissible fade show mb-4">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

@if($errors->any())

<div class="alert alert-danger mb-4">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('feedback.store') }}"
      method="POST"
      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label class="fb-label">
                                Full Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="fb-input"
                                   placeholder="Enter your name"
                                   required>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fb-label">
                                Designation
                            </label>

                            <input type="text"
                                   name="designation"
                                   class="fb-input"
                                   placeholder="Food Blogger / Customer">

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fb-label">
                                Upload Photo
                            </label>

                            <input type="file"
                                   name="image"
                                   class="fb-input">

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="fb-label">
                                Rating
                            </label>

                            <select name="rating"
                                    class="fb-input">

                                <option value="5">★★★★★ Excellent</option>
                                <option value="4">★★★★ Very Good</option>
                                <option value="3">★★★ Good</option>
                                <option value="2">★★ Fair</option>
                                <option value="1">★ Poor</option>

                            </select>

                        </div>

                        <div class="col-12 mb-4">

                            <label class="fb-label">
                                Your Feedback
                            </label>

                            <textarea name="message"
                                      rows="6"
                                      class="fb-input"
                                      placeholder="Write your experience here..."
                                      required></textarea>

                        </div>

                        <div class="col-12 text-center">

                            <button type="submit"
                                    class="fb-btn">

                                <i class="fas fa-paper-plane me-2"></i>
                                Submit Review

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</section>
