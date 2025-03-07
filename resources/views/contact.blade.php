@extends('layouts.app') @section('content')

<!-- Start grid -->
<section class="pt-44 pb-20">
    <div class="container mx-auto">
        <div class="grid items-center grid-cols-12 mt-5 lg:gap-8 gap-y-8">
            <div class="col-span-12 lg:col-span-6">
                <div class="mt-4">
                    <h3 class="mb-2 text-3xl text-gray-900 dark:text-white">
                        Get in touch
                    </h3>
                    <p class="text-gray-500 dark:text-gray-300">
                        Start working with Jobcy that can provide everything you
                        need to generate awareness, drive traffic, connect.
                    </p>
                    <form
                        method="post"
                        onsubmit="return validateForm()"
                        class="mt-4 contact-form"
                        name="myForm"
                        id="myForm"
                    >
                        <span id="error-msg"></span>
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12">
                                <div class="mb-3">
                                    <label
                                        for="nameInput"
                                        class="text-gray-900 dark:text-gray-50"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="w-full mt-1 rounded border-gray-100/50 placeholder:text-sm placeholder:text-gray-400 dark:bg-transparent dark:border-gray-800 focus:ring-0 focus:ring-offset-0 dark:text-gray-200"
                                        placeholder="Enter your name"
                                    />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mb-3">
                                    <label
                                        for="emailInput"
                                        class="text-gray-900 dark:text-gray-50"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        class="w-full mt-1 rounded border-gray-100/50 placeholder:text-sm placeholder:text-gray-400 dark:bg-transparent dark:border-gray-800 focus:ring-0 focus:ring-offset-0 dark:text-gray-200"
                                        id="emaiol"
                                        name="email"
                                        placeholder="Enter your email"
                                    />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mb-3">
                                    <label
                                        for="subjectInput"
                                        class="text-gray-900 dark:text-gray-50"
                                        >Subject</label
                                    >
                                    <input
                                        type="text"
                                        class="w-full mt-1 rounded border-gray-100/50 placeholder:text-sm placeholder:text-gray-400 dark:bg-transparent dark:border-gray-800 focus:ring-0 focus:ring-offset-0 dark:text-gray-200"
                                        id="subjectInput"
                                        name="subject"
                                        placeholder="Enter your subject"
                                    />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-span-12">
                                <div class="mb-3">
                                    <label
                                        for="meassageInput"
                                        class="text-gray-900 dark:text-gray-50"
                                        >Your Message</label
                                    >
                                    <textarea
                                        class="w-full mt-1 rounded border-gray-100/50 placeholder:text-sm placeholder:text-gray-400 dark:bg-transparent dark:border-gray-800 focus:ring-0 focus:ring-offset-0 dark:text-gray-200"
                                        id="meassageInput"
                                        placeholder="Enter your message"
                                        name="comments"
                                        rows="3"
                                    ></textarea>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="text-right">
                            <button
                                type="submit"
                                id="submit"
                                name="submit"
                                class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500"
                            >
                                Send Message
                                <i class="uil uil-message ms-1"></i>
                            </button>
                        </div>
                    </form>
                    <!--end form-->
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 lg:col-span-5 lg:ml-20">
                <div class="text-center">
                    <img
                        src="assets/images/contact.png"
                        alt=""
                        class="img-fluid"
                    />
                </div>
                <div class="pt-3 mt-4">
                    <div class="flex items-center mt-2 text-gray-500">
                        <div
                            class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 shrink-0 text-22"
                        >
                            <i class="uil uil-map-marker"></i>
                        </div>
                        <div class="ltr:ml-2 rtl:mr-2 grow-1">
                            <p class="mb-0 dark:text-gray-300">
                                2453 Clinton StreetLittle Rock, California, USA
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center mt-2 text-gray-500">
                        <div
                            class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 shrink-0 text-22"
                        >
                            <i class="uil uil-envelope"></i>
                        </div>
                        <div class="ltr:ml-2 rtl:mr-2 grow-1">
                            <p class="mb-0 dark:text-gray-300">
                                contactus@Jobcy.com
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center mt-2 text-gray-500">
                        <div
                            class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 shrink-0 text-22"
                        >
                            <i class="uil uil-phone-alt"></i>
                        </div>
                        <div class="ltr:ml-2 rtl:mr-2 grow-1">
                            <p class="mb-0 dark:text-gray-300">
                                (+245) 223 1245
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <div class="pt-20">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509157.364974411!2d-123.79641389801948!3d37.193115265681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1628684675253!5m2!1sen!2sin"
            height="350"
            style="border: 0; width: 100%"
            allowfullscreen=""
            loading="lazy"
        ></iframe>
    </div>
</section>
<!-- End grid -->

@endsection
