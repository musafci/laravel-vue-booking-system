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
                      <th>Description</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr>

                      <td>11</td>
                      <td>asdfa</td>
                      <td>sadf asdfa</td>
                      <td>sdfa</td>
                      <td>sdfas</td>
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
export default {
  data() {
    return {
      datalist: '',
    }
  },

  methods: {
    getBookingHistory: function() {
        axios.get("api/get-booking-history")
        .then((response) => {
            console.log(response);
        })
        .catch(error => {
            console.log(error)
        })
    },
  }

}
</script>

<style>

</style>