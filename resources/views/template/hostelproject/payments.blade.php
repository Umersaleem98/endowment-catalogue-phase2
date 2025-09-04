<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project - Hostel Support</title>
    @include('template.layouts.head')

    <!-- Bootstrap 5 CSS -->
</head>

<body>
    <div class="super_container">

        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <!-- Hostel Project Section -->
        <div class="events page_section py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-lg p-4">
                            <h3 class="mb-4 text-center">Fund a Project - Hostel Support</h3>

                            <form action="{{ route('hostel.project.done') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Donor Name & Email -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Donor Name</label>
                                        <input type="text" name="donor_name" class="form-control"
                                            placeholder="Enter your full name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Email</label>
                                        <input type="email" name="donor_email" class="form-control"
                                            placeholder="Enter your email address" required>
                                    </div>
                                </div>

                                <!-- Country Code & Phone -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Phone</label>
                                        <div class="input-group">
                                            <select name="country_code" class="form-control" required>
                                                <option value="+1">+1</option>
                                                <option value="+44">+44</option>
                                                <option value="+91" selected>+91</option>
                                                <option value="+92">+92</option>
                                                <option value="+971">+971</option>
                                                <option value="+61">+61</option>
                                                <option value="+81">+81</option>
                                                <option value="+86">+86</option>
                                                <option value="+49">+49</option>
                                                <option value="+33">+33</option>
                                                <option value="+39">+39</option>
                                                <option value="+7">+7</option>
                                                <option value="+234">+234</option>
                                                <option value="+27">+27</option>
                                                <option value="+880">+880</option>
                                                <option value="+94">+94</option>
                                                <option value="+60">+60</option>
                                                <option value="+62">+62</option>
                                                <option value="+966">+966</option>
                                            </select>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Phone number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Total Cost</label>
                                        <input type="number" name="total_cost" value="315000000" class="form-control"
                                            readonly>
                                    </div>
                                </div>

                                <!-- Proof Upload -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-dark">Upload Proof</label>
                                        <input type="file" name="prove" class="form-control">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('template.layouts.footer')
    </div>

</body>

</html>
