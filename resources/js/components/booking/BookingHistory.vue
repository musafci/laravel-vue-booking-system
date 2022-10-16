<template>
  <section class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Booking History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Service</th>
                      <th>Booking Date</th>
                      <th>Time Started</th>
                      <th>Time Ended</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="bookingHistory in bookingHistories" :key="bookingHistory.id">
                      <td>11</td>
                      <td>{{ bookingHistory.user_name }}</td>
                      <td>{{ bookingHistory.service_name }}</td>
                      <td>{{ bookingHistory.booking_date }}</td>
                      <td>{{ bookingHistory.time_slot_starts }}</td>
                      <td>{{ bookingHistory.time_slot_ends }}</td>
                      <td>
                        <span v-if="bookingHistory.status == 0" class="text-info">Pending</span>
                        <span v-else-if="bookingHistory.status == 1" class="text-success">Approved</span>
                        <span v-else-if="bookingHistory.status == 2" class="text-danger">Rejected</span>
                        <span v-else class="text-dark">Completed</span>
                      </td>
                      <td>                        
                        <a href="#">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#">
                            <i class="fa fa-trash red"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
  </section>
</template>

<script>    
    import axios from 'axios';

    export default {
        data() {
            return {
                bookingHistories: [],
            }
        },

        methods: {
          getBookingHistory: function() {
              axios.get("api/get-booking-history")
              .then((response) => {
                  this.bookingHistories = response.data.data;
              })
              .catch(error => {
                  console.log(error)
              })
          },


        },
        mounted() {
            this.getBookingHistory();
            console.log('booking history.')
        },
    }
</script>


<style>

</style>