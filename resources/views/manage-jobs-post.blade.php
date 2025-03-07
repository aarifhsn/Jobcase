@extends('layouts.app')

@section('content')
    <!-- START JOBS-POST-EDIT -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="primary-bg-subtle p-3">
                            <h5 class="mb-0 fs-17">Post a New Job!</h5>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <form action="#" class="job-post-form shadow mt-4">                
                <div class="job-post-content box-shadow-md rounded-3 p-4"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="jobtitle" class="form-label">Job Title</label>
                                <input type="text" class="form-control" id="jobtitle" placeholder="Title">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="jobdescription" class="form-label">Job Description</label>
                                <textarea class="form-control" id="jobdescription" rows="3" placeholder="Enter Job Description"></textarea>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber" placeholder="Phone Number">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="choices-single-categories" class="form-label">Categories</label>
                                <select class="form-select" data-trigger="" name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                    <option value="ne">Digital &amp; Creative</option>
                                    <option value="df">Retail</option>
                                    <option value="od">Management</option>
                                    <option value="rd">Human Resources</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="jobtype" class="form-label">Job Type</label>
                                <input type="text" class="form-control" id="jobtype" placeholder="Job type">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" placeholder="Designation">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="salary" class="form-label">Salary($)</label>
                                <input type="number" class="form-control" id="salary" placeholder="Salary">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" class="form-control" id="qualification" placeholder="Qualification">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="skills" class="form-label">Job Skills </label>
                                <input type="text" class="form-control" id="skills" placeholder="Job skills">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="lastdate" class="form-label">Application Deadline Date</label>
                                <input type="date" class="form-control" id="lastdate">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="choices-single-location" class="form-label">Country</label>
                                <select class="form-select" data-trigger name="choices-single-location" id="choices-single-location" aria-label="Default select example">
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="mb-4">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" placeholder="Zipcode">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="text-end">
                                <a href="javascript:void(0)" class="btn btn-success">Back</a>
                                <a href="javascript:void(0)" class="btn btn-primary">Post Now <i class="mdi mdi-send"></i></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end job-post-content-->
            </form>
        </div><!--end container-->
    </section>
    <!-- END JOBS-POST-EDIT -->

@endsection