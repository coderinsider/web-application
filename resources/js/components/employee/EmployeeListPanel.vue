<template>
    <div>
    <div v-if="error" class="error-message">
        <p v-text="error"></p>
        </div>
        <div v-if="success" class="success-message">
        <p v-text="success"></p>
    </div>
	<div class="table-box-panel">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Member Name</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Profile Image</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <tr v-for="(user, userKey) in userLists">
                <td v-text="userKey + 1">1</td>
                <td v-text="user.name">Sandi</td>
                <td v-text="user.phone">09253354614</td>
                <td v-text="user.gender">Female</td>
                <td>
                    <div class="imgpreview" style="width: 50px;height: 50px">
                        <img v-if="user.avatar" :src="user.avatar" style="border: 2px solid #6CB4FF;border-radius: 50%;width: 100%;height: 100%;" />
                        <img v-if="!user.avatar" src="/uploads/usercover/default.jpeg" style="border: 2px solid #6CB4FF;border-radius: 50%;width: 100%;height: 100%;" />
                    </div>
                </td>
                <td v-text="user.email">coderinsider1@gmail.com</td>
                <td>
                    <p 
                    style="cursor: pointer;"
                    data-bs-toggle="modal" :data-bs-target="'#status' + user.id"
                    :class="(user.status == 1) ? 'isactivestatus' : 'isdeactivatestatus'" 
                    v-text="(user.status == 1) ? 'Active' : 'Deactive'"
                    >
                    </p>
                    <!-- Modal -->
                    <div class="modal fade" :id="'status' + user.id" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title custom-modal-title" id="exampleModalLabel">Account Status Action</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="asktouser">
                                        <p>Are you sure want to change {{ (user.status == 0) ? 'Deactive to active status?' : 'Active to deactive status?' }}</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" :id="'acitve' + user.id" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click.prevent="changStatus(user.id)">
                                    {{ (user.status == 0) ? 'Active' : 'Deactive' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>  
                </td>
                <td>
                    <div class="moreactions">
                        <div class="editme">
                        	<a :href="'/admin/users-list/edit/' + user.id">
                            	<i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                        <div class="deleteme"> 
                            <button data-bs-toggle="modal" :data-bs-target="'#myModal' + user.id">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" :id="'myModal' + user.id" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title custom-modal-title" id="exampleModalLabel">Delete Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="asktouser">
                                                <p>Are you sure want to delete this record?</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" :id="'closeNow' + user.id" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click.prevent="deleteItemRecord(user.id)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                    </div>                                        
                </td>
            </tr>                             
        </table>
	</div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
	data() {
		return {
			userLists: [],
            success: "",
            error: "",
            filterrsults: {
                totalPagi: 5,
                searchBy: '',            
            }

		}
	},
	created() {
		this.gettingUserLists();
	},
	methods: {
        filterResult() {
            var header = {
                headers:{
                    "Content-Type": "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                }
            };
            axios.post('/betterhr/useraccount/filterresults', this.filterrsults, header)
            .then((resp) => {
                this.userLists = resp.data.data;
            });
        },
        changStatus(activeId) {
            axios.get('/betterhr/useraccount/status/' + activeId)
            .then((resp) => {
                this.gettingUserLists();
                document.querySelector('#acitve' + activeId).click();
            });
        },
        deleteItemRecord(deleteId) {
            axios.post('/betterhr/userlist/delete/' + deleteId, null)
            .then((resp) => {
                this.gettingUserLists();
                document.querySelector('#closeNow' + deleteId).click();
                console.log(resp);
                if(resp.data.status) {
                    this.success = resp.data.message;
                    var setTime = setTimeout(() => {
                        this.success = null;
                    }, 3000);
                    
                } else {
                    this.error = resp.data.message; 
                    var setTime = setTimeout(() => {
                        this.error = null;
                    }, 3000);                                        
                }
            })
        },
		gettingUserLists() {
			axios.get('/betterhr/userlists')
			.then((resp) => {
				this.userLists = resp.data.data;
			})
			.catch((error) => {

			});
		}
	}
}
</script>
<style scoped>
tbody, td, tfoot, th, thead, tr {
    padding: 15px;
}
</style>