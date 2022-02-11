
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Item</div>

                    <div class="card-body">

           <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" :src="getPhoto()" alt="Item picture">
                </div>
              </div>
            </div>


  <div class="tab-pane active" id="settings">
      <form class="form-horizontal">
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Item Name</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.item_name" class="form-control" :class="{ 'is-invalid': form.errors.has('item_name') }">
          <has-error :form="form" field="item_name"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Unit (Kg)</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.unit" class="form-control" :class="{ 'is-invalid': form.errors.has('unit') }">
          <has-error :form="form" field="unit"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Stock</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.stock" class="form-control" :class="{ 'is-invalid': form.errors.has('stock') }">
          <has-error :form="form" field="stock"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.price" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
          <has-error :form="form" field="price"></has-error> 
          </div>
        </div>

        <div class="form-group row">
          <label for="inputSkills" class="col-sm-2 col-form-label">Image Item</label>
          <div class="col-sm-10">
            <input type="file" @change='uploadPhoto' name="photo" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
            <has-error :form="form" field="image"></has-error> 
          </div>
        </div>
       
        <div class="form-group row">
          <div class="offset-sm-2 col-sm-10">
            <button type="submit" @click.prevent="SubmitPhoto" class="btn btn-danger">Submit</button>
          </div>
        </div>
      </form>
      </div>

  <div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <tbody>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Unit</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Image</th>
            <th>Modify</th>
      </tr> 

      <tr v-for="item in tabledata.data" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.item_name }}</td>
        <td>{{ item.unit }}</td>
        <td>{{ item.stock }}</td>
        <td>{{ item.price }}</td>
        <td><img :src="`img/public/${item.image}`" class="profile-user-img img-fluid img-circle" style="height:40px; width:40px;"></td>
  
        <td>
            <a href="#" @click="editPhotoModal(item)">
                <i class="fa fa-edit blue"></i>
            </a>
            |
            <a href="#" @click="deletePhoto(item.id)">
                <i class="fa fa-trash red"></i>
            </a>

        </td>
      </tr>
    </tbody></table>
    <pagination :data="tabledata" @pagination-change-page="getResults"></pagination>
  </div>

    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="addNewLabel">Update Photo</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>

<form @submit.prevent="UpdatePhoto">
<div class="modal-body">

        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Item Name</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.item_name" class="form-control" :class="{ 'is-invalid': form.errors.has('item_name') }">
          <has-error :form="form" field="item_name"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Unit (Kg)</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.unit" class="form-control" :class="{ 'is-invalid': form.errors.has('unit') }">
          <has-error :form="form" field="unit"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Stock</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.stock" class="form-control" :class="{ 'is-invalid': form.errors.has('stock') }">
          <has-error :form="form" field="stock"></has-error> 
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
            <input type="text" v-model="form.price" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
          <has-error :form="form" field="price"></has-error> 
          </div>
        </div>

        <div class="form-group row">
          <label for="inputSkills" class="col-sm-2 col-form-label">Image Item</label>
          <div class="col-sm-10">
            <input type="file" @change='uploadPhoto' name="photo" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
            <has-error :form="form" field="image"></has-error> 
          </div>
        </div>


        <div class="form-group row">
          <div class="offset-sm-2 col-sm-10">
            <button type="submit" @click.prevent="SubmitPhoto" class="btn btn-danger">Submit</button>
          </div>
        </div>

      <img class="profile-user-img img-fluid img-circle" :src="getPhoto()" alt="User profile picture">
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
</div>

       </form>
     </div>
   </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                tabledata: {},
                form: new Form({
                    id: '',
                    item_name : '',
                    unit: '',
                    stock : '',
                    price: '',
                    image : '',
                })
            }
        },
        methods: {

            uploadPhoto(e){
              let file = e.target.files[0];
                let reader = new FileReader();  

                if(file['size'] < 2111775)
                {
                    reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                     this.form.photo = reader.result;
                    }              
                     reader.readAsDataURL(file);
                }else{
                    alert('File size can not be bigger than 2 MB')
                }
            },

            //For getting Instant Uploaded Photo
            getPhoto(){
               let image = (this.form.image.length > 100) ? this.form.image : "img/public/"+ this.form.image;
                return image;
            },

            //Insert Photo
            SubmitPhoto(){

            this.form.post('http:://localhost8000/api/st')
               .then(()=>{

                   Toast.fire({
                      icon: 'success',
                      title: 'File uploaded successfully'
                    })
                   this.loadTableData()
               })
               .catch(()=>{
                  console.log("Error.....")
               })

            },

            //get Table data
            loadTableData(){

                axios.get('http:://localhost8000/api/photo/page=')
                   .then(({ data }) =>( this.tabledata = data))
                   .catch(()=>{
                      console.log("Error...")
                   })
            },

            //Pagination
            getResults(page = 1) {
                  axios.get('http:://localhost8000/api/photo?page=')
                    .then(response => {
                      this.tabledata = response.data;
                  });
            },

            //Edit Option
            editPhotoModal(item){
               this.form.clear();
               this.form.reset();

                axios.get('http:://localhost8000/api/show/' + item.id)
                  .then(response => {
                    this.user = response.data;
                    console.log(this.user.item_name);
                  })

               $('#addNew').modal('show');
               this.form.fill(item)
            },

            UpdatePhoto(){
              this.form.put('http:://localhost8000/api/update/'+ id,{id:this.form.id})
               .then(()=>{

                   Toast.fire({
                      icon: 'success',
                      title: 'Photo updated successfully'
                    })

                    this.loadTableData()

                    $('#addNew').modal('hide');
               })
               .catch(()=>{
                  console.log("Error.....")
               })
            },

            //Delete photo
            deletePhoto(id){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                      
              if (result.value) {
                //Send Request to server
                this.form.delete('http:://localhost8000/api/storeImage/delete/'+id, {id:this.form.id})
                    .then((response)=> {
                            Swal.fire(
                              'Deleted!',
                              'Photo deleted successfully',
                              'success'
                            )
                    this.loadTableData();

                    }).catch(() => {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!',
                          footer: '<a href>Why do I have this issue?</a>'
                        })
                    })
                }

            })
            }
                  
        },

        created() {
          
          //LoadTableData
          this.loadTableData()
            
        }
        
    }
</script>
