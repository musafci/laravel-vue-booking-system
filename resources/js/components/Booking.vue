<template>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>
                        
                        <datepicker input-class="form-control"
                            :disabled-dates="{to: new Date(), from: new Date(new Date(3022, 0, 20))}"
                            v-model="bookingDate"
                            format="MM/dd/yyyy"
                            placeholder="MM-DD-YYYY"
                        >
                        </datepicker>

                        <div class="dropdown">
                            <input
                                label="timeSlot"
                                name="timeSlot"
                                id="timeSlot"
                                style="caret-color: transparent;"
                                autocomplete="off"
                                class="dropdown-toggle form-control timeSlot cursor-pointer"
                                :class="{'value-selected' : bookingInput.length}"
                                data-toggle="dropdown"
                                placeholder="Select time slot"
                                :value = "[bookingInput.length > 0 ? bookingInput.length + ' Selected' : '']"
                                ref="timeSlotInputField"
                            >
                            <span class="searchclear" v-if="bookingInput.length" @click="resetDropdown('featuredSpotValueCount', 'bookingInput')"><i class="fas fa-times" ></i></span>
                            <div class="dropdown-menu rounded-0" @click="$event.stopPropagation()" v-show="bookingTimeSlot.length">
                                <div class="dropdown-options-container">
                                    <ul class="dropdown-content-options px-2 mb-0">
                                        <li v-for="item in bookingTimeSlot" class="d-flex align-items-center mb-1">
                                            <input :id="'bookingTimeSlot-' + item.id" type="checkbox" :value="item.id" v-model="bookingInput"  class="mr-1"/>
                                            <label :for="'bookingTimeSlot-' + item.id" class="mb-0"> {{ item.time_slot_starts }} - {{ item.time_slot_ends }}</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <v-select :options="services"
                            placeholder="Select video"
                            class="form-control"
                            v-model="contentLink"
                            label="name"
                            ref="contentLink"
                            id="contentLink"
                        ></v-select>

                        <div class="form-btn">
                            <button class="submit-btn">Book Now</button>
                        </div>

<!-- 
						<form>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Country, ZIP, city...">
								<span class="form-label">Destination</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="date" required>
										<span class="form-label">Check In</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="date" required>
										<span class="form-label">Check out</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" required>
											<option value="" selected hidden>no of rooms</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Rooms</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" required>
											<option value="" selected hidden>no of adults</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Adults</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" required>
											<option value="" selected hidden>no of children</option>
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Children</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="email" placeholder="Enter your Email">
										<span class="form-label">Email</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="tel" placeholder="Enter you Phone">
										<span class="form-label">Phone</span>
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button class="submit-btn">Book Now</button>
							</div>
						</form> -->
					</div>
				</div>
			</div>
		</div>
	</div>  
</template>


<script>
    import axios from 'axios';
    import Datepicker from 'vuejs-datepicker';
    import vSelect from 'vue-select';

    export default {
        data() {
            return {
                bookingDate:'',
                bookingTimeSlot: [],
                bookingInput: [],
                services: [],
            }
        },
        methods: {
            getTimeSlots: function() {
                axios.get("api/get-time-slot")
                .then((response) => {
                    console.log(response);                    
                    this.bookingTimeSlot = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
            },

            getServices: function() {
                axios.get("api/get-service-list")
                .then((response) => {
                    // console.log(response, "services");
                    this.services = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
            },
        },
        mounted() {
            this.getTimeSlots();
            this.getServices();
            console.log('Component mounted.')
        },

        components: {
            Datepicker,
            vSelect,
        }
    }
</script>

    .section {
        position: relative;
        height: 100vh;
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #booking {
        font-family: 'Raleway', sans-serif;
    }

    .booking-form {
        position: relative;
        max-width: 642px;
        width: 100%;
        margin: auto;
        padding: 40px;
        overflow: hidden;
        /* background-image: url('../img/background.jpg'); */
        background-size: cover;
        border-radius: 5px;
        z-index: 20;
    }

    .booking-form::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: -1;
    }

    .booking-form .form-header {
        text-align: center;
        position: relative;
        margin-bottom: 30px;
    }

    .booking-form .form-header h1 {
        font-weight: 700;
        text-transform: capitalize;
        font-size: 42px;
        margin: 0px;
        color: #fff;
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .booking-form .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        height: 60px;
        padding: 0px 25px;
        border: none;
        border-radius: 40px;
        color: #fff;
        -webkit-box-shadow: 0px 0px 0px 2px transparent;
        box-shadow: 0px 0px 0px 2px transparent;
        -webkit-transition: 0.2s;
        transition: 0.2s;
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .booking-form .form-control:focus {
        -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
        box-shadow: 0px 0px 0px 2px #ff8846;
    }

    .booking-form input[type="date"].form-control {
        padding-top: 16px;
    }

    .booking-form input[type="date"].form-control:invalid {
        color: rgba(255, 255, 255, 0.5);
    }

    .booking-form input[type="date"].form-control+.form-label {
        opacity: 1;
        top: 10px;
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .booking-form select.form-control:invalid {
        color: rgba(255, 255, 255, 0.5);
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 15px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(255, 255, 255, 0.5);
        font-size: 14px;
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .booking-form select.form-control option {
        color: #000;
    }

    .booking-form .form-label {
        position: absolute;
        top: -10px;
        left: 25px;
        opacity: 0;
        color: #ff8846;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        height: 15px;
        line-height: 15px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .booking-form .form-group.input-not-empty .form-control {
        padding-top: 16px;
    }

    .booking-form .form-group.input-not-empty .form-label {
        opacity: 1;
        top: 10px;
    }

    .booking-form .submit-btn {
        color: #fff;
        background-color: #e35e0a;
        font-weight: 700;
        height: 60px;
        padding: 10px 30px;
        width: 100%;
        border-radius: 40px;
        border: none;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: 1.3px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
        opacity: 0.9;
    }
</style>