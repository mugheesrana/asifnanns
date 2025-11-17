@extends('client.layout.app')
@section('body-class', 'body header-fixed')
@section('header-class', 'main-header')

@section('content')

    <!-- ===================== Banner Section ===================== -->
    <section class="tf-banner style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content relative z-2 text-center">
                        <div class="heading">
                            <h1 class="text-color-1">Electric Vehicle, Hybrid, or Gas, find your perfect match!</h1>
                            <p class="text-color-1 fs-18 fw-4 lh-22 font">
                        Our Smart Vehicle Recommendation Tool analyzes your driving habits, budget, and preferences to provide a personalized score and expert recommendation. <br>
                        In just a few minutes, you’ll know which vehicle type aligns perfectly with your needs, and our team will be ready to help you explore the best models available in our inventory.
                        </p>
                        </div>

                        <div class="chat-wrap flex-three wow fadeInUp mt-3" data-wow-delay="600ms" data-wow-duration="1000ms">
                            <a href="#quiz-section" class="sc-button mt-2" style="background-color: #fff;">Start
                                Assessment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== Quiz Section ===================== -->
    <section id="quiz-section" class="tf-section bg-light">
        <div class="container">
            <div class="heading-section text-center mb-4">
                <h2>Find Your Perfect Engine Type</h2>
                <p class="mt-2 text-muted">Ready to take the next step?</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <p class="mt-2 mb-2 text-muted">Complete the quick assessment below and get your personalized vehicle recommendation instantly. Once you have your results, a NaansAuto vehicle specialist can guide you through choosing the best vehicle brand and model that aligns with your budget and life style.</p>
                   <div class="widget-book-apoint">
                        <div class="progress"><div class="progress-bar" id="progressBar"></div></div>
                        <form id="quizForm">
                            <div id="stepContainer"></div>

                            <div class="buttons">
                                <button type="button" id="prevBtn" class="sc-button hidden">Back</button>
                                <button type="button" id="nextBtn" class="sc-button">Next</button>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== Results Section (Optional Display) ===================== -->
    <section id="results-section" class="tf-section d-none">
        <div class="container text-center">
            <h2>Your Recommended Engine Type</h2>
            <h3 class="text-color-1 mt-3" id="recommended-engine">Hybrid</h3>
            <p class="mt-2">A Hybrid engine is perfect for your mix of city and highway driving while keeping fuel costs
                low.</p>
            <a href="/cars-listings" class="sc-button mt-3">View Recommended Vehicles</a>
        </div>
    </section>

    <section class="tf-section" style="margin-left: 30px; margin-right: 30px; padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                        <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">Best Match                        </h2>
                        <a href="/car-listings" class="tf-btn-arrow wow fadeInUpSmall" data-wow-delay="0.2s"
                            data-wow-duration="1000ms">View all<i class="icon-autodeal-btn-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="flat-tabs themesflat-tabs">
                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div class="list-car-grid-4 gap-30">

                                    <div class="box-car-list hv-one">
                                        <div class="image-group relative ">
                                            <div class="top flex-two">
                                                <ul class="d-flex gap-8">
                                                    <li class="flag-tag success">Featured</li>
                                                    <li class="flag-tag style-1">
                                                        <div class="icon">
                                                            <svg width="16" height="13" viewBox="0 0 16 13"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.5 9L4.93933 5.56067C5.07862 5.42138 5.24398 5.31089 5.42597 5.2355C5.60796 5.16012 5.80302 5.12132 6 5.12132C6.19698 5.12132 6.39204 5.16012 6.57403 5.2355C6.75602 5.31089 6.92138 5.42138 7.06067 5.56067L10.5 9M9.5 8L10.4393 7.06067C10.5786 6.92138 10.744 6.81089 10.926 6.7355C11.108 6.66012 11.303 6.62132 11.5 6.62132C11.697 6.62132 11.892 6.66012 12.074 6.7355C12.256 6.81089 12.4214 6.92138 12.5607 7.06067L14.5 9M2.5 11.5H13.5C13.7652 11.5 14.0196 11.3946 14.2071 11.2071C14.3946 11.0196 14.5 10.7652 14.5 10.5V2.5C14.5 2.23478 14.3946 1.98043 14.2071 1.79289C14.0196 1.60536 13.7652 1.5 13.5 1.5H2.5C2.23478 1.5 1.98043 1.60536 1.79289 1.79289C1.60536 1.98043 1.5 2.23478 1.5 2.5V10.5C1.5 10.7652 1.60536 11.0196 1.79289 11.2071C1.98043 11.3946 2.23478 11.5 2.5 11.5ZM9.5 4H9.50533V4.00533H9.5V4ZM9.75 4C9.75 4.0663 9.72366 4.12989 9.67678 4.17678C9.62989 4.22366 9.5663 4.25 9.5 4.25C9.4337 4.25 9.37011 4.22366 9.32322 4.17678C9.27634 4.12989 9.25 4.0663 9.25 4C9.25 3.9337 9.27634 3.87011 9.32322 3.82322C9.37011 3.77634 9.4337 3.75 9.5 3.75C9.5663 3.75 9.62989 3.77634 9.67678 3.82322C9.72366 3.87011 9.75 3.9337 9.75 4Z"
                                                                    stroke="white" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        6
                                                    </li>
                                                </ul>
                                                <div class="year flag-tag">2024</div>
                                            </div>
                                            <ul class="change-heart flex">
                                                {{--  --}}
                                                <li class="box-icon w-32">
                                                    <a href="/" class="icon">
                                                        <svg width="18" height="16" viewBox="0 0 18 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.5 4.875C16.5 2.80417 14.7508 1.125 12.5933 1.125C10.9808 1.125 9.59583 2.06333 9 3.4025C8.40417 2.06333 7.01917 1.125 5.40583 1.125C3.25 1.125 1.5 2.80417 1.5 4.875C1.5 10.8917 9 14.875 9 14.875C9 14.875 16.5 10.8917 16.5 4.875Z"
                                                                stroke="CurrentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="img-style">
                                                <img class="lazyload" data-src="/nanns/assets/images/car-list/car12.jpg"
                                                    src="/nanns/assets/images/car-list/car12.jpg" alt="image">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="text-address">
                                                <p class="text-color-3 font">Sedan</p>
                                            </div>
                                            <h5 class="link-style-1">
                                                <a href="/">2017 BMV X1 xDrive 20d
                                                    xline</a>
                                            </h5>
                                            <div class="icon-box flex flex-wrap">
                                                <div class="icons flex-three">
                                                    <i class="icon-autodeal-km1"></i>
                                                    <span>72,491 kms</span>
                                                </div>
                                                <div class="icons flex-three">
                                                    <i class="icon-autodeal-diesel"></i>
                                                    <span>Diesel</span>
                                                </div>
                                                <div class="icons flex-three">
                                                    <i class="icon-autodeal-automatic"></i>
                                                    <span>Automatic</span>
                                                </div>
                                            </div>
                                            <div class="money fs-20 fw-5 lh-25 text-color-3">$73,000</div>
                                            <div class="days-box flex justify-space align-center">
                                                <div class="img-author">
                                                    <img class="lazyload" data-src="/nanns/assets/images/author/15.png"
                                                        src="/nanns/assets/images/author/15.png" alt="image">
                                                    <span class="font text-color-2 fw-5">Black, Marvin</span>
                                                </div>
                                                <a href="/" class="view-car">View car</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        const steps = [
            {
                title: "1. Driving Habits (Weight: 25%)",
                weight: 25,
                questions: [
                    "How often do you drive long distances?",
                    "Do you mostly drive in urban or rural areas?",
                    "How important is vehicle range to you?",
                    "Do you frequently drive in heavy traffic?",
                    "Would you describe your driving as regular and consistent?"
                ]
            },
            {
                title: "2. Budget & Cost (Weight: 20%)",
                weight: 20,
                questions: [
                    "How concerned are you about the upfront cost of a vehicle?",
                    "Would you consider higher upfront cost for lower long-term running cost?",
                    "Are you open to government incentives or subsidies?",
                    "Do you value fuel savings over purchase price?",
                    "Is long-term maintenance cost a major factor in your decision?"
                ]
            },
            {
                title: "3. Environmental Awareness (Weight: 15%)",
                weight: 15,
                questions: [
                    "How important is reducing your carbon footprint to you?",
                    "Would you prioritize eco-friendliness over performance?",
                    "Do you prefer supporting green or sustainable technologies?",
                    "How likely are you to choose renewable energy options (e.g., home solar)?",
                    "How concerned are you about vehicle emissions and pollution?"
                ]
            },
            {
                title: "4. Charging & Maintenance (Weight: 20%)",
                weight: 20,
                questions: [
                    "Do you have access to home charging or plan to install one?",
                    "How close is the nearest public charging station?",
                    "Are you comfortable with longer charging times compared to refueling?",
                    "How much do you value low maintenance vehicles?",
                    "Do you prefer traditional servicing familiarity over modern systems?"
                ]
            },
            {
                title: "5. Lifestyle & Performance (Weight: 20%)",
                weight: 20,
                questions: [
                    "Do you enjoy high-performance or fast-acceleration vehicles?",
                    "How important is a quiet and smooth driving experience?",
                    "Do you prioritize cargo space and versatility?",
                    "How frequently do you use your vehicle for family or group travel?",
                    "Are you attracted to advanced in-car technologies and digital features?"
                ]
            }
        ];

        let currentStep = 0;

        const form = document.getElementById("quizForm");
        const container = document.getElementById("stepContainer");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");
        const progressBar = document.getElementById("progressBar");

        function renderStep(index) {
            const step = steps[index];
            let html = `<h2>${step.title}</h2>`;
            step.questions.forEach((q, i) => {
                html += `
                    <div class="question mt-3">
                        <label>${q}</label>
                        <div class="options">
                            ${[1,2,3,4,5].map(num => `
                                <label><input class=\"quiz-radio\" type=\"radio\" name=\"q${index}_${i}\" value=\"${num}\" required> ${num}</label>
                            `).join("")}
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
            updateProgress();
            prevBtn.classList.toggle("hidden", index === 0);
            nextBtn.textContent = index === steps.length - 1 ? "Submit" : "Next";
        }

        function updateProgress() {
            const progress = ((currentStep) / (steps.length - 1)) * 100;
            progressBar.style.width = progress + "%";
        }

        function calculateResult() {
            let totalScore = 0;
            let totalWeight = 0;
            steps.forEach((step, sIndex) => {
                const radios = form.querySelectorAll(`[name^="q${sIndex}_"]:checked`);
                let avg = 0;
                radios.forEach(r => avg += parseInt(r.value));
                avg /= step.questions.length;
                totalScore += avg * step.weight;
                totalWeight += step.weight;
            });

            const finalScore = (totalScore / (5 * totalWeight)) * 100;
            let type = "", interpretation = "";
            if (finalScore >= 85) {
                type = "Electric Vehicle (EV)";
                interpretation = "Highly suited for an EV.";
            } else if (finalScore >= 70) {
                type = "Hybrid Vehicle";
                interpretation = "Balanced suitability for hybrid technology.";
            } else {
                type = "Gas-powered Vehicle";
                interpretation = "More practical with traditional fuel.";
            }

            container.innerHTML = `
                <div class="result">
                    <h2>Your Result</h2>
                    <h3>${type}</h3>
                    <p>Final Score: ${finalScore.toFixed(1)}%</p>
                    <p>${interpretation}</p>
                </div>
            `;
            document.querySelector(".buttons").classList.add("hidden");
            progressBar.style.width = "100%";
        }

        nextBtn.addEventListener("click", () => {
            const currentQuestions = container.querySelectorAll("input[type=radio]");
            const groups = [...new Set([...currentQuestions].map(i => i.name))];
            const allAnswered = groups.every(g => form.querySelector(`input[name="${g}"]:checked`));
            if (!allAnswered) {
                alert("Please answer all questions before continuing.");
                return;
            }
            if (currentStep < steps.length - 1) {
                currentStep++;
                renderStep(currentStep);
            } else {
                calculateResult();
            }
        });

        prevBtn.addEventListener("click", () => {
            if (currentStep > 0) {
                currentStep--;
                renderStep(currentStep);
            }
        });

        renderStep(currentStep);
    </script>
    <style>
        .progress {
            width: 100%;
            height: 8px;
            background: #ddd;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background: #FF7101 !important;
            transition: width 0.3s;
        }

        .question {
            margin-bottom: 20px;
        }

        .question label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .options label {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .options input {
            margin-right: 5px;
        }

        /* Force radios to be visible in case global theme hides them */
        #quiz-section input[type="radio"],
        #quiz-section .quiz-radio {
            visibility: visible !important;
            opacity: 1 !important;
            position: static !important;
            display: inline-block !important;
            transform: none !important;
            filter: none !important;
            clip-path: none !important;
            -webkit-mask: none !important;
            mask: none !important;
            z-index: 1 !important;
        }
        /* Custom radio styling to ensure visible regardless of global styles */
        #quiz-section .quiz-radio {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            width: 18px !important;
            height: 18px !important;
            border: 2px solid #999 !important;
            border-radius: 50% !important;
            background: #fff !important;
            vertical-align: middle !important;
            margin: 0 6px 0 0 !important;
            box-sizing: border-box !important;
        }
        #quiz-section .quiz-radio:checked {
            border-color: #FF7101 !important;
            background: radial-gradient(#FF7101 60%, transparent 61%) !important;
        }
        #quiz-section .quiz-radio:focus {
            outline: 2px solid #FF7101 !important;
            outline-offset: 2px !important;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 500px) {
            .options {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .result {
            text-align: center;
        }

        .result h3 {
            color: #FF7101;
        }
    </style>
@endsection
